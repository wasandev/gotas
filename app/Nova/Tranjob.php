<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Illuminate\Support\Carbon;


class Tranjob extends Resource
{
    //public static $displayInNavigation = false;
    public static $group = "5.งานด้านบริการขนส่ง";
    //public static $subGroup = "บันทึกใบรับงานขนส่ง";
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Tranjob';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'tranjob_no';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'tranjob_no', 'tracking_no', 'sender_id'
    ];

    public static function label()
    {
        return 'ใบรับงานขนส่งเหมาเที่ยว';
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

            Select::make('ประเภทงาน', 'trantype')->options([
                'charter' => 'เหมาเที่ยว',
                'piece' => 'รายชิ้น'
            ])->displayUsingLabels()
                ->size('w-1/2')
                ->exceptOnForms(),
            Text::make('เลขที่ใบรับงาน', 'tranjob_no')
                ->withMeta(['value' => Tranjob::nextTranjobNumber()])
                ->size('w-1/2'),
            Date::make('วันที่ใบรับงาน', 'tranjob_date')
                ->withMeta(['value' => Carbon::now()->toDateTimeString()])
                ->size('w-1/2'),
            Text::make('รหัสติดตามสินค้า', 'tracking_no')
                ->size('w-1/2'),

            BelongsTo::make('สาขาต้นทาง', 'branch_send', 'App\Nova\Branch')
                ->hideFromIndex()
                ->withMeta([
                    'value' => $this->user_id ?? auth()->user()->branch_id,
                    'belongsToId' => $this->user_id ?? auth()->user()->branch_id
                ])
                ->size('w-1/2'),
            BelongsTo::make('สาขาปลายทาง', 'branch_rec', 'App\Nova\Branch')
                ->hideFromIndex()
                ->size('w-1/2'),
            BelongsTo::make('ผู้ว่าจ้าง', 'customer_sender', 'App\Nova\Customer')
                ->searchable()
                ->size('w-1/2'),
            Select::make('เงื่อนไขการรับสินค้า', 'sendoptions')->options([
                'ไปรับ' => 'ไปรับสินค้า',
                'นำมาส่ง' => 'ผู้ส่งนำมาส่ง'
            ])->displayUsingLabels()
                ->hideFromIndex()
                ->withMeta(['value' => 'ไปรับ'])
                ->size('w-1/2'),


            BelongsTo::make('จุดรับสินค้า', 'loadaddress', 'App\Nova\Address')
                ->nullable()
                ->hideFromIndex()
                ->size('w-1/2'),
            BelongsTo::make('ผู้รับสินค้า', 'customer_reciever', 'App\Nova\Customer')
                ->size('w-1/2')
                ->searchable(),
            BelongsTo::make('จุดส่งสินค้า', 'deliveryaddress', 'App\Nova\Address')
                ->nullable()
                ->hideFromIndex()
                ->size('w-1/2'),
            Select::make('เงื่อนไขการส่งสินค้า', 'recieveoptions')->options([
                'รับเอง' => 'รับเองที่สาขา',
                'จัดส่ง' => 'จัดส่ง ณ จุดส่งสินค้า'
            ])->displayUsingLabels()
                ->hideFromIndex()
                ->withMeta(['value' => 'จัดส่ง'])
                ->size('w-1/2'),
            Select::make('เงื่อนไขการชำระเงิน', 'paymenttype')->options([
                'cash-s' => 'เงินสดต้นทาง',
                'cash-r' => 'เงินสดปลายทาง',
                'cr-s' => 'เครดิตต้นทาง',
                'cr-r' => 'เครดิตปลายทาง'
            ])->displayUsingLabels()
                ->hideFromIndex()
                ->withMeta(['value' => 'cash-s'])
                ->size('w-1/2'),
            BelongsTo::make('พนักงานตรวจรับสินค้า', 'employee', 'App\Nova\Employee')
                ->hideFromIndex()
                ->size('w-1/2'),
            BelongsTo::make('ผู้ทำรายการ', 'user', 'App\Nova\User')
                ->hideWhenCreating(),
            HasMany::make('รายการสินค้า', 'tranjob_details', 'App\Nova\Tranjob_detail'),

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
