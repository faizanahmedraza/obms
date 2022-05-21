<?php

namespace App\Http\Controllers\Cms\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('cms.user.index');
    }
}
