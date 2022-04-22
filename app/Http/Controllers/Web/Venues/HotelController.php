<?php

namespace App\Http\Controllers\Web\Venues;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        return view('web.venues.hotel');
    }

    public function show()
    {
        return view('web.venues.detail');
    }
}
