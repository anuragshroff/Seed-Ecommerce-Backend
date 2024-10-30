<?php

use App\Models\ApiSetting;
use App\Models\Setting;

if (!function_exists('getGeneralSetting')) {
    function getGeneralSetting()
    {
        return Setting::first();
    }
}


if (!function_exists('getApiSetting')) {
    function getApiSetting()
    {
        return ApiSetting::first();
    }
}





/** check permission */
if(!function_exists('canAccess')) {
    function canAccess(array $permissions) : bool
    {
        $permission = auth()->guard('web')->user()->hasAnyPermission($permissions);
        $superAdmin = auth()->guard('web')->user()->hasRole('Super Admin');
        if($permission || $superAdmin) {
            return true;
        }
        return false;
    }
}
