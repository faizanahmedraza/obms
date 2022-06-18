<?php
return [
    'private_roles' => [
        'Super Admin',
        'Admin',
        'Vendor',
        'Venue',
        'Customer'
    ],

    'permission_headers' => [
        'Full Access' => 'access_all',
        'User Management' => 'user_management_all',
        'Roles and Permissions' => 'roles_all',
        'Vendor Services' => 'services_all',
        'Venue Services' => 'venues_all',
    ],

    'admin_permissions' => [
        'access_all',
        'user_management_all',
        'user_management_read',
        'user_management_create',
        'user_management_update',
        'user_management_delete',
        'roles_all',
        'roles_read',
        'roles_create',
        'roles_update',
        'roles_delete',
    ],

    'vendor_permissions' => [
        'services_all',
        'services_read',
        'services_create',
        'services_update',
        'services_delete',
    ],

    'venue_permissions' => [
        'venues_all',
        'venues_read',
        'venues_create',
        'venues_update',
        'venues_delete',
    ],

    'common_permissions' => [
        'venue_bookings_all',
        'venue_bookings_read',
        'venue_bookings_create',
        'venue_bookings_update',
        'venue_bookings_delete',
        'vendor_bookings_all',
        'vendor_bookings_read',
        'vendor_bookings_create',
        'vendor_bookings_update',
        'vendor_bookings_delete',
    ]
];