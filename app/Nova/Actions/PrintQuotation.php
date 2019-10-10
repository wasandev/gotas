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

class PrintQuotation extends Action
{
    use InteractsWithQueue, Queueable;

    public function uriKey()
    {
        return 'Print Quotation';
    }
    public function name()
    {
        return __('Print Quotation');
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
            $quotationController =  new \App\Http\Controllers\Tenant\QuotationController();
            $path = $quotationController->makePDF($model->id);

            return Action::openInNewTab(Storage::url('media/' . $model->quotation_no . '.pdf'));
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
