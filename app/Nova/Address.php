<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Wasandev\InputThaiAddress\InputThaiAddress;
use Wasandev\InputThaiAddress\ThaiAddressMetadata;
use Wasandev\InputThaiAddress\MapAddress;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;

class Address extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $displayInNavigation = false;
    public static $model = 'App\Models\Tenant\Address';

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

            Text::make('ที่อยู่', 'address'),
            InputThaiAddress::make('ตำบล/แขวง', 'sub_district')
                ->withValues(['district', 'amphoe', 'province', 'zipcode']),
            ThaiAddressMetadata::make('อำเภอ/เขต', 'district')->fromValue('amphoe'),

            ThaiAddressMetadata::make('จังหวัด', 'province')->fromValue('province'),
            ThaiAddressMetadata::make('รหัสไปรษณีย์', 'postal_code')->fromValue('zipcode'),
            MapAddress::make('ตำแหน่งที่ตั้งบน Google Map', 'Location')->hideFromIndex(),
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
