<?php

namespace App\Observers;

use App\Models\Tenant\Charter_job;
use App\Models\Tenant\Charter_job_status;
use App\Models\Tenant\Charter_price;
use Illuminate\Support\Carbon;


class CharterJobObserver
{
    public function creating(Charter_job $charter_job)
    {

        $charter_price = Charter_price::find($charter_job->charter_price_id);

        $charter_job->sub_total = $charter_price->price;
        $charter_job->total = $charter_price->price - $charter_job->discount;
        $charter_job->user_id = auth()->user()->id;
        $charter_job->status = 'new';
        $charter_job->branch_id = auth()->user()->branch_id;
        $charter_job->job_no = Charter_job::nextCharterJobNumber();
        $charter_job->job_date = Carbon::now()->toDateTimeString();
    }

    public function created(Charter_job $charter_job)
    {
        $charter_price = Charter_price::find($charter_job->charter_price_id);

        $charter_job->sub_total = $charter_price->price;
        $charter_job->total = $charter_price->price - $charter_job->discount;
    }


    public function updating(Charter_job $charter_job)
    {
        $charter_price = Charter_price::find($charter_job->charter_price_id);

        $charter_job->sub_total = $charter_price->price;
        $charter_job->total = $charter_price->price - $charter_job->discount;

        if ($charter_job->status == 'active') {
            Charter_job_status::create([
                'charter_job_id' => $charter_job->id,
                'status' => 'open',
                'user_id' => auth()->user()->id,
            ]);
        }
    }
    public function updated(Charter_job $charter_job)
    {
        $charter_price = Charter_price::find($charter_job->charter_price_id);

        $charter_job->sub_total = $charter_price->price;
        $charter_job->total = $charter_price->price - $charter_job->discount;
        if ($charter_job->status == 'active') {
            Charter_job_status::create([
                'charter_job_id' => $charter_job->id,
                'status' => 'open',
                'user_id' => auth()->user()->id,
            ]);
        }
    }
}
