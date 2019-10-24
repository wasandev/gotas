<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Address;
use App\Models\Tenant\Charter_job;
use App\Models\Tenant\Charter_route;
use App\Models\Tenant\Branch_area;
use App\Models\Tenant\Charter_price;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

class TestController extends Controller
{



    public function index()
    {

        $job = Charter_job::find(1);
        $charter_price = Charter_price::find($job->charter_price_id);
        $charter_route = Charter_route::find($charter_price->charter_route_id);
        $branch_area = Branch_area::find($charter_route->branch_area_id);
        $from_address = Address::where('customer_id', $job->customer_id)
            ->where('district', $branch_area->district)
            ->where('province', $branch_area->province)
            ->pluck('name', 'id');
        dd($from_address);
        $to_address = Address::where('customer_id', $job->customer_id)
            ->where('district', $charter_route->to_district)
            ->where('province', $charter_route->to_province)
            ->pluck('name', 'id');
        dd($to_address);
    }
}
