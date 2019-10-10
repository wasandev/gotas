<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Wasandev\InputThaiAddress\InputDistrict;
use Wasandev\InputThaiAddress\InputProvince;
use Laravel\Nova\Http\Requests\NovaRequest;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;



class Customer_product_price extends Resource
{
    //public static $displayInNavigation = false;
    public static $group = "4.งานด้านการขาย";
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Customer_product_price';

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
        return 'ค่าขนส่งสินค้าตามลูกค้า';
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
            Boolean::make('ใช้งาน', 'active')
                ->sortable()
                ->rules('required'),
            BelongsTo::make('ลูกค้า', 'customer', 'App\Nova\Customer')
                ->sortable()
                ->rules('required'),
            BelongsTo::make('สินค้า', 'product', 'App\Nova\Product')
                ->sortable()
                ->rules('required'),

            BelongsTo::make('จากสาขา', 'from_branch', 'App\Nova\Branch')
                ->sortable()
                ->rules('required'),
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
                ->sortable()
                ->rules('required'),
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
            new filters\Product,
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
            new Actions\SetCustomerProductPriceActive,
            new Actions\UpdateProductServicePrice,
            new Actions\UpdateProductServiceUnit,
            (new DownloadExcel)->withWriterType(\Maatwebsite\Excel\Excel::XLSX)->withHeadings(),
        ];
    }
}
