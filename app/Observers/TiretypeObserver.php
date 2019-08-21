<?php

namespace App\Observers;

use App\Models\Tenant\Tiretype;
use Doctrine\DBAL\Types\Type;

class TiretypeObserver
{
    public function creating(Tiretype $tiretype)
    {
        $tiretype->user_id = auth()->user()->id;
    }

    public function saving(Tiretype $tiretype)
    {
        $tiretype->user_id = auth()->user()->id;
    }
}
