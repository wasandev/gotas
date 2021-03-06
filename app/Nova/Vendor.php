<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Panel;
use Illuminate\Http\Request;
use Wasandev\InputThaiAddress\InputSubDistrict;
use Wasandev\InputThaiAddress\InputDistrict;
use Wasandev\InputThaiAddress\InputProvince;
use Wasandev\InputThaiAddress\InputPostalCode;
use Jfeid\NovaGoogleMaps\NovaGoogleMaps;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Number;

class Vendor extends Resource
{
    //public static $displayInNavigation = false;
    public static $group = "6.งานด้านค่าใช้จ่าย";
    //public static $subGroup = "ข้อมูลผู้จำหน่าย/เจ้าหนี้";
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Vendor';

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
        'name', 'district', 'province'
    ];
    public static function label()
    {
        return 'ผู้จำหน่าย/ผู้ร่วมบริการ';
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
            Boolean::make('ใช้งาน', 'status')->size('w-full'),
            Text::make('ชื่อผู้จำหน่าย/ผู้ร่วมบริการ/เจ้าของรถ', 'name')
                ->sortable()
                ->rules('required')
                ->size('w-1/2'),
            Text::make('เลขประจำตัวผู้เสียภาษี', 'taxid')
                ->hideFromIndex()
                ->size('w-1/2'),
            Select::make('ประเภท', 'type')->options([
                'company' => 'นิติบุคคล',
                'person' => 'บุคคลธรรมดา'
            ])->displayUsingLabels()
                ->hideFromIndex()->size('w-1/2'),
            Select::make('การชำระเงิน', 'paymenttype')->options([
                'เงินสด' => 'เงินสด',
                'วางบิล' => 'วางบิล'
            ])
                ->hideFromIndex()
                ->size('w-1/2')
                ->withMeta(['value' => 'เงินสด']),
            Number::make('ระยะเวลาเครดิต', 'creditterm')
                ->withMeta(['value' => 0])
                ->size('w-1/2')
                ->hideFromIndex(),
            BelongsTo::make('ประเภทธุรกิจ', 'businesstype', 'App\Nova\Businesstype')
                ->hideFromIndex()->size('w-1/2'),

            new Panel('ข้อมูลการติดต่อ', $this->contactFields()),
            new Panel('ที่อยู่', $this->addressFields()),
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
            Text::make('ชื่อผู้ติดต่อ', 'contractname')
                ->hideFromIndex()
                ->size('w-1/2'),
            Text::make('โทรศัพท์', 'phoneno')->size('w-1/2'),
            Text::make('เว็บไซต์', 'weburl')->size('w-1/2')
                ->hideFromIndex(),
            Text::make('Facebook', 'facebook')->size('w-1/2')
                ->hideFromIndex(),
            Text::make('Line', 'line')->size('w-1/2')
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

            Text::make('ที่อยู่', 'address')->hideFromIndex(),
            InputSubDistrict::make('ตำบล/แขวง', 'sub_district')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('district'),
            InputDistrict::make('อำเภอ/เขต', 'district')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('amphoe'),
            InputProvince::make('จังหวัด', 'province')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('province'),
            InputPostalCode::make('รหัสไปรษณีย์', 'postal_code')
                ->withValues(['district', 'amphoe', 'province', 'zipcode'])
                ->fromValue('zipcode'),

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
            Image::make('โลโก้', 'logofile'),
            Image::make('ภาพหน้าร้าน', 'imagefile')
                ->hideFromIndex(),
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
