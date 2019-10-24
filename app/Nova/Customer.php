<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Panel;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Number;
use Wasandev\InputThaiAddress\InputSubDistrict;
use Wasandev\InputThaiAddress\InputDistrict;
use Wasandev\InputThaiAddress\InputProvince;
use Wasandev\InputThaiAddress\InputPostalCode;
use Wasandev\InputThaiAddress\MapAddress;
use Laravel\Nova\Fields\Select;
use Jfeid\NovaGoogleMaps\NovaGoogleMaps;

class Customer extends Resource
{
    //public static $displayInNavigation = false;
    public static $group = "4.งานด้านการขาย";
    //public static $subGroup = "ข้อมูลลูกค้า";


    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Customer';

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
        return 'ข้อมูลลูกค้า';
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
            Boolean::make('ใช้งาน', 'status')->size('w-full')
                ->hideWhenCreating(),
            Text::make('ชื่อลูกค้า', 'name')
                ->sortable()
                ->size('w-1/2')
                ->rules('required', 'max:250'),
            Text::make('เลขประจำตัวผู้เสียภาษี', 'taxid')
                ->hideFromIndex()
                ->size('w-1/2')
                ->rules('required', 'digits:13', 'numeric'),
            Select::make('ประเภท', 'type')->options([
                'company' => 'นิติบุคคล',
                'person' => 'บุคคลธรรมดา'
            ])
                ->displayUsingLabels()
                ->hideFromIndex()
                ->size('w-1/2'),

            Select::make('การชำระเงิน', 'paymenttype')->options([
                'เงินสด' => 'เงินสด',
                'วางบิล' => 'วางบิล'
            ])
                ->hideFromIndex()
                ->size('w-1/2')
                ->withMeta(['value' => 'เงินสด']),
            Number::make('ระยะเวลาเครดิต', 'creditterm')
                ->withMeta(['value' => 0])
                ->hideFromIndex()
                ->size('w-1/2'),
            BelongsTo::make('ประเภทธุรกิจ', 'businesstype', 'App\Nova\Businesstype')
                ->hideFromIndex()
                ->size('w-1/2'),



            new Panel('ข้อมูลการติดต่อ', $this->contactFields()),
            new Panel('ที่อยู่ในการออกเอกสาร', $this->addressFields()),
            new Panel('อื่นๆ', $this->otherFields()),

            HasMany::make('จุดรับ-ส่งสินค้า', 'addresses', 'App\Nova\Address'),
            BelongsToMany::make('สินค้าของลูกค้า', 'product', 'App\Nova\Product'),
            HasMany::make('ค่าขนส่งสินค้าตามลูกค้า', 'customer_product_prices', 'App\Nova\Customer_product_price')




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
            Text::make('ชื่อผู้ติดต่อ', 'contactname')
                ->hideFromIndex()
                ->size('w-1/2'),
            Text::make('โทรศัพท์', 'phoneno')->size('w-1/2')
                ->rules('required', 'numeric'),
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
            Image::make('โลโก้', 'logofile')
                ->hideFromIndex(),
            Image::make('ภาพหน้าร้าน', 'imagefile')
                ->hideFromIndex(),
            Textarea::make('รายละเอียดอื่นๆ', 'description')
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
        return [
            new Filters\BusinessType,
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

        return [
            new Actions\AddCustomerProductPrice,
        ];
    }
}
