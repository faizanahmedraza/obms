<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\VendorService;
use App\Models\VenueService;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('web.contact-us');
    }
}
