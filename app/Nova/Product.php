<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Boolean;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;




class Product extends Resource
{
    public static $displayInNavigation = false;
    public static $group = "ฝ่ายขาย/การตลาด";
    public static $subGroup = "ข้อมูลสินค้า";

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
                ->size('w-full'),

            BelongsTo::make('ประเภทสินค้า', 'category', 'App\Nova\Category')
                ->size('w-1/2'),
            BelongsTo::make('ลักษณะสินค้า', 'product_style', 'App\Nova\Product_style')
                ->size('w-1/2'),
            Text::make('ชื่อสินค้า', 'name')
                ->size('w-1/2'),
            BelongsTo::make('หน่วยนับ', 'unit', 'App\Nova\Unit')
                ->size('w-1/2'),

            Currency::make('กว้าง(ซม.)', 'weight')->format('%.2n')
                ->size('w-1/3'),
            Currency::make('ยาว(ซม.)', 'length')->format('%.2n')
                ->size('w-1/3'),

            Currency::make('สูง(ซม.)', 'height')->format('%.2n')
                ->size('w-1/3'),

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
            new DownloadExcel,

        ];
    }
}
