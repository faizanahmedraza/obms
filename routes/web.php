<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/banquets', function () {
//    return view('web.index');
    return view('welcome');
});

//Website
Route::group(['namespace' => 'Web', 'as' => 'web.'], function () {
    Route::get('/', 'HomeController')->name('home');

    Route::group(['namespace' => 'Venues'], function () {
        Route::get('/venues/{param}', 'VenueController@index')->name('venues');
        Route::get('/venues/{param}/{id}', 'VenueController@show')->name('venues.detail');
    });

    Route::group(['namespace' => 'Vendors'], function () {
        Route::get('/vendors/{param}', 'VendorController@index')->name('vendors');
        Route::get('/vendors/{param}/{id}', 'VendorController@show')->name('vendors.detail');
    });

    Route::get('/gallery', 'GalleryController@index')->name('gallery');
    Route::get('/contact-us', 'ContactUsController@index')->name('contact-us');
    Route::post('/search', 'SearchController@index')->name('search');

    //Authentication and Authorization
    Route::group(['namespace' => 'Auth'], function () {
        Route::group(['middleware' => 'guest'], function () {
            Route::get('/signin', 'SignInController@index')->name('signin');
            Route::post('/signin', 'SignInController@store')->name('signin.store');
            Route::get('/signup', 'SignUpController@index')->name('signup');
            Route::get('/cus/signup', 'SignUpController@customerSignup')->name('customer.signup');
            Route::post('/cus/signup', 'SignUpController@customerSignupStore')->name('customer.signup.store');
            Route::post('/vendor/signup', 'SignUpController@store')->name('vendor.signup.store');
            Route::post('/venue/signup', 'SignUpController@store')->name('venue.signup.store');
            Route::resource('forgot-password', 'ForgotPasswordController',
                [
                    'only' => [
                        'index', 'store'
                    ],
                    'names' => [
                        'index' => 'password.request',
                        'store' => 'password.email'
                    ]
                ]
            );
            Route::resource('reset-password', 'ResetPasswordController',
                [
                    'only' => [
                        'show', 'store'
                    ],
                    'parameters' => [
                        'reset-password' => 'token'
                    ],
                    'names' => [
                        'show' => 'password.reset',
                        'store' => 'password.update'
                    ]
                ]
            );
            Route::get('/verification/{token}', 'CreatePasswordController@verifyToken')->name('verification');
            Route::put('/verification/{token}', 'CreatePasswordController@createPassword')->name('verification.store');
        });

        //Protected Routes
        Route::group(['middleware' => ['auth', 'check.blocked']], function () {
            Route::post('/logout', 'SignOutController')->name('logout');
//                Route::get('/email/verify', 'EmailVerificationController@index')->name('verification.notice');
//                Route::get('/email/verify/{id}/{hash}', 'EmailVerificationController@verifyEmail')->middleware('signed')->name('verification.verify');
//                Route::post('/email/verification-notification', 'EmailVerificationController@resendEmailNotification')->middleware('throttle:6,1')->name('verification.send');
        });
    });
});

