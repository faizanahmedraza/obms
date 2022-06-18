<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\VendorService;
use App\Models\VenueService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $venues = VenueService::with(['venue','venue.user'])->where('venue_name', 'like', '%' .trim($request->search).'%')->get();
        return view('web.search',compact('venues'));
    }
}
