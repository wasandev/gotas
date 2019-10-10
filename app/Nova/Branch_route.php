<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Currency;

class Branch_route extends Resource
{
    //public static $displayInNavigation = false;
    public static $group = "5.งานจัดการการขนส่ง";
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Branch_route';

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
        'name',
    ];



    public static function label()
    {
        return 'เส้นทางขนส่งภายในสาขา';
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
            BelongsTo::make('สาขา', 'branch', 'App\Nova\Branch')
                ->sortable(),
            Text::make('ชื่อเส้นทาง', 'name')
                ->sortable(),

            Currency::make('ระยะทางจากสาขา(กม.)', 'distance'),
            HasMany::make('อำเภอในเส้นทาง', 'branch_route_districts', 'App\Nova\Branch_route_district'),
            HasMany::make('ต้นทุนตามเส้นทางของสาขา', 'branch_route_costs', 'App\Nova\Branch_route_cost')

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
            new Filters\Branch,
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
        return [];
    }
}
