<?php

namespace App\Observers;

use App\Models\Tenant\Category;

class CategoryObserver
{
    public function creating(Category $category)
    {
        $category->user_id = auth()->user()->id;
    }

    public function saving(Category $category)
    {
        $category->user_id = auth()->user()->id;
    }
}
