<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SignUpController extends Controller
{
    public function index()
    {
        $vendors = Vendor::VENDOR_TYPES;
        $venues = Venue::VENUE_TYPES;
        return view('web.auth.signup', compact('vendors', 'venues'));
    }

    public function store(Request $request)
    {
        $r = "web.vendor.signup.store";
        if (Route::currentRouteName() == "web.venue.signup.store") {
            $r = "web.venue.signup.store";
        }

        $rules = [
            'role' => ['required', 'in:' . implode(',', ['Vendor', 'Venue'])],
        ];

        $messages = [
            'contact_number.regex' => 'Phone number must be greater than 9 and less than 12 digits.'
        ];

        $userData = array();

        if (!empty($request->role)) {
            if ($request->role == 'Vendor') {
                $rules['email_vendor'] = ['required', 'email', 'max:100'];
                $rules['service_name'] = ['required', 'string', 'max:150'];
                $rules['service_type'] = ['required', 'in:' . implode(',', Vendor::VENDOR_TYPES)];
                $rules['contact_number_vendor'] = ['nullable', 'numeric', 'regex:/[0-9]{10,11}/'];
                $userData['email'] = trim(strtolower($request->email_vendor));
                $userData['contact_number'] = $request->contact_number_vendor;
                $userData['name'] = strtok($userData['email'],'@');
            } elseif ($request->role == 'Venue') {
                $rules['email_venue'] = ['required', 'email', 'max:100'];
                $rules['venue_name'] = ['required', 'string', 'max:150'];
                $rules['venue_type'] = ['required', 'in:' . implode(',', Venue::VENUE_TYPES)];
                $rules['contact_number_venue'] = ['nullable', 'numeric', 'regex:/[0-9]{10,11}/'];
                $userData['email'] = trim(strtolower($request->email_venue));
                $userData['contact_number'] = $request->contact_number_venue;
                $userData['name'] = strtok($userData['email'],'@');
            }
            $customMessages = [
                'email_vendor' => 'email',
                'email_venue' => 'email',
                'contact_number_vendor' => 'contact number',
                'contact_number_venue' => 'contact number',
            ];
        }

        $validator = Validator::make($request->all(), $rules, $messages, $customMessages);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput()->with('active_key', $r);
        }

        DB::beginTransaction();

        $user = User::create($userData);

        if ($request->role == "Vendor") {
            $user->assignRole('Vendor');
            $user->vendor()->create(['service_name' => $request->service_name, 'service_type' => $request->service_type]);
        } else {
            $user->assignRole('Venue');
            $user->venue()->create(['venue_name' => $request->venue_name, 'venue_type' => $request->venue_type]);
        }

        DB::commit();

        Auth::login($user);

        if ($request->role == 'Vendor') {
            return redirect()->intended('vendor/home');
        } else {
            return redirect()->intended('venue/home');
        }
    }
}
