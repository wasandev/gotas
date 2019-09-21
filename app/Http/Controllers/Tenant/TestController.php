<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Models\Tenant\Province;
use App\Models\Tenant\Product_service_price;
use App\Models\Tenant\Product;
use App\Models\Tenant\Branch_route;
use App\Models\Tenant\Branch_route_area;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

class TestController extends Controller
{



    public function index()
    {
        // $branch_route = Branch_route::all()
        // $branch_route->posts()
        //     ->where('active', 1)
        //     ->orWhere('votes', '>=', 100)
        //     ->get();
    }
}
