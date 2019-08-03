<?php

namespace App\Queries\GridQueries;

use Illuminate\Http\Request;
use App\Queries\GridQueries\Contracts\DataQuery;


class GridQuery
{

    public static function sendData(Request $request, DataQuery $query)
    {

        // set sort by column and direction

        list($column, $direction) = static::setSort($request, $query);


        // search by keyword with column sort


        if ($request->has('keyword')) {

            return static::keywordFilter($request, $query, $column, $direction);
        }

        // return data

        return static::getData($query, $column, $direction);
    }

    public static function setSort(Request $request, $query)
    {

        // set sort by column with default

        list($column, $direction) = static::setDefaults($query);


        if ($request->has('column')) {

            $column = $request->get('column');

            if ($column == 'Id') {
                $direction = $request->get('direction') == 1 ? 'asc' : 'desc';

                return [$column, $direction];
            } else {

                $direction = $request->get('direction') == 1 ? 'desc' : 'asc';

                return [$column, $direction];
            }
        }

        return [$column, $direction];
    }

    public static function setDefaults($query)
    {

        switch ($query) {

            case $query instanceof MarketingImageQuery:

                $column = 'image_weight';
                $direction = 'asc';

                break;

            default:

                $column = 'id';
                $direction = 'asc';

                break;
        }

        return list($column, $direction) = [$column, $direction];
    }

    public static function keywordFilter(Request $request, $query, $column, $direction)
    {
        $keyword = $request->get('keyword');

        return response()->json($query->filteredData(
            $column,
            $direction,
            $keyword
        ));
    }


    public static function getData($query, $column, $direction)
    {

        return response()->json($query->data($column, $direction));
    }
}

