<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;

class Charter_price extends Resource
{
    //public static $displayInNavigation = false;
    public static $group = "6.งานขนส่งแบบเหมา";
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Charter_price';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    //public static $title = 'charter_route->name';

    public function title()
    {
        return $this->charter_route->name . '->' . $this->cartype->name . '->' . $this->carstyle->name . '->' . $this->price;
    }
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
        return 'ค่าขนส่งแบบเหมาคัน';
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
                ->sortable()
                ->rules('required'),
            BelongsTo::make('เส้นทางขนส่ง', 'charter_route', 'App\Nova\Charter_route')
                ->sortable()
                ->rules('required'),
            BelongsTo::make('ประเภทรถ', 'cartype', 'App\Nova\Cartype')
                ->sortable()
                ->rules('required'),
            BelongsTo::make('ลักษณะรถ', 'carstyle', 'App\Nova\Carstyle')
                ->sortable()
                ->rules('required'),

            Currency::make('ค่าขนส่ง/เที่ยว', 'price')
                ->sortable()
                ->format('%.2n')
                ->rules('required'),

            Number::make('จำนวนจุดรับส่งไม่เกิน', 'pickuppoint')
                ->withMeta(['value' => 2]),

            Currency::make('จุดรับส่งเกินที่กำหนดคิดค่าบริการจุดละ', 'overpointcharge')
                ->format('%.2n')
                ->sortable()
                ->rules('required')
                ->hideFromIndex()
                ->withMeta(['value' => 500]),
            BelongsTo::make('ผู้ทำรายการ', 'user', 'App\Nova\User')
                ->onlyOndetail(),
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
