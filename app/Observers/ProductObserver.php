<?php

namespace App\Observers;

use App\Models\Tenant\Product;

class ProductObserver
{
    public function creating(Product $product)
    {
        $product->user_id = auth()->user()->id;
    }

    public function saving(Product $product)
    {
        $product->user_id = auth()->user()->id;
    }
}
