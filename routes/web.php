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

Route::get('/s', 'HomeController@index')->name('home');
Route::get('/venues', 'VenueController@index')->name('venues');
Route::get('/events', 'EventController@index')->name('events');
Route::get('/services', 'ServiceController@index')->name('vendors');
Route::get('/our-partners', 'GalleryController@index')->name('gallery');
Route::get('/contact-us', 'ContactUsController@index')->name('contact_us');

//Website
Route::group(['namespace' => 'Web', 'as' => 'web.'], function () {
    Route::get('/', 'HomeController')->name('home');

    Route::group(['namespace' => 'Venues','prefix' => 'venues'], function () {
        Route::get('/banquets', 'BanquetController@index')->name('banquets');
        Route::get('/banquets/{id}', 'BanquetController@show')->name('banquets.details');
        Route::get('/lawns', 'LawnController@index')->name('lawns');
        Route::get('/lawns/{id}', 'LawnController@show')->name('lawns.details');
        Route::get('/hotels', 'HotelController@index')->name('hotels');
        Route::get('/hotels/{id}', 'HotelController@show')->name('hotels.details');
        Route::get('/marriage-halls', 'MarriageController@index')->name('marriage.halls');
        Route::get('/marriage-halls/{id}', 'MarriageController@show')->name('marriage.halls.details');
        Route::get('/resorts', 'ResortController@index')->name('resorts');
        Route::get('/resorts/{id}', 'ResortController@show')->name('resorts.details');
    });

    //Authentication and Authorization
    Route::group(['namespace' => 'Auth'], function () {
        Route::group(['middleware' => 'guest'], function () {
            Route::get('/signin', 'SignInController@index')->name('signin');
            Route::post('/signin', 'SignInController@store')->name('signin.store');
            Route::get('/signup', 'SignUpController@index')->name('signup');
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

            //Protected Routes
            Route::group(['middleware' => ['auth', 'check.blocked']], function () {
                Route::post('/logout', 'SignOutController')->name('logout');
//                Route::get('/email/verify', 'EmailVerificationController@index')->name('verification.notice');
//                Route::get('/email/verify/{id}/{hash}', 'EmailVerificationController@verifyEmail')->middleware('signed')->name('verification.verify');
//                Route::post('/email/verification-notification', 'EmailVerificationController@resendEmailNotification')->middleware('throttle:6,1')->name('verification.send');
            });
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
            });

            //Protected Routes
            Route::group(['middleware' => ['auth', 'check.blocked']], function () {
                Route::post('/logout', 'LogoutController')->name('logout');
                Route::get('/email/verify', 'EmailVerificationController@index')->name('verification.notice');
                Route::get('/email/verify/{id}/{hash}', 'EmailVerificationController@verifyEmail')->middleware('signed')->name('verification.verify');
                Route::post('/email/verification-notification', 'EmailVerificationController@resendEmailNotification')->middleware('throttle:6,1')->name('verification.send');

                Route::get('/admin-users', function () {
                    $admins = \App\Models\User::with('roles')->whereHas('roles', function ($q) {
                        $q->whereIn('name', ['Super Admin', 'Admin']);
                    });
                    return view('cms.admin.user-management.admins.index', compact('admins'));
                });
                Route::get('/customers', function () {
                    $users = \App\Models\User::with('roles')->whereHas('roles', function ($q) {
                        $q->where('name', 'Customer');
                    });
                    return view('cms.admin.user-management.users.index', compact('users'));
                });
                Route::get('/vendors', function () {
                    $vendors = \App\Models\User::with('roles')->whereHas('roles', function ($q) {
                        $q->where('name', 'Vendor');
                    });
                    return view('cms.admin.user-management.vendors.index', compact('vendors'));
                });
            });
        });

        //Protected Routes
        Route::group(['middleware' => ['auth', 'check.blocked']], function () {
            Route::get('/home', 'HomeController')->name('home');

            // Only verified users may access this routes section
            Route::group(['middleware' => 'verified'], function () {
                Route::group(['namespace' => 'UserManagement'], function () {
                    // User, Roles and  Permissions Management
                    Route::resources([
                        'users' => 'UserController',
                        'roles' => 'RoleController',
                    ]);
                });
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

            });
        });
    });
});
