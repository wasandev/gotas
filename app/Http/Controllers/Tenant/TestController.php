<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Models\Tenant\Province;
use App\Models\Tenant\District;
use App\Models\Tenant\Province;
//use App\Models\Tenant\Customer;
//use App\Models\Tenant\Customer_product;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

class TestController extends Controller
{



    public function index()
    {

        $districts = load('district', 'province');



        foreach ($districts as $district) {
            echo $district->name;
        }
    }
}
