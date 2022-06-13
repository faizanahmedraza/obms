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

class VendorBookingController extends Controller
{
    private $module;

//    public function __construct()
//    {
//        $this->module = 'vendor_bookings';
//        $ULP = '|' . $this->module . '_all|access_all'; //UPPER LEVEL PERMISSIONS
//        $this->middleware('permission:' . $this->module . '_read' . $ULP, ['only' => ['index', 'show']]);
//        $this->middleware('permission:' . $this->module . '_create' . $ULP, ['only' => ['create', 'store']]);
//        $this->middleware('permission:' . $this->module . '_update' . $ULP, ['only' => ['edit', 'update']]);
//        $this->middleware('permission:' . $this->module . '_delete' . $ULP, ['only' => ['destroy']]);
//    }

    public function index()
    {
        $bookings = ServiceBooking::latest()->get();
        return view('cms.admin.vendor-bookings.index', compact('bookings'));
    }

    public function create()
    {
        $customers = User::has('customer')->get();
        $vendors = VendorService::latest()->get();
        return view('cms.admin.vendor-bookings.create', compact('customers', 'vendors'));
    }

    public function store(Request $request)
    {
        $rules = [
            'customer' => 'required|in:' . implode(',', User::has('customer')->pluck('id')->toArray()),
            'venue' => 'required|in:' . implode(',', VenueService::pluck('id')->toArray()),
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:time_start',
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

        $venue = VenueService::where('id',(int)$request->venue)->first();
        $requestStartTime = Carbon::parse($request->start_time);
        $requestEndTime = Carbon::parse($request->end_time);
        $differenceInHours = $requestEndTime->diffInHours($requestStartTime);
        $totalPrice = $differenceInHours * $venue->price_per_hour;

        $data['customer_id'] = (int)$request->customer;
        $data['venue_service_id'] = $venue->id;
        $data['date'] = $request->date;
        $data['start_time'] = $request->date;
        $data['end_time'] = $request->date;
        $data['total_price'] = $totalPrice;

        VenueService::create($data);

        DB::commit();
        return redirect()->route('admin.vendor-bookings.index')->with('success', 'Successfully added.');
    }

    public function show($id)
    {
        $booking = ServiceBooking::with(['venueService', 'venueService.venue'])->where('id', $id)->firstOrFail();
        return view('cms.admin.vendor-bookings.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = ServiceBooking::with(['venueService', 'venueService.venue'])->where('id', $id)->firstOrFail();
        $customers = User::has('customer')->get();
        $vendors = VendorService::latest()->get();
        return view('cms.admin.vendor-bookings.edit', compact('booking', 'customers', 'vendors'));
    }

    public function update($id, Request $request)
    {
        $booking = ServiceBooking::with(['venueService', 'venueService.venue'])->where('id', $id)->firstOrFail();
        $rules = [
            'customer' => 'required|in:' . implode(',', User::has('customer')->pluck('id')->toArray()),
            'venue' => 'required|in:' . implode(',', VenueService::pluck('id')->toArray()),
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:time_start',
        ];

        $data = [];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $venue = VenueService::where('id',(int)$request->venue)->first();
        $requestStartTime = Carbon::parse($request->start_time);
        $requestEndTime = Carbon::parse($request->end_time);
        $differenceInHours = $requestEndTime->diffInHours($requestStartTime);
        $totalPrice = $differenceInHours * $venue->price_per_hour;

        $data['customer_id'] = (int)$request->customer;
        $data['venue_service_id'] = $venue->id;
        $data['date'] = $request->date;
        $data['start_time'] = $request->date;
        $data['end_time'] = $request->date;
        $data['total_price'] = $totalPrice;

        $booking->update($data);

        return redirect()->route('admin.vendor-bookings.index')->with('success', 'Successfully updated.');
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
