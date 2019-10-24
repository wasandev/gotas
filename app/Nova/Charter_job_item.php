<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Select;
use App\Models\Tenant\Address;
use App\Models\Tenant\Charter_job;
use App\Models\Tenant\Charter_route;
use App\Models\Tenant\Charter_price;
use App\Models\Tenant\Branch_area;
use App\Rules\Truckweight;

class Charter_job_item extends Resource
{
    public static $displayInNavigation = false;
    public static $group = "6.งานขนส่งแบบเหมา";
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Charter_job_item';

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
        'id',
    ];

    public static function label()
    {
        return 'จุดรับส่ง-รายการสินค้า';
    }
    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        $job = Charter_job::find(1);
        $charter_price = Charter_price::find($job->charter_price_id);
        $charter_route = Charter_route::find($charter_price->charter_route_id);
        $branch_area = Branch_area::find($charter_route->branch_area_id);
        $job = Charter_job::find(1);
        $charter_price = Charter_price::find($job->charter_price_id);
        $charter_route = Charter_route::find($charter_price->charter_route_id);
        $branch_area = Branch_area::find($charter_route->branch_area_id);
        $from_address = Address::where('customer_id', $job->customer_id)
            ->where('district', $branch_area->district)
            ->where('province', $branch_area->province)
            ->pluck('name', 'id');

        $to_address = Address::where('customer_id', $job->customer_id)
            ->where('district', $charter_route->to_district)
            ->where('province', $charter_route->to_province)
            ->pluck('name', 'id');



        return [
            ID::make()->sortable(),
            BelongsTo::make('ใบรับงานขนส่งเหมาคัน', 'charter_job', 'App\Nova\Charter_job')
                ->hideFromIndex()
                ->size('w-full'),
            Select::make('จุดรับสินค้าของลูกค้า', 'from_address_id')
                ->options($from_address)
                ->size('w-1/2')
                ->rules('required')
                ->onlyOnForms(),
            Select::make('จุดส่งสินค้าของลูกค้า', 'to_address_id')
                ->options($to_address)
                ->rules('required')
                ->size('w-1/2')
                ->onlyOnForms(),
            BelongsTo::make('จุดรับสินค้าของลูกค้า', 'from_address', 'App\Nova\Address')
                ->size('w-1/2')
                ->ExceptOnForms(),
            BelongsTo::make('จุดส่งสินค้าของลูกค้า', 'to_address', 'App\Nova\Address')
                ->size('w-1/2')
                ->ExceptOnForms(),

            BelongsTo::make('สินค้า', 'product', 'App\Nova\Product')
                ->size('w-1/3')
                ->rules('required'),
            Currency::make('จำนวน', 'amount')
                ->size('w-1/3')
                ->rules('required'),
            BelongsTo::make('หน่วยนับ', 'unit', 'App\Nova\Unit')
                ->size('w-1/3')
                ->rules('required'),
            Currency::make('น้ำหนักสินค้ารวม(กก.)', 'total_weight')
                ->size('w-1/2')
                ->rules('required', new Truckweight($charter_price->cartype_id))
                //->creationRules(new Truckweight($charter_price->cartype_id))
                //->updateRules(new Truckweight($charter_price->cartype_id), '{{resourceId}}')
                ->hideFromIndex(),
            Currency::make('มูลค่าสินค้ารวม(บาท)', 'productvalue')
                ->size('w-1/2')
                ->hideFromIndex(),
            DateTime::make('วันที่ไปรับสินค้า', 'pickup_date')
                ->size('w-1/2')
                ->rules('required')
                ->hideFromIndex(),
            DateTime::make('วันที่กำหนดส่งสินค้า', 'delivery_date')
                ->size('w-1/2')
                ->rules('required')
                ->hideFromIndex(),



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
