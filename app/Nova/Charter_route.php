<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Wasandev\InputThaiAddress\InputProvince;
use Wasandev\InputThaiAddress\InputDistrict;
use Laravel\Nova\Http\Requests\NovaRequest;
use Manmohanjit\BelongsToDependency\BelongsToDependency;
use SebastianBergmann\CodeCoverage\Filter;

class Charter_route extends Resource
{
    //public static $displayInNavigation = false;
    public static $group = "6.งานขนส่งแบบเหมา";

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Charter_route';

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
        'id', 'name',  'to_district', 'to_province'
    ];

    public static function label()
    {
        return 'เส้นทางขนส่งแบบเหมาคัน';
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
                ->sortable(),
            Text::make('ชื่อเส้นทาง', 'name')
                ->sortable()
                ->rules('required'),
            //Belongsto::make('สาขาต้นทาง', 'branch', 'App\Nova\Branch'),
            Belongsto::make('อำเภอต้นทาง', 'branch_area', 'App\Nova\Branch_area')
                ->searchable(),

            InputDistrict::make('อำเภอ/เขต ปลายทาง', 'to_district')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('amphoe')
                ->sortable()
                ->rules('required'),
            InputProvince::make('จังหวัดปลายทาง', 'to_province')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('province')
                ->sortable()
                ->rules('required'),


            Currency::make('ระยะทาง(กม.)', 'distance')
                ->sortable()
                ->rules('required'),
            BelongsTo::make('ผู้ทำรายการ', 'user', 'App\Nova\User')
                ->onlyOnDetail(),
            HasMany::make('ต้นทุนขนส่งแบบเหมาคัน', 'charter_route_costs', 'App\Nova\Charter_route_cost'),
            HasMany::make('ราคาค่าขนส่งแบบเหมาคัน', 'charter_prices', 'App\Nova\Charter_price'),
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
            new Filters\ToProvince,
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
