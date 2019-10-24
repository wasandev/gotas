<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Boolean;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;




class Product extends Resource
{
    //public static $displayInNavigation = false;
    public static $group = "4.งานด้านการขาย";
    //public static $subGroup = "ข้อมูลสินค้า";

    //public static $displayInNavigation = false;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Product';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name'
    ];
    public static function label()
    {
        return 'ข้อมูลสินค้า';
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
            Boolean::make('ใช้งาน', 'status')
                ->size('w-full')
                ->hideWhenCreating(),

            BelongsTo::make('ประเภทสินค้า', 'category', 'App\Nova\Category')
                ->sortable()
                ->size('w-1/2'),
            BelongsTo::make('ลักษณะสินค้า', 'product_style', 'App\Nova\Product_style')
                ->sortable()
                ->size('w-1/2'),
            Text::make('ชื่อสินค้า', 'name')
                ->sortable()
                ->rules('required')
                ->size('w-1/2'),
            Currency::make('กว้าง(ซม.)', 'width')
                ->hideFromIndex()
                ->size('w-1/2'),
            Currency::make('ยาว(ซม.)', 'length')
                ->hideFromIndex()
                ->size('w-1/2'),
            Currency::make('สูง(ซม.)', 'height')
                ->size('w-1/2')
                ->hideFromIndex(),
            Currency::make('น้ำหนัก(กก.)', 'weight')
                ->hideFromIndex()
                ->size('w-1/2'),
            BelongsTo::make('หน่วยนับ', 'unit', 'App\Nova\Unit')
                ->size('w-1/2'),
            BelongsTo::make('ผู้ทำรายการ', 'user', 'App\Nova\User')
                ->onlyOnDetail(),
            HasMany::make('ค่าขนส่งตามสินค้า', 'productservice_price', 'App\Nova\Productservice_price'),
            // BelongsToMany::make('ลูกค้าที่ใช้สินค้านี้', 'customer', 'App\Nova\Customer'),
            // HasMany::make('ค่าขนส่งสินค้าตามลูกค้า', 'customer_product_prices', 'App\Nova\Customer_product_price')

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
        return [
            (new Actions\AddProductServicePrice)->showOnTableRow(),
            //new Actions\AddProductCustomerPrice,
            new DownloadExcel,


        ];
    }
}
