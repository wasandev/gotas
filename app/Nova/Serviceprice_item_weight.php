<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Select;
use App\Models\Tenant\Serviceprice;


class Serviceprice_item_weight extends Resource
{
    public static $displayInNavigation = false;
    public static $group = "4.งานด้านการขาย";
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\Serviceprice_item';

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
        'name', 'weight'
    ];

    public static function label()
    {
        return 'รายการราคาจัดส่งพัสดุ';
    }
    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        if ($request->editMode == "create" && !empty($request->viaResource) && !empty($request->viaResourceId)) {
            $serviceprice = Serviceprice::find($request->viaResourceId);
            return [
                ID::make()->sortable(),

                Select::make('ชื่อราคา', 'serviceprice_id')
                    ->options([$serviceprice->id => $serviceprice->name])
                    ->displayUsingLabels()
                    ->withMeta(['value' => $serviceprice->id])
                    ->hideWhenUpdating()
                    ->readonly(true),

                Text::make('ชื่อพัสดุ', 'name')->sortable(),
                Currency::make('น้ำหนักไม่เกิน(กก.)', 'weight')->sortable(),
                BelongsTo::make('สาขาต้นทาง', 'from_branch', 'App\Nova\Branch')
                    ->rules('required')
                    ->sortable(),
                BelongsTo::make('สาขาปลายทาง', 'to_branch', 'App\Nova\Branch')
                    ->rules('required')
                    ->sortable(),
                Currency::make('ค่าขนส่ง', 'price')
                    ->rules('required')
                    ->sortable(),
            ];
        }

        return [
            ID::make()->sortable(),
            BelongsTo::make('ชื่อราคา', 'serviceprice', 'App\Nova\Serviceprice')
                ->hideFromIndex()
                ->sortable(),
            Text::make('ชื่อพัสดุ', 'name')->sortable(),
            Currency::make('น้ำหนักไม่เกิน(กก.)', 'weight')->sortable(),
            BelongsTo::make('สาขาต้นทาง', 'from_branch', 'App\Nova\Branch')
                ->rules('required')
                ->sortable(),
            BelongsTo::make('สาขาปลายทาง', 'to_branch', 'App\Nova\Branch')
                ->rules('required')
                ->sortable(),
            Currency::make('ค่าขนส่ง', 'price')
                ->rules('required')->sortable(),
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
            new Filters\FromBranch,
            new Filters\ToBranch,
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
            new Actions\UpdateServicepriceItem,
            new Actions\UpdateServicepriceWeight
        ];
    }
}
