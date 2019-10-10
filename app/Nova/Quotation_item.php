<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Models\Tenant\Quotation;
use App\Models\Tenant\Address;

class Quotation_item extends Resource
{
    public static $displayInNavigation = false;
    public static $group = "6.งานขนส่งแบบเหมา";
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Quotation_item';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    public static function label()
    {
        return 'รายการในใบเสนอราคา';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        if (($request->editMode == "create" || $request->editMode == "update") && !empty($request->viaResource) && !empty($request->viaResourceId) && !empty($request->viaRelationship)) {

            $quotation = Quotation::find($request->viaResourceId);
            $address = Address::where('customer_id', $quotation->customer_id)->pluck('name', 'id');
            return [
                ID::make()->sortable(),
                Select::make('เลขที่ใบเสนอราคา', 'quotation_id')
                    ->options($quotation)
                    ->options([$quotation->id => $quotation->quotation_no])
                    ->displayUsingLabels()
                    ->withMeta(['value' => $quotation->id])
                    ->hideWhenUpdating()
                    ->readonly(true)
                    ->size('w-1/2'),
                Select::make('จุดรับสินค้า', 'from_address_id')
                    ->options($address)
                    ->onlyOnForms()
                    ->size('w-1/2'),
                Select::make('จุดส่งสินค้า', 'to_address_id')
                    ->options($address)
                    ->onlyOnForms()
                    ->size('w-1/2'),
                BelongsTo::make('ประเภทรถ', 'cartype', 'App\Nova\Cartype')
                    ->size('w-1/2'),
                BelongsTo::make('ลักษณะรถ', 'carstyle', 'App\Nova\Carstyle')
                    ->size('w-1/2')
                    ->hideFromIndex(),
                Belongsto::make('สินค้า', 'product', 'App\Nova\Product')
                    ->size('w-1/2')
                    ->searchable(),
                Currency::make('จำนวน', 'number')
                    ->size('w-1/2'),
                BelongsTo::make('หน่วยนับสินค้า', 'unit', 'App\Nova\Unit')
                    ->size('w-1/2')
                    ->searchable(),
                Currency::make('น้ำหนักสินค้ารวม(กก.)', 'total_weight')
                    ->size('w-1/2'),
                Currency::make('ค่าขนส่ง', 'amount')
                    ->size('w-1/2'),
                DateTime::make('เวลารับสินค้า', 'pickup_date')
                    ->size('w-1/2')
                    ->hideFromIndex(),
                DateTime::make('เวลาส่งสินค้า', 'delivery_date')
                    ->size('w-1/2')
                    ->hideFromIndex(),

            ];
        }
        return [
            ID::make()->sortable(),
            BelongsTo::make('เลขที่ใบเสนอราคา', 'quotation', 'App\Nova\Quotation')
                ->size('w-1/2'),
            BelongsTo::make('จุดรับสินค้า', 'from_address', 'App\Nova\Address')
                ->size('w-1/2'),
            BelongsTo::make('จุดส่งสินค้า', 'to_address', 'App\Nova\Address')
                ->size('w-1/2'),
            BelongsTo::make('ประเภทรถ', 'cartype', 'App\Nova\Cartype')
                ->size('w-1/2'),
            BelongsTo::make('ลักษณะรถ', 'carstyle', 'App\Nova\Carstyle')
                ->size('w-1/2')
                ->hideFromIndex(),
            Belongsto::make('สินค้า', 'product', 'App\Nova\Product')
                ->size('w-1/2'),
            Currency::make('จำนวน', 'number')
                ->size('w-1/2'),
            BelongsTo::make('หน่วยนับสินค้า', 'unit', 'App\Nova\Unit')
                ->size('w-1/2'),
            Currency::make('น้ำหนักสินค้ารวม(กก.)', 'total_weight')
                ->size('w-1/2'),
            Currency::make('ค่าขนส่ง', 'amount')
                ->size('w-1/2'),
            DateTime::make('เวลารับสินค้า', 'pickup_date')
                ->size('w-1/2')
                ->hideFromIndex(),
            DateTime::make('เวลาส่งสินค้า', 'delivery_date')
                ->size('w-1/2')
                ->hideFromIndex(),



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
