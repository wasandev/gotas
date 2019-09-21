<?php

namespace App\Nova\Actions;

use App\Models\Tenant\District;
use App\Models\Tenant\Province;
use App\Models\Tenant\Branch;
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
use Laravel\Nova\Fields\Text;

class AddServicepriceItemWeight extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;
    public $onlyOnDetail = true;

    public function uriKey()
    {
        return 'Add Service Price Item by Weight';
    }
    public function name()
    {
        return __('Add Service Price Item by Weight');
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

            $branches = Branch::all();

            foreach ($branches as $from_branch) {
                foreach ($branches as $to_branch) {

                    Serviceprice_item::firstOrCreate([
                        'serviceprice_id' => $model->id,
                        'name' => $fields->item_name,
                        'width' => 0,
                        'length' => 0,
                        'height' => 0,
                        'weight' => $fields->item_weight,
                        'from_branch_id' => $from_branch->id,
                        'to_branch_id' => $to_branch->id,
                        'price' => $fields->item_price,
                    ]);
                }
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

        return [
            Text::make('ชื่อพัสดุ', 'item_name'),
            Currency::make('น้ำหนักไม่เกิน(กก.)', 'item_weight'),
            // Select::make('เลือกสาขาต้นทาง', 'from_branch_id')
            //     ->options($branches)
            //     ->displayUsingLabels(),
            // Select::make('เลือกสาขาปลายทาง', 'to_branch_id')
            //     ->options($branches)
            //     ->displayUsingLabels(),
            Currency::make('ค่าจัดส่ง(บาท)', 'item_price'),



        ];
    }
}
