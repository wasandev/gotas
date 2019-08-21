<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Panel;
use Wasandev\InputThaiAddress\InputThaiAddress;
use Wasandev\InputThaiAddress\ThaiAddressMetadata;
use Wasandev\InputThaiAddress\MapAddress;
use Laravel\Nova\Fields\BelongsTo;



class Branch extends Resource
{



    //public static $displayInNavigation = false;
    public static $group = '1.งานสำหรับผู้ดูแลระบบ';




    //public static $subGroup = "ข้อมูลบริษัท";
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Branch';

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
        return 'ข้อมูลสาขา';
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
            Text::make('ชื่อสาขา', 'name')->sortable()
                ->size('w-1/2'),
            Text::make('รหัส', 'code')
                ->size('w-1/2'),
            Text::make('โทรศัพท์', 'phoneno')
                ->size('w-1/2'),
            Select::make('การเป็นเจ้าของ', 'type')->options([
                'owner' => 'บริษัทเป็นเจ้าของ',
                'pathner' => 'ร่วมบริการ'
            ])->displayUsingLabels()
                ->size('w-1/2'),

            new Panel('ที่อยู่', $this->addressFields()),



        ];
    }
    /**
     * Get the address fields for the resource.
     *
     * @return array
     */
    protected function addressFields()
    {
        return [

            Text::make('ที่อยู่', 'address')
                ->hideFromIndex(),
            InputThaiAddress::make('ตำบล/แขวง', 'sub_district')
                ->hideFromIndex()
                ->withValues(['district', 'amphoe', 'province', 'zipcode']),
            ThaiAddressMetadata::make('อำเภอ/เขต', 'district')->fromValue('amphoe'),
            ThaiAddressMetadata::make('จังหวัด', 'province')->fromValue('province'),
            ThaiAddressMetadata::make('รหัสไปรษณีย์', 'postal_code')->fromValue('zipcode')
                ->hideFromIndex(),
            MapAddress::make('ตำแหน่งที่ตั้งบน Google Map', 'Location')
                ->hideFromIndex(),
            BelongsTo::make('ผู้ทำรายการ', 'user', 'App\Nova\User')
                ->onlyOnDetail(),

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

    public static function availableForNavigation(Request $request)
    {
        $hostname  = app(\Hyn\Tenancy\Environment::class)->hostname();

        if (is_null($hostname)) {
            return false;
        }
        return true;
    }
}
