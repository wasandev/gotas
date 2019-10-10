<?php

namespace App\Observers;

use App\Models\Tenant\Parcel;

class ParcelObserver
{

    /**
     * Handle the retailer "creating" event.
     *
     * @param  \App\Models\Tenant\parcel  $parcel
     * @return void
     */
    public function creating(Parcel $parcel)
    {
        $parcel->user_id = auth()->user()->id;
    }
    public function saving(Parcel $parcel)
    {
        $parcel->user_id = auth()->user()->id;
    }
}
