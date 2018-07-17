<?php

namespace App\Http\Services;

use App\Models\Vendor;

use Doctrine\ORM\QueryBuilder;

class UserService
{
    public function getSelfVendor()
    {
        $user = request()->user();
        $vendor = Vendor::find($user->vendor_id);

        if (!$vendor) {
            throw new \Illuminate\Auth\AuthenticationException("Must register your company first.");
        }

        return $vendor;
    }
}