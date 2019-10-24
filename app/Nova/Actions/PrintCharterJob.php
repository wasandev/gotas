<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Support\Facades\Storage;
use PDF;

class PrintCharterJob extends Action
{
    use InteractsWithQueue, Queueable;

    public function uriKey()
    {
        return 'Print Charter Job';
    }
    public function name()
    {
        return __('Print Charter Job');
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
            $charterjobController =  new \App\Http\Controllers\Tenant\CharterJobController();
            $path = $charterjobController->makePDF($model->id);

            return Action::openInNewTab(Storage::url('media/' . $model->job_no . '.pdf'));
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
