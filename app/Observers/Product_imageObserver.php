<?php

namespace App\Observers;

use App\Models\Tenant\Product_image;

class Product_imageObserver
{
    public function creating(Product_image $product_image)
    {
        $product_image->user_id = auth()->user()->id;
    }

    public function saving(Product_image $product_image)
    {
        $product_image->user_id = auth()->user()->id;
    }
}
