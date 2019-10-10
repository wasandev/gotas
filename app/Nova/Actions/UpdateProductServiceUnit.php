<?php

namespace App\Nova\Actions;

use App\Models\Tenant\Unit;
use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Laravel\Nova\Fields\Select;

class UpdateProductServiceUnit extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;
    public $onlyOnIndex = true;

    public function uriKey()
    {
        return 'Update Product Service Unit';
    }
    public function name()
    {
        return __('Update Product Service Unit');
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
            $model->unit_id = $fields->unit;
            $model->save();
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        $units = Unit::all()->pluck('name', 'id');

        return [


            Select::make('เลือกหน่วยนับสินค้า', 'unit')
                ->options($units)
                ->displayUsingLabels()


        ];
    }
}
