<?php

namespace App\Queries\GridQueries;

use Illuminate\Support\Facades\DB;
use App\Queries\GridQueries\Contracts\DataQuery;


class RetailStoreQuery implements DataQuery
{

  public function data($column, $direction)
  {

    $rows = DB::table('retailers')
      ->select(
        'id as Id',
        'name as Name'
      )->orderBy($column, $direction)
      ->paginate(10);
    return $rows;
  }

  public function filteredData($column, $direction, $keyword)
  {

    $rows = DB::table('retailers')
      ->select(
        'id as Id',
        'name as Name'
      )->orWhere('name', 'like', '%' . $keyword . '%')
      ->orderBy($column, $direction)
      ->paginate(10);

    return $rows;
  }
}
