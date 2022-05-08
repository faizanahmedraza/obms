<?php

namespace App\Http\Controllers\Cms\Venue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('cms.user.index');
    }
}
