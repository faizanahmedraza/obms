<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\ServiceBooking;
use App\Models\User;
use App\Models\VendorService;
use App\Models\VenueService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class VendorBookingController extends Controller
{
    private $module;

    public function __construct()
    {
        $this->module = 'vendor_bookings';
        $ULP = '|' . $this->module . '_all|access_all'; //UPPER LEVEL PERMISSIONS
        $this->middleware('permission:' . $this->module . '_read' . $ULP, ['only' => ['index', 'show']]);
        $this->middleware('permission:' . $this->module . '_create' . $ULP, ['only' => ['create', 'store']]);
        $this->middleware('permission:' . $this->module . '_update' . $ULP, ['only' => ['edit', 'update']]);
        $this->middleware('permission:' . $this->module . '_delete' . $ULP, ['only' => ['destroy']]);
    }

    public function index()
    {
        $bookings = ServiceBooking::latest()->get();
        return view('cms.vendor-bookings.index', compact('bookings'));
    }

    public function create()
    {
        $customers = User::has('customer')->get();
        $vendors = VendorService::latest()->get();
        return view('cms.vendor-bookings.create', compact('customers', 'vendors'));
    }

    public function store(Request $request)
    {
        $rules = [
            'customer' => [
                Rule::requiredIf(function () use ($request) {
                    return $request->user()->roles->first()->name != "Customer";
                })
                , 'in:' . implode(',', User::has('customer')->pluck('id')->toArray())],
            'vendor' => 'required|in:' . implode(',', VendorService::pluck('id')->toArray()),
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ];

        $data = [];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        $vendor = VendorService::where('id', (int)$request->venue)->first();

        if (empty($vendor->price_per_hour)) {
            return back()->withErrors(['errors' => 'Kindly submit complete details of this service before booking'])->withInput();
        }

        $requestStartTime = Carbon::parse($request->start_time);
        $requestEndTime = Carbon::parse($request->end_time);
        $differenceInHours = $requestEndTime->diffInHours($requestStartTime);
        $hours = $differenceInHours <= 0 ? 2 : $differenceInHours;
        $totalPrice = $hours * $vendor->price_per_hour;

        $data['customer_id'] = (int)$request->customer;
        $data['vendor_service_id'] = $vendor->id;
        $data['date'] = $request->date;
        $data['start_time'] = $request->date;
        $data['end_time'] = $request->date;
        $data['total_price'] = $totalPrice;

        ServiceBooking::create($data);

        DB::commit();
        return redirect()->route('vendor-bookings.index')->with('success', 'Successfully added.');
    }

    public function show($id)
    {
        $booking = ServiceBooking::with(['vendorService', 'vendorService.vendor'])->where('id', $id)->firstOrFail();
        return view('cms.vendor-booking.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = ServiceBooking::with(['vendorService', 'vendorService.vendor', 'customer', 'customer.user'])->where('id', $id)->firstOrFail();
        $customers = User::has('customer')->get();
        $vendors = VendorService::latest()->get();
        return view('cms.vendor-booking.edit', compact('booking', 'customers', 'vendors'));
    }

    public function update($id, Request $request)
    {
        $booking = ServiceBooking::with(['vendorService', 'vendorService.vendor'])->where('id', $id)->firstOrFail();
        $rules = [
            'customer' => [
                Rule::requiredIf(function () use ($request) {
                    return $request->user()->roles->first()->name != "Customer";
                })
                , 'in:' . implode(',', User::has('customer')->pluck('id')->toArray())],
            'vendor' => 'required|in:' . implode(',', VendorService::pluck('id')->toArray()),
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ];

        $data = [];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $vendor = VendorService::where('id', (int)$request->venue)->first();
        $requestStartTime = Carbon::parse($request->start_time);
        $requestEndTime = Carbon::parse($request->end_time);
        $differenceInHours = $requestEndTime->diffInHours($requestStartTime);
        $hours = $differenceInHours <= 0 ? 2 : $differenceInHours;
        $totalPrice = $hours * $vendor->price_per_hour;

        $data['customer_id'] = (int)$request->customer;
        $data['vendor_service_id'] = $vendor->id;
        $data['date'] = $request->date;
        $data['start_time'] = $request->date;
        $data['end_time'] = $request->date;
        $data['total_price'] = $totalPrice;

        $booking->update($data);

        return redirect()->route('vendor-bookings.index')->with('success', 'Successfully updated.');
    }

    public function destroy($id)
    {
        $msg = "Successfully Deleted.";
        $code = 200;
        $booking = ServiceBooking::where('id', $id)->firstOrFail();

        if (empty($booking)) {
            $msg = "Record not found!";
            $code = 404;
        }

        $booking->delete();
        return response()->json(['msg' => $msg], $code);
    }
}
