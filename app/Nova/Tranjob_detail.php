<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Text;

class Tranjob_detail extends Resource
{
    public static $displayInNavigation = false;
    public static $group = 'งานขนส่ง';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Tranjob_detail';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'tranjob_id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'product_id'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('ใบรับงานขนส่ง', 'tranjob', 'App\Nova\Tranjob'),
            BelongsTo::make('สินค้า', 'product', 'App\Nova\Product'),
            Currency::make('จำนวนสินค้า', 'amount')->format('%.2n'),
            BelongsTo::make('หน่วยนับ', 'unit', 'App\Nova\Unit'),
            Currency::make('ค่าขนส่ง', 'tranprice')->format('%.2n'),
            Text::make('รวมค่าขนส่ง', function () {
                return $this->amount * $this->tranprice;
            }),

            Currency::make('มูลค่าสินค้า', 'productprice')->format('%.2n')->hideFromIndex(),
            Text::make('หมายเหตุ', 'remark'),


        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
