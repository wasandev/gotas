<?php

namespace App\Nova\Actions;

use App\Models\Tenant\Branch_area;
use App\Models\Tenant\Branch;
use App\Models\Tenant\Unit;
use App\Models\Tenant\Productservice_price;
use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;

class AddProductServicePrice extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;
    //public $showOnTableRow = true;

    public function uriKey()
    {
        return 'Add Product Service Price';
    }
    public function name()
    {
        return __('Add Product Service Price');
    }
    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {


            $branch_areas = Branch_area::where('branch_id', $fields->to_branch_id)->get();
            if ($fields->product_unit) {
                $uses_unit = $model->unit_id;
            } else {
                $uses_unit = $fields->unit;
            }

            foreach ($branch_areas as $branch_area) {

                Productservice_price::updateOrCreate([
                    'product_id' => $model->id,
                    'from_branch_id' => $fields->from_branch_id,
                    'district' => $branch_area->district,
                    'province' => $branch_area->province,
                    'price' => $fields->item_price,
                    'unit_id' => $uses_unit,
                ]);
            }
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {


        $branches  = Branch::all()->pluck('name', 'id');
        $units = Unit::all()->pluck('name', 'id');

        return [


            Select::make('เลือกสาขาต้นทาง', 'from_branch_id')
                ->options($branches)
                ->displayUsingLabels(),
            Select::make('เลือกสาขาปลายทาง', 'to_branch_id')
                ->options($branches)
                ->displayUsingLabels(),
            Boolean::make('ใช้หน่วยนับของสินค้า', 'product_unit'),
            Select::make('เลือกหน่วยนับสินค้า', 'unit')
                ->options($units)
                ->displayUsingLabels(),
            Currency::make('ค่าขนส่ง/หน่วย(บาท)', 'item_price'),



        ];
    }
}
