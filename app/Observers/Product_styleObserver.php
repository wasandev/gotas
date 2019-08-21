<?php

namespace App\Observers;

use App\Models\Tenant\Product_style;

class Product_styleObserver
{
    public function creating(Product_style $product_style)
    {
        $product_style->user_id = auth()->user()->id;
    }

    public function saving(Product_style $product_style)
    {
        $product_style->user_id = auth()->user()->id;
    }
}
