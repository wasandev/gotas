<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Panel;
use Wasandev\InputThaiAddress\InputSubDistrict;
use Wasandev\InputThaiAddress\InputDistrict;
use Wasandev\InputThaiAddress\InputProvince;
use Wasandev\InputThaiAddress\InputPostalCode;
use Wasandev\InputThaiAddress\MapAddress;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\HasMany;

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

        // $nestedBranchAreasForm = NestedForm::make('Branch_areas');
        // $nestedBranchAreasForm = $nestedBranchAreasForm->showOnDetail(true);

        return [


            ID::make()->sortable(),
            Text::make('ชื่อสาขา', 'name')->sortable()
                ->size('w-1/2')
                ->rules('required'),
            Text::make('รหัส', 'code')
                ->size('w-1/2')
                ->hideFromIndex(),
            Text::make('โทรศัพท์', 'phoneno')
                ->size('w-1/2')
                ->rules('required', 'numeric')
                ->hideFromIndex(),
            Select::make('การเป็นเจ้าของ', 'type')->options([
                'owner' => 'บริษัทเป็นเจ้าของ',
                'pathner' => 'ร่วมบริการ'
            ])->displayUsingLabels()
                ->size('w-1/2')
                ->hideFromIndex(),

            new Panel('ที่อยู่', $this->addressFields()),
            HasMany::make('พื้นที่บริการของสาขา', 'branch_areas', 'App\Nova\Branch_area'),
            HasMany::make('เส้นทางขนส่งภายในสาขา', 'branch_routes', 'App\Nova\Branch_route'),
            BelongsToMany::make('เส้นทางขนส่งระหว่างสาขา', 'routeto', 'App\Nova\Branch')
                ->fields(function () {
                    return [
                        Text::make('ชื่อเส้นทาง', 'name'),
                        Currency::make('ระยะทาง(กม.)', 'distance'),
                    ];
                }),

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
        return [
            new Actions\AddBranchArea,
        ];
    }
}
