<?php

namespace App\Queries\GridQueries\Contracts;

interface DataQuery
{

    public function data($column, $direction);

    public function filteredData($column, $direction, $keyword);

}