<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Panel;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Image;
use Epartment\NovaDependencyContainer\HasDependencies;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;

class Car extends Resource
{
    use HasDependencies;
    //public static $displayInNavigation = false;
    public static $group = "3.งานด้านรถบรรทุก";
    //public static $subGroup = "ข้อมูลรถ";
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Car';

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
        'car_regist',
        'car_province'
    ];

    /**
     * The relationship columns that should be searched.
     *
     * @var array
     */
    public static $searchRelations = [
        'owner' => ['name'],
    ];
    public static function label()
    {
        return 'ข้อมูลรถ';
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
            Image::make('รูปรถ', 'carimage')->hideFromIndex(),
            new Panel('รายละเอียดของรถ', $this->carFields()),
            new Panel('รายละเอียดอื่นๆของรถ', $this->carotherFields()),


        ];
    }
    /**
     * Get the address fields for the resource.
     *
     * @return array
     */
    protected function carFields()
    {
        return [
            Text::make('ทะเบียนรถ', 'car_regist')
                ->size('w-1/2')
                ->rules('required')
                ->sortable(),
            BelongsTo::make('จังหวัด', 'province', Province::class)
                ->searchable()
                ->size('w-1/2')
                ->rules('required'),

            Text::make('หมายเลขรถของบริษัท', 'carno')
                ->sortable()
                ->size('w-1/2'),
            Select::make('ตำแหน่งรถ', 'carposition')->options([
                'tractor' => 'หัว',
                'trailer' => 'หาง'
            ])->displayUsingLabels()
                ->sortable()
                ->size('w-1/2'),
            Select::make('การเป็นเจ้าของ', 'ownertype')->options([
                'owner' => 'รถบริษัท',
                'partner' => 'รถร่วมบริการ'
            ])->displayUsingLabels()
                ->sortable()
                ->size('w-1/2'),
            NovaDependencyContainer::make([
                BelongsTo::make('เจ้าของรถ', 'owner', 'App\Nova\Vendor')
                    ->size('w->1/2')
            ])->dependsOn('ownertype', 'partner')->size('w->1/2'),

            //BelongsTo::make('เจ้าของรถ', 'owner', 'App\Nova\Vendor')
            //    ->size('w-1/2'),
            Date::make('วันที่ได้มา/วันที่เข้าร่วม', 'purchase_date')
                ->size('w-1/2')
                ->hideFromIndex(),
            Currency::make('ราคาที่ซื้อมา', 'purchase_price')
                ->size('w-1/2')
                ->hideFromIndex(),


            BelongsTo::make('ประเภทรถ', 'cartype', 'App\Nova\Cartype')
                ->size('w-1/2')
                ->hideFromIndex(),
            BelongsTo::make('ลักษณะรถ', 'carstyle', 'App\Nova\Carstyle')
                ->size('w-1/2')
                ->hideFromIndex(),
            BelongsTo::make('ตำแหน่งยาง', 'tiretype', 'App\Nova\Tiretype')
                ->size('w-1/2')
                ->hideFromIndex(),
            Number::make('จำนวนยาง', 'tires')
                ->size('w-1/2')
                ->hideFromIndex(),
        ];
    }
    /**
     * Get the address fields for the resource.
     *
     * @return array
     */
    protected function carotherFields()
    {
        return [
            Select::make('ประเภทเชื้อเพลง', 'fueltype')->options([
                'diesel' => 'ดีเซล',
                'gasoline' => 'เบนซิน',
                'LPG' => 'LPG',
                'NGV' => 'NGV',
            ])->displayUsingLabels()
                ->sortable()
                ->size('w-1/2')
                ->hideFromIndex(),
            Text::make('ยี่ห้อ', 'carbrand')
                ->size('w-1/2')
                ->hideFromIndex(),
            Text::make('รุ่น', 'carmodel')
                ->size('w-1/2')
                ->hideFromIndex(),
            Text::make('หมายเลขเครื่อง', 'engineno')
                ->size('w-1/2')
                ->hideFromIndex(),

            Text::make('จำนวนซีซี', 'car_cc')
                ->size('w-1/2')
                ->hideFromIndex(),
            Currency::make('ปริมาตรรถ', 'car_volumn')
                ->size('w-1/2')
                ->hideFromIndex(),
            Currency::make('น้ำหนักรถ', 'car_weight')
                ->size('w-1/2')
                ->hideFromIndex(),
            Currency::make('น้ำหนักบรรทุก', 'load_weight')
                ->size('w-1/2')
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
}
