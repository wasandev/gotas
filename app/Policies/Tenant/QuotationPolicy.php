<?php

namespace App\Policies\Tenant;

use App\Models\Tenant\Quotation;
use App\Models\Tenant\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotationPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Quotation $quotation)
    {
        return $user->hasPermissionTo('view quotations');
    }


    public function create(User $user)
    {
        return $user->hasPermissionTo('create quotations');
    }


    public function update(User $user, Quotation $quotation)
    {

        return $user->hasPermissionTo('edit quotations');
    }


    public function delete(User $user, Quotation $quotation)
    {
        return $user->hasPermissionTo('delete quotations');
    }
}