//Portals
Route::group(['namespace' => 'Cms'], function () {
//Admin Section
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin/', 'as' => 'admin.'], function () {

        //Authentication and Authorization
        Route::group(['namespace' => 'Auth'], function () {
            //Guest Routes
            Route::group(['middleware' => 'guest'], function () {
                Route::resource('login', 'LoginController',
                    [
                        'only' => [
                            'index', 'store'
                        ],
                        'names' => [
                            'index' => 'login'
                        ]
                    ]
                );
                Route::get('forgot-password/email/resend', 'ForgotPasswordController@resendEmailNotification')->middleware('throttle:6,1')->name('resend.password.email');
                Route::resource('forgot-password', 'ForgotPasswordController',
                    [
                        'only' => [
                            'index', 'store'
                        ],
                        'names' => [
                            'index' => 'password.request',
                            'store' => 'password.email'
                        ]
                    ]
                );
                Route::resource('reset-password', 'ResetPasswordController',
                    [
                        'only' => [
                            'show', 'store'
                        ],
                        'parameters' => [
                            'reset-password' => 'token'
                        ],
                        'names' => [
                            'show' => 'password.reset',
                            'store' => 'password.update'
                        ]
                    ]
                );
                Route::get('/verification/{token}', 'CreatePasswordController@verifyToken')->name('verification');
                Route::put('/verification/{token}', 'CreatePasswordController@createPassword')->name('verification.store');
            });

            //Protected Routes
            Route::group(['middleware' => ['auth', 'check.blocked']], function () {
                Route::post('/logout', 'LogoutController')->name('logout');
                Route::get('/email/verify', 'EmailVerificationController@index')->name('verification.notice');
                Route::get('/email/verify/{id}/{hash}', 'EmailVerificationController@verifyEmail')->middleware('signed')->name('verification.verify');
                Route::post('/email/verification-notification', 'EmailVerificationController@resendEmailNotification')->middleware('throttle:6,1')->name('verification.send');
            });
        });

        //Protected Routes
        Route::group(['middleware' => ['auth', 'check.blocked']], function () {
            Route::get('/home', 'HomeController')->name('home');

            // Only verified users may access this routes section
            Route::group(['middleware' => 'verified'], function () {
                Route::group(['namespace' => 'UserManagement'], function () {

                    // User Management
                    Route::get('/users', 'UserController@adminUsers')->name('users');
                    Route::get('/vendor/users', 'UserController@vendorUsers')->name('vendor.users');
                    Route::get('/venue/users', 'UserController@venueUsers')->name('venue.users');
                    Route::get('/customers', 'UserController@customers')->name('customers');
                    Route::get('/users/create', 'UserController@create')->name('users.create');
                    Route::post('/users/create', 'UserController@store')->name('users.store');
                    Route::get('/users/{id}/show', 'UserController@show')->name('users.show');
                    Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');
                    Route::put('/users/{id}/update', 'UserController@update')->name('users.update');
                    Route::delete('/users/{id}/delete', 'UserController@destroy')->name('users.delete');

                    // Roles and  Permissions Management
                    Route::delete('/roles/{id}/delete', 'RoleController@destroy')->name('roles.delete');
                    Route::resources([
                        'roles' => 'RoleController',
                    ], [
                        'except' => ['destroy']
                    ]);
                });

                Route::delete('/vendors/{id}/delete', 'VendorController@destroy')->name('vendors.delete');
                Route::resource('vendors', 'VendorController')->parameters(['vendors' => 'id'])->except('destroy');
                Route::delete('/venues/{id}/delete', 'VenueController@destroy')->name('venues.delete');
                Route::resource('venues', 'VenueController')->parameters(['venues' => 'id'])->except('destroy');
                Route::delete('/venue-bookings/{id}/delete', 'VenueBookingController@destroy')->name('venue-bookings.delete');
                Route::resource('venue-bookings', 'VenueBookingController')->parameters(['venue-bookings' => 'id'])->except('destroy');
                Route::delete('/vendor-bookings/{id}/delete', 'VendorBookingController@destroy')->name('vendor-bookings.delete');
                Route::resource('vendor-bookings', 'VendorBookingController')->parameters(['vendor-bookings' => 'id'])->except('destroy');
            });
        });
    });

    //Vendor Section
    Route::group(['namespace' => 'Vendor', 'prefix' => 'vendor/', 'as' => 'vendor.'], function () {
        //Protected Routes
        Route::group(['middleware' => ['auth', 'check.blocked']], function () {
            Route::get('/home', 'HomeController')->name('home');

            // Only verified users may access this routes section
            Route::group(['middleware' => 'verified'], function () {
                Route::delete('/vendors/{id}/delete', 'VendorController@destroy')->name('vendors.delete');
                Route::resource('vendors', 'VendorController')->parameters(['vendors' => 'id'])->except('destroy');
            });
        });
    });

    //Venue Section
    Route::group(['namespace' => 'Venue', 'prefix' => 'venue/', 'as' => 'venue.'], function () {
        //Protected Routes
        Route::group(['middleware' => ['auth', 'check.blocked']], function () {
            Route::get('/home', 'HomeController')->name('home');

            // Only verified users may access this routes section
            Route::group(['middleware' => 'verified'], function () {
                Route::delete('/venues/{id}/delete', 'VenueController@destroy')->name('venues.delete');
                Route::resource('venues', 'VenueController')->parameters(['venues' => 'id'])->except('destroy');

            });
        });
    });

    //Customer Section
    Route::group(['namespace' => 'Customer', 'prefix' => 'customer/', 'as' => 'customer.'], function () {
        //Protected Routes
        Route::group(['middleware' => ['auth', 'check.blocked']], function () {
            Route::get('/home', 'HomeController')->name('home');

            // Only verified users may access this routes section
            Route::group(['middleware' => 'verified'], function () {

            });
        });
    });

    //Common routes
    Route::group(['middleware' => ['auth', 'check.blocked', 'verified']], function () {
        Route::delete('/venue-bookings/{id}/delete', 'VenueBookingController@destroy')->name('venue-bookings.delete');
        Route::resource('venue-bookings', 'VenueBookingController')->parameters(['venue_booking' => 'id'])->except('destroy');
        Route::delete('/vendor-bookings/{id}/delete', 'VendorBookingController@destroy')->name('vendor-bookings.delete');
        Route::resource('vendor-bookings', 'VendorBookingController')->parameters(['vendor_booking' => 'id'])->except('destroy');
    });
});
