<?php

namespace App\Http\Controllers\Web\Venues;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\Venue;
use App\Models\VenueService;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function index($param)
    {
        $venue_title = ucwords($param);
        $venues = VenueService::with(['venue','venue.user'])->where('venue_type',strtolower($param))->paginate(10);
        return view('web.venues.index',compact('venues','venue_title'));
    }

    public function show($id,$param)
    {
        $venue_title = ucwords($param);
        $venue = VenueService::with(['venue','venue.user'])->where('id',$id)->where('venue_type',strtolower($param))->firstOrFail();
        return view('web.venues.detail',compact('venue_title','venue'));
    }
}
