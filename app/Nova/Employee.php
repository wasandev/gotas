<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Panel;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Select;
use Wasandev\InputThaiAddress\InputThaiAddress;
use Wasandev\InputThaiAddress\ThaiAddressMetadata;
use Wasandev\InputThaiAddress\MapAddress;

class Employee extends Resource
{
    public static $displayInNavigation = false;
    public static $group = 'ข้อมูลบริษัท';
    public static $subGroup = "ข้อมูลบริษัท";
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Employee';

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
        return 'ข้อมูลพนักงาน';
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

            Image::make('รูปพนักงาน', 'imagefile')->hideFromIndex(),
            new Panel('ข้อมูลพนักงาน', $this->empdetailFields()),
            new Panel('ข้อมูลการติดต่อ', $this->contactFields()),
            new Panel('ที่อยู่', $this->addressFields()),
            new Panel('กรณีเป็นพนักงานขับรถ', $this->drivingFields()),


        ];
    }
    protected function empdetailFields()
    {
        return [

            Text::make('ชื่อพนักงาน', 'name')->sortable()
                ->size('w-1/2'),
            Text::make('เลขประจำตัวประชาชน', 'taxid')->sortable()->hideFromIndex()
                ->size('w-1/2'),

            Text::make('ชื่อเล่น', 'nickname')->sortable()
                ->size('w-1/2')
                ->nullable(),
            BelongsTo::make('ประจำสาขา', 'branch', 'App\Nova\Branch')
                ->size('w-1/2'),

            BelongsTo::make('ฝ่ายงาน', 'department', 'App\Nova\Department')->hideFromIndex()
                ->size('w-1/2'),
            BelongsTo::make('ตำแหน่งงาน', 'position', 'App\Nova\Position')->hideFromIndex()
                ->size('w-1/2'),
            Select::make('ประเภทพนักงาน', 'type')->options([
                'พนักงานออฟฟิศ' => 'พนักงานออฟฟิศ',
                'แรงงาน' => 'แรงงาน',
                'พนักงานขับรถ' => 'พนักงานขับรถ',
                'ผู้บริหาร' => 'ผู้บริหาร'
            ])->displayUsingLabels()
                ->size('w-1/2'),
            Select::make('สถานะพนักงาน', 'status')->options([
                'ประจำ',
                'ทดลองงาน',
                'สัญญาจ้าง',
                'ชั่วคราว',
                'รายวัน',
                'ปลด/ไล่ออก',
                'ลาออก',
                'เลิกจ้าง',
                'นักศึกษาฝึกงาน'
            ])->size('w-1/2')
                ->sortable(),
        ];
    }
    protected function contactFields()
    {
        return [
            Text::make('โทรศัพท์', 'phoneno')
                ->size('w-1/2'),
            Text::make('Line ID', 'line')->hideFromIndex()
                ->size('w-1/2'),
            Text::make('facebook', 'facebook')->hideFromIndex()
                ->size('w-1/2'),

        ];
    }


    protected function drivingFields()
    {
        return [
            BelongsTo::make('ประเภทใบขับขี่', 'driving_license_type', 'App\Nova\Driving_license_type')
                ->hideFromIndex()
                ->nullable()
                ->size('w-1/2'),
            Text::make('เลขที่ใบอนุญาตขับขี่', 'driving_license_no')->hideFromIndex()
                ->size('w-1/2'),
            Date::make('วันที่อนุญาต', 'driving_license_date')->hideFromIndex()
                ->size('w-1/2'),
            Date::make('วันที่หมดอายุ', 'driving_license_enddate')
                ->hideFromIndex()
                ->size('w-1/2'),

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
            ThaiAddressMetadata::make('อำเภอ/เขต', 'district')->fromValue('amphoe')
                ->hideFromIndex(),
            ThaiAddressMetadata::make('จังหวัด', 'province')->fromValue('province')
                ->hideFromIndex(),
            ThaiAddressMetadata::make('รหัสไปรษณีย์', 'postal_code')->fromValue('zipcode')
                ->hideFromIndex(),

            MapAddress::make('ตำแหน่งที่ตั้งบน Google Map', 'Location')
                ->hideFromIndex()

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
