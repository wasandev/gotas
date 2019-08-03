<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queries\GridQueries\GridQuery;
use App\Queries\GridQueries\RetailStoreQuery;

class ApiController extends Controller
{
    public function retailStoreData(Request $request)
    {
        return GridQuery::sendData($request, new RetailStoreQuery);
    }
}
