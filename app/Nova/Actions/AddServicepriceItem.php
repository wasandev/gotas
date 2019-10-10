<?php

namespace App\Nova\Actions;


use App\Models\Tenant\Branch_area;
use App\Models\Tenant\Branch;
use App\Models\Tenant\Parcel;
use App\Models\Tenant\Serviceprice_item;
use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Select;

class AddServicepriceItem extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;
    public $onlyOnDetail = true;

    public function uriKey()
    {
        return 'Add Service Price Item';
    }
    public function name()
    {
        return __('Add Service Price Item');
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

            foreach ($branch_areas as $branch_area) {

                Serviceprice_item::updateOrCreate([
                    'serviceprice_id' => $model->id,
                    'parcel_id' => $fields->parcel_id,
                    'price' => $fields->item_price,
                    'from_branch_id' => $fields->from_branch_id,
                    'district' => $branch_area->district,
                    'province' => $branch_area->province,
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
        $parcels = Parcel::all()->pluck('name', 'id');

        return [

            Select::make('เลือกพัสดุ', 'parcel_id')
                ->options($parcels)
                ->displayUsingLabels(),

            Select::make('เลือกสาขาต้นทาง', 'from_branch_id')
                ->options($branches)
                ->displayUsingLabels(),
            Select::make('เลือกสาขาปลายทาง', 'to_branch_id')
                ->options($branches)
                ->displayUsingLabels(),
            Currency::make('ค่าจัดส่ง(บาท)', 'item_price'),



        ];
    }
}
