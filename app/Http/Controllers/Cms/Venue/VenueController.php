<?php

namespace App\Http\Controllers\Cms\Venue;

use App\Http\Controllers\Controller;
use App\Http\Wrappers\CloudinaryService;
use App\Jobs\SendUserAccountVerificationEmailJob;
use App\Mail\Verification;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorService;
use App\Models\Venue;
use App\Models\VenueService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class VenueController extends Controller
{
    private $module;

    public function __construct()
    {
        $this->module = 'venues';
        $ULP = '|' . $this->module . '_all|access_all'; //UPPER LEVEL PERMISSIONS
        $this->middleware('permission:' . $this->module . '_read' . $ULP, ['only' => ['index', 'show']]);
        $this->middleware('permission:' . $this->module . '_create' . $ULP, ['only' => ['create', 'store']]);
        $this->middleware('permission:' . $this->module . '_update' . $ULP, ['only' => ['edit', 'update']]);
        $this->middleware('permission:' . $this->module . '_delete' . $ULP, ['only' => ['destroy']]);
    }

    public function index()
    {
        $venues = VenueService::where('venue_id',auth()->id())->get();
        return view('cms.venue.index', compact('venues'));
    }

    public function create()
    {
        $venueUsers = User::has('venue')->get();
        $venue_types = Venue::VENUE_TYPES;
        return view('cms.venue.create',compact('venueUsers','venue_types'));
    }

    public function store(Request $request)
    {
        $rules = [
            'venue_name' => 'required|string|max:150',
            'venue_type' => 'required|in:' . implode(',', Venue::VENUE_TYPES),
            'country' => 'required|string|max:100',
            'virtual_tour' => 'required|url',
            'image' => 'required|image',
            'city' => 'required|string|max:100',
            'address' => 'required|string|max:200',
            'price_per_hour' => 'required|numeric',
            'additional_details' => 'nullable|string',
        ];

        $userData = [];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        if (!empty($request->file('image'))) {
            $userData['image'] = CloudinaryService::upload($request->file('image')->getRealPath())->secureUrl;;
        }

        $data['venue_id'] = \auth()->id();
        $data['venue_name'] = request()->venue_name;
        $data['slug'] = Str::slug(request()->venue_name);
        $data['venue_type'] = request()->venue_type;
        $data['country'] = request()->country;
        $data['city'] = request()->city;
        $data['address'] = request()->address;
        $data['price_per_hour'] = request()->price_per_hour;
        $data['additional_details'] = request()->additional_details;

        VenueService::create($data);

        DB::commit();
        return redirect()->route('venue.venues.index')->with('success', 'Successfully added.');
    }

    public function show($id)
    {
        $venue = VenueService::where('venue_id',auth()->id())->where('id',$id)->firstOrFail();
        return view('cms.venue.show', compact('venue'));
    }

    public function edit($id)
    {
        $venue = VenueService::where('venue_id',auth()->id())->where('id',$id)->firstOrFail();
        $venueUsers = User::has('venue')->get();
        $venue_types = Venue::VENUE_TYPES;
        return view('cms.venue.edit', compact('venueUsers', 'venue','venue_types'));
    }

    public function update($id, Request $request)
    {
        $venue = VenueService::where('venue_id',auth()->id())->where('id',$id)->firstOrFail();
        $rules = [
            'venue_name' => 'required|string|max:150',
            'venue_type' => 'required|in:' . implode(',', Venue::VENUE_TYPES),
            'country' => 'required|string|max:100',
            'virtual_tour' => 'required|url',
            'image' => 'sometimes|nullable|image',
            'city' => 'required|string|max:100',
            'address' => 'required|string|max:200',
            'price_per_hour' => 'required|numeric',
            'additional_details' => 'nullable|string',
        ];

        $data = [];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (!empty($request->file('image'))) {
            $data['image'] = CloudinaryService::upload($request->file('image')->getRealPath())->secureUrl;;
        }

        $data['venue_id'] = \auth()->id();
        $data['venue_name'] = request()->venue_name;
        $data['slug'] = Str::slug(request()->venue_name);
        $data['venue_type'] = request()->venue_type;
        $data['country'] = request()->country;
        $data['city'] = request()->city;
        $data['address'] = request()->address;
        $data['price_per_hour'] = request()->price_per_hour;
        $data['additional_details'] = request()->additional_details;

        $venue->update($data);

        return redirect()->route('venue.venues.index')->with('success', 'Successfully updated.');
    }

    public function destroy($id)
    {
        $msg = "Successfully Deleted.";
        $code = 200;
        $venue = VenueService::where('venue_id',auth()->id())->where('id', $id)->first();
        if (empty($venue)) {
            $msg = "Record not found!";
            $code = 404;
        }
        $venue->delete();
        return response()->json(['msg' => $msg], $code);
    }
}
