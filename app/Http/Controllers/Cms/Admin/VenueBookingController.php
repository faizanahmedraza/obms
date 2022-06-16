<?php

namespace App\Http\Controllers\Cms\Admin;

use App\Http\Controllers\Controller;
use App\Http\Wrappers\CloudinaryService;
use App\Jobs\SendUserAccountVerificationEmailJob;
use App\Mail\Verification;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorService;
use App\Models\Venue;
use App\Models\VenueBooking;
use App\Models\VenueService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class VenueBookingController extends Controller
{
    private $module;

//    public function __construct()
//    {
//        $this->module = 'venue_bookings';
//        $ULP = '|' . $this->module . '_all|access_all'; //UPPER LEVEL PERMISSIONS
//        $this->middleware('permission:' . $this->module . '_read' . $ULP, ['only' => ['index', 'show']]);
//        $this->middleware('permission:' . $this->module . '_create' . $ULP, ['only' => ['create', 'store']]);
//        $this->middleware('permission:' . $this->module . '_update' . $ULP, ['only' => ['edit', 'update']]);
//        $this->middleware('permission:' . $this->module . '_delete' . $ULP, ['only' => ['destroy']]);
//    }

    public function index()
    {
        $bookings = VenueBooking::latest()->get();
        return view('cms.admin.venue-bookings.index', compact('bookings'));
    }

    public function create()
    {
        $customers = User::has('customer')->get();
        $venues = VenueService::latest()->get();
        return view('cms.admin.venue-bookings.create', compact('customers', 'venues'));
    }

    public function store(Request $request)
    {
        $rules = [
            'customer' => 'required|in:' . implode(',', User::has('customer')->pluck('id')->toArray()),
            'venue' => 'required|in:' . implode(',', VenueService::pluck('id')->toArray()),
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

        $venue = VenueService::where('id', (int)$request->venue)->first();

        if (empty($venue->price_per_hour)) {
            return back()->withErrors(['errors' => 'Kindly submit complete details of this venue before booking'])->withInput();
        }

        $requestStartTime = Carbon::parse($request->start_time);
        $requestEndTime = Carbon::parse($request->end_time);
        $differenceInHours = $requestEndTime->diffInHours($requestStartTime);
        $hours = $differenceInHours <= 0 ? 2 : $differenceInHours;
        $totalPrice = $hours * $venue->price_per_hour;

        $data['customer_id'] = (int)$request->customer;
        $data['venue_service_id'] = $venue->id;
        $data['date'] = $request->date;
        $data['start_time'] = $request->start_time;
        $data['end_time'] = $request->end_time;
        $data['total_price'] = $totalPrice;

        VenueBooking::create($data);

        DB::commit();
        return redirect()->route('admin.venue-bookings.index')->with('success', 'Successfully added.');
    }

    public function show($id)
    {
        $booking = VenueBooking::with(['venueService', 'venueService.venue','customer','customer.user'])->where('id', $id)->firstOrFail();
        return view('cms.admin.venue-bookings.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = VenueBooking::with(['venueService', 'venueService.venue'])->where('id', $id)->firstOrFail();
        $customers = User::has('customer')->get();
        $venues = VenueService::latest()->get();
        return view('cms.admin.venue-bookings.edit', compact('booking', 'customers', 'venues'));
    }

    public function update($id, Request $request)
    {
        $booking = VenueBooking::with(['venueService', 'venueService.venue'])->where('id', $id)->firstOrFail();
        $rules = [
            'customer' => 'required|in:' . implode(',', User::has('customer')->pluck('id')->toArray()),
            'venue' => 'required|in:' . implode(',', VenueService::pluck('id')->toArray()),
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

        $venue = VenueService::where('id', (int)$request->venue)->first();
        $requestStartTime = Carbon::parse($request->start_time);
        $requestEndTime = Carbon::parse($request->end_time);
        $differenceInHours = $requestEndTime->diffInHours($requestStartTime);
        $hours = $differenceInHours <= 0 ? 2 : $differenceInHours;
        $totalPrice = $hours * $venue->price_per_hour;

        $data['customer_id'] = (int)$request->customer;
        $data['venue_service_id'] = $venue->id;
        $data['date'] = $request->date;
        $data['start_time'] = $request->start_time;
        $data['end_time'] = $request->end_time;
        $data['total_price'] = $totalPrice;

        $booking->update($data);

        return redirect()->route('admin.venue-bookings.index')->with('success', 'Successfully updated.');
    }

    public function destroy($id)
    {
        $msg = "Successfully Deleted.";
        $code = 200;
        $booking = VenueBooking::where('id', $id)->firstOrFail();

        if (empty($booking)) {
            $msg = "Record not found!";
            $code = 404;
        }

        $booking->delete();
        return response()->json(['msg' => $msg], $code);
    }
}
