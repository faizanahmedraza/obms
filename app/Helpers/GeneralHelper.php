<?php
if (!function_exists('isAdmin')) {
    function isAdmin($userId = null)
    {
        $roles = ['Admin', 'Super Admin'];
        if (empty($userId)) {
            return (bool)auth()->user()->hasAnyRole($roles);
        } else {
            $query = with('roles')->where('id', $userId)->whereHas('roles', function ($q) use ($roles) {
                $q->whereIn('name', $roles);
            })->count();
            return (bool)('\\App\\Models\\User::' . $query);
        }
    }
}


if (!function_exists('urlAccessUserType')) {
    function oldUrlAccessMatch($match, $segment = 0)
    {
        $escape = env('APP_ENV') == "production" ? "https://" : "http://";
        $url = str_replace($escape, "", url()->previous());
        if (isset(explode('/', $url)[$segment]) && explode('/', $url)[$segment] == $match) {
            return true;
        }
        return false;
    }
}

if(!function_exists('getPermissionHeader'))
{
    function getPermissionHeader($permission)
    {
        $permissionHeaders = array_flip(config('obms.permission_headers'));
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