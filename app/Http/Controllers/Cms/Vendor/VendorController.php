<?php

namespace App\Http\Controllers\Cms\Vendor;

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

class VendorController extends Controller
{
    private $module;

    public function __construct()
    {
        $this->module = 'vendor_services';
        $ULP = '|' . $this->module . '_all|access_all'; //UPPER LEVEL PERMISSIONS
        $this->middleware('permission:' . $this->module . '_read' . $ULP, ['only' => ['index', 'show']]);
        $this->middleware('permission:' . $this->module . '_create' . $ULP, ['only' => ['create', 'store']]);
        $this->middleware('permission:' . $this->module . '_update' . $ULP, ['only' => ['edit', 'update']]);
        $this->middleware('permission:' . $this->module . '_delete' . $ULP, ['only' => ['destroy']]);
    }

    public function index()
    {
        $vendors = VendorService::where('vendor_id', auth()->id())->get();
        return view('cms.vendor.index', compact('vendors'));
    }

    public function create()
    {
        $service_types = Vendor::VENDOR_TYPES;
        return view('cms.vendor.create',compact('service_types'));
    }

    public function store(Request $request)
    {
        $rules = [
            'service_name' => 'required|string|max:150',
            'service_type' => 'required|in:' . implode(',', Vendor::VENDOR_TYPES),
            'country' => 'required|string|max:100',
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

        $data['vendor_id'] = \auth()->id();
        $data['service_name'] = request()->service_name;
        $data['slug'] = Str::slug(request()->service_name);
        $data['service_type'] = request()->service_type;
        $data['country'] = request()->country;
        $data['city'] = request()->city;
        $data['address'] = request()->address;
        $data['price_per_hour'] = request()->price_per_hour;
        $data['additional_details'] = request()->additional_details;

        VendorService::create($data);

        DB::commit();
        return redirect()->route('vendor.vendors.index')->with('success', 'Successfully added.');
    }

    public function show($id)
    {
        $vendor = VendorService::where('vendor_id',Auth::id())->where('id',$id)->firstOrFail();
        return view('cms.vendor.show', compact('vendor'));
    }

    public function edit($id)
    {
        $vendor = VendorService::where('vendor_id',Auth::id())->where('id',$id)->firstOrFail();
        $service_types = Vendor::VENDOR_TYPES;
        return view('cms.vendor.edit', compact('vendor','service_types'));
    }

    public function update($id, Request $request)
    {
        $vendor = VendorService::where('vendor_id',Auth::id())->where('id',$id)->firstOrFail();
        $rules = [
            'service_name' => 'required|string|max:150',
            'service_type' => 'required|in:' . implode(',', Vendor::VENDOR_TYPES),
            'image' => 'sometimes|nullable|image',
            'country' => 'required|string|max:100',
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

        $data['vendor_id'] = $request->vendor;
        $data['service_name'] = request()->service_name;
        $data['slug'] = Str::slug(request()->service_name);
        $data['service_type'] = request()->service_type;
        $data['country'] = request()->country;
        $data['city'] = request()->city;
        $data['address'] = request()->address;
        $data['price_per_hour'] = request()->price_per_hour;
        $data['additional_details'] = request()->additional_details;

        $vendor->update($data);

        return redirect()->route('vendor.vendors.index')->with('success', 'Successfully updated.');
    }

    public function destroy($id)
    {
        $msg = "Successfully Deleted.";
        $code = 200;
        $vendor = VendorService::where('vendor_id',Auth::id())->where('id', $id)->first();
        if (empty($vendor)) {
            $msg = "Record not found!";
            $code = 404;
        }
        $vendor->delete();
        return response()->json(['msg' => $msg], $code);
    }
}
