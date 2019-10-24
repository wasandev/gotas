<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Panel;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\BelongsTo;
use Wasandev\InputThaiAddress\InputSubDistrict;
use Wasandev\InputThaiAddress\InputDistrict;
use Wasandev\InputThaiAddress\InputProvince;
use Wasandev\InputThaiAddress\InputPostalCode;
use Laravel\Nova\Fields\Textarea;
use Jfeid\NovaGoogleMaps\NovaGoogleMaps;
use Illuminate\Support\Facades\Storage;

class CompanyProfile extends Resource
{
    //public static $displayInNavigation = false;
    public static $group = '1.งานสำหรับผู้ดูแลระบบ';
    //public static $subGroup = "ข้อมูลบริษัท";

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\CompanyProfile';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'company_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'company_name'
    ];
    public static function label()
    {
        return 'รายละเอียดบริษัท';
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
            Text::make('ชื่อบริษัท', 'company_name')
                ->size('w-1/2'),
            Text::make('เลขประจำตัวผู้เสียภาษี', 'taxid')
                ->size('w-1/2')
                ->rules('required', 'digits:13', 'numeric'),

            new Panel('ที่อยู่', $this->addressFields()),
            new Panel('ข้อมูลการติดต่อ', $this->contactFields()),

            new Panel('อื่นๆ', $this->otherFields()),


        ];
    }
    /**
     * Get the address fields for the resource.
     *
     * @return array
     */
    protected function contactFields()
    {
        return [
            Text::make('โทรศัพท์', 'phoneno')
                ->size('w-1/2')
                ->rules('required', 'numeric'),
            Text::make('เว็บไซต์', 'weburl')
                ->size('w-1/2')
                ->hideFromIndex(),
            Text::make('Facebook', 'facebook')
                ->size('w-1/2')
                ->hideFromIndex(),
            Text::make('Line', 'line')
                ->size('w-1/2')
                ->hideFromIndex(),
            Text::make('อีเมล์', 'email')
                ->size('w-full')
                ->hideFromIndex(),

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

            Text::make('ที่อยู่', 'address')->hideFromIndex()
                ->rules('required'),
            InputSubDistrict::make('ตำบล/แขวง', 'sub_district')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('district')
                ->hideFromIndex(),
            InputDistrict::make('อำเภอ/เขต', 'district')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('amphoe')
                ->sortable()
                ->rules('required'),
            InputProvince::make('จังหวัด', 'province')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('province')
                ->sortable()
                ->rules('required'),
            InputPostalCode::make('รหัสไปรษณีย์', 'postal_code')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('zipcode')
                ->hideFromIndex(),

            NovaGoogleMaps::make('ตำแหน่งที่ตั้งบน Google Map', 'location')->setValue($this->location_lat, $this->location_lng)
                ->hideFromIndex(),




        ];
    }

    /**
     * Get the address fields for the resource.
     *
     * @return array
     */
    protected function otherFields()
    {
        return [
            Image::make('โลโก้ (ขนาดไม่เกิน 100 * 100 px)', 'logofile')
                ->disk('tenant')
                ->path('media')
                ->maxWidth(100)
                ->prunable(),

            Image::make('ภาพหน้าร้าน', 'imagefile')
                ->hideFromIndex()
                ->disk('tenant')
                ->path('media')
                ->prunable(),

            Textarea::make('รายละเอียดอื่นๆ', 'description')->hideFromIndex(),
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
}
