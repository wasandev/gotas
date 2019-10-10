<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Illuminate\Support\Carbon;
use Laravel\Nova\Http\Requests\NovaRequest;

class Quotation extends Resource
{
    //public static $displayInNavigation = false;
    public static $group = "6.งานขนส่งแบบเหมา";

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Quotation';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'quotation_no';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'quotation_no'
    ];
    public static function label()
    {
        return 'ใบเสนอราคาเหมาคัน';
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
            Boolean::make('ใช้งาน', 'active')
                ->size('w-1/2'),
            BelongsTo::make('สาขาที่ทำรายการ', 'branch', 'App\Nova\Branch')
                ->withMeta([
                    'value' => $this->user_id ?? auth()->user()->branch_id,
                    'belongsToId' => $this->user_id ?? auth()->user()->branch_id
                ])
                ->hideFromIndex()
                ->size('w-1/2'),
            Status::make('สถานะ', 'status')
                ->loadingWhen(['Open', 'Edit', 'Confirm'])
                ->failedWhen(['Reject']),

            Text::make('เลขที่ใบเสนอราคา', 'quotation_no')
                ->size('w-1/2')
                ->readonly(true),

            DateTime::make('วันที่', 'quotation_date')
                ->size('w-1/2')
                ->readonly(true),

            BelongsTo::make('ลูกค้า', 'customer', 'App\Nova\Customer')
                ->size('w-1/2')
                ->searchable(),
            Select::make('เงื่อนไขการชำระเงิน', 'paymenttype')->options([
                'เงินสด' => 'เงินสด',
                'วางบิล' => 'วางบิล',
            ])->displayUsingLabels()
                ->size('w-1/2'),
            Text::make('หมายเหตุ/เงื่อนไข', 'terms')
                ->hideFromIndex()
                ->size('w-1/2'),
            DateTime::make('ใช้ได้ถึงวันที่', 'expiration_date')
                ->size('w-1/2')
                ->hideFromIndex(),
            BelongsTo::make('ผู้ทำรายการ', 'user', 'App\Nova\User')
                ->size('w-1/2')
                ->onlyOnDetail(),
            BelongsToMany::make('ราคาขนส่งเหมาคัน', 'charter_prices', 'App\Nova\Charter_price')



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
            (new Actions\PrintQuotation)->onlyOnDetail(),
        ];
    }
}
