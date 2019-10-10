<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use SebastianBergmann\CodeCoverage\Filter;
use Wasandev\InputThaiAddress\InputDistrict;
use Wasandev\InputThaiAddress\InputProvince;

class Productservice_price extends Resource
{
    //public static $displayInNavigation = false;
    public static $group = "4.งานด้านการขาย";
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Productservice_price';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'district', 'province'
    ];

    public static function label()
    {
        return 'ค่าขนส่งตามสินค้า';
    }
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

            BelongsTo::make('สินค้า', 'product', 'App\Nova\Product')
                ->sortable()
                ->searchable(),
            BelongsTo::make('สาขาต้นทาง', 'from_branch', 'App\Nova\Branch')
                ->sortable(),
            InputDistrict::make('ไปอำเภอ/เขต', 'district')
                ->withValues(['amphoe', 'province'])
                ->fromValue('amphoe')
                ->sortable()
                ->rules('required'),
            InputProvince::make('ไปจังหวัด', 'province')
                ->withValues(['amphoe', 'province'])
                ->fromValue('province')
                ->sortable()
                ->rules('required'),

            BelongsTo::make('หน่วยนับ', 'unit', 'App\Nova\Unit')
                ->sortable(),
            Currency::make('ค่าขนส่ง', 'price')
                ->sortable()
                ->rules('required'),

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
        return [
            new Filters\FromBranch,
            new Filters\Province,
            new Filters\Product,
            new Filters\Unit,

        ];
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
        return [
            new Actions\UpdateProductServicePrice,
            new Actions\UpdateProductServiceUnit,
        ];
    }
}
