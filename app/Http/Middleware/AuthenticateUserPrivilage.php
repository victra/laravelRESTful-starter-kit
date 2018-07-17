<?php

namespace App\Http\Middleware;

use App\Models\Role;

class AuthenticateUserPrivilage
{
    /**
     * @param Request $request
     * @param $next
     * @param $privileges
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle($request, $next, $privileges='')
    {
        $role = request()->user()->role;

        $privilegeRoles = explode('|', $privileges);
        foreach ($privilegeRoles as $privilege) {
            if ($role->hash_id == $privilege) {
                return $next($request);
            }
        }

        abort(403, 'Permission Denied.');
    }
}