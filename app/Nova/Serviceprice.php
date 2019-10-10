<?php

namespace App\Nova;

use App\Models\Tenant\Serviceprice as AppServiceprice;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Serviceprice extends Resource
{
    public static $group = "4.งานด้านการขาย";


    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Serviceprice';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';
    public static $priceitem = 'App\Nova\Serviceprice_item';

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
        return 'ค่าขนส่งพัสดุ';
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
            Boolean::make('ใช้งาน', 'status'),

            Text::make('ชื่อราคา', 'name'),
            Select::make('เงื่อนไขการคิดราคา', 'pricetypes')
                ->options([
                    'size' => 'ขนาด(กว้าง+ยาว+สูง)-ซม.',
                    'weight' => 'น้ำหนัก(กก.)',
                    'sizeorweight' => 'ขนาดและน้ำหนัก(ใช้อันที่มากกว่า)',
                ])->displayUsingLabels(),
            Number::make('ราคาเริ่มต้น/ชิ้น - บาท', 'startrate'),
            Number::make('คิดเพิ่มขนาดเกินมาตราฐาน - บาท/ขนาด/กก.', 'oversizerate')
                ->hideFromIndex(),
            Date::make('วันที่เริ่มใช้งาน', 'start_date')
                ->hideFromIndex(),
            Date::make('วันที่สิ้นสุดการใช้งาน', 'end_date')
                ->hideFromIndex(),
            HasMany::make('รายการราคา', 'serviceprice_items', 'App\Nova\Serviceprice_item'),

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
            new Actions\AddServicepriceItem,

        ];
    }
}
