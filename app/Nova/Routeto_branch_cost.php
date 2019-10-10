<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;

class Routeto_branch_cost extends Resource
{
    //public static $displayInNavigation = false;
    public static $group = "5.งานจัดการการขนส่ง";
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Routeto_branch_cost';

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
        return 'ต้นทุนตามเส้นทางระหว่างสาขา';
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
            BelongsTo::make('เส้นทางขนส่งระหว่างสาขา', 'routeto_branch', 'App\Nova\Routeto_branch')
                ->sortable()
                ->rules('required'),
            BelongsTo::make('ประเภทรถ', 'cartype', 'App\Nova\Cartype')
                ->sortable()
                ->rules('required'),
            BelongsTo::make('ลักษณะรถ', 'carstyle', 'App\Nova\Carstyle')
                ->sortable()
                ->rules('required'),


            Currency::make('ค่าจ้างรถ(กรณีรถร่วม)', 'car_charge')
                ->format('%.2n')
                ->sortable()
                ->rules('required'),
            Currency::make('ค่าเที่ยวคนขับ(กรณีรถบริษัท)', 'driver_charge')
                ->format('%.2n')
                ->sortable()
                ->rules('required'),
            Currency::make('ค่าเชื้อเพลิงที่ใช้(บาท)', 'fuel_cost')->format('%.2n')
                ->sortable()
                ->rules('required'),
            Currency::make('จำนวนเชื้อเพลิงที่ใช้(ลิตร)', 'fuel_amount')
                ->format('%.2n')
                ->sortable()
                ->rules('required')
                ->hideFromIndex(),
            Number::make('ระยะเวลาขนส่ง(ชม.)', 'timespent')
                ->hideFromIndex(),
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
