<?php
if (!function_exists('isAdmin')) {
    function isAdmin($userId = null)
    {
        $roles = ['Admin','Super Admin'];
        if (empty($userId)) {
            return (bool)auth()->user()->hasAnyRole($roles);
        } else {
            $query = with('roles')->where('id', $userId)->whereHas('roles', function ($q) use($roles) {
                $q->whereIn('name', $roles);
            })->count();
            return (bool)('\\App\\Models\\User::' . $query);
        }
    }
}

if(!function_exists('getPermissionHeader'))
{
    function getPermissionHeader($permission)
    {
        $permissionHeaders = [
            'admin.roles.index' => 'Role Management',
            'admin.users.index' => 'User Management',
            'admin.students.index' => 'Student Management',
            'admin.tutors.index' => 'Tutor Management',
            'admin.profile.index' => 'Profile Settings',
            'admin.categories.index' => 'Course Category Management',
            'admin.courses.index' => 'Course Management',
            'admin.packages.index' => 'Course Package Management',
            'admin.bookings.index' => 'Purchased Courses',
            'admin.payments.index' => 'Payment Management',
            'admin.notifications.index' => 'Notification Management',
        ];
        $header = $permission;
        foreach ($permissionHeaders as $key => $val)
        {
            if($key == $permission)
            {
                $header = $val;
                break;
            }
        }
        return $header;
    }
}
