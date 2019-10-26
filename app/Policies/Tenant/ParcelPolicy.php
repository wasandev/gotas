<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\User;
use App\Models\Tenant\Parcel;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParcelPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Parcel $parcel)
    {
        return $user->hasPermissionTo('view parcels');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create parcels');
    }


    public function update(User $user, Parcel $parcel)
    {

        return $user->hasPermissionTo('edit parcels');
    }


    public function delete(User $user, Parcel $parcel)
    {
        return $user->hasPermissionTo('delete parcels');
    }
}
