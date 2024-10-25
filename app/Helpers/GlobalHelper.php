<?php

/** check permission */
if(!function_exists('canAccess')) {
    function canAccess(array $permissions) : bool
    {
        $permission = auth()->guard('admin')->user()->hasAnyPermission($permissions);
        $superAdmin = auth()->guard('admin')->user()->hasRole('Super Admin');
        if($permission || $superAdmin) {
            return true;
        }
        return false;
    }
}
