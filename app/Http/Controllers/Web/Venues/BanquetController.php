<?php

namespace App\Http\Controllers\Web\Venues;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BanquetController extends Controller
{
    public function index()
    {
        return view('web.venues.banquet');
    }

    public function show()
    {
        return view('web.venues.detail');
    }
}
