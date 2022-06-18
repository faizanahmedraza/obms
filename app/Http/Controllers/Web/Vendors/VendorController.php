<?php

namespace App\Http\Controllers\Web\Vendors;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\VendorService;
use App\Models\Venue;
use App\Models\VenueService;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index($param)
    {
        $vendor_title = $param;
        $vendors = VendorService::with(['vendor','vendor.user'])->where('service_type',strtolower($param))->paginate(10);
        return view('web.vendors.index',compact('vendors','vendor_title'));
    }

    public function show($param,$id)
    {
        $vendor_title = $param;
        $vendor = VendorService::with(['vendor','vendor.user'])->where('id',$id)->where('service_type',strtolower($param))->firstOrFail();
        return view('web.vendors.detail',compact('vendor_title','vendor'));
    }
}
