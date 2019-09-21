<?php

namespace Wasandev\TranjobEntry\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant\Product;

class ProductController extends Controller
{
    public function search()
    {
        $results = Product::orderBy('name')
            ->when(request('q'), function ($query) {
                $query->where('name', 'like', '%' . request('q') . '%');
            })
            ->limit(6)
            ->get();

        return response()
            ->json(['results' => $results]);
    }
}
