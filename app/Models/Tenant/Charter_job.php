<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Charter_job extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'active', 'job_no', 'job_date', 'branch_id', 'customer_id', 'reference', 'quotation_id', 'paymenttype', 'paymentpoint', 'charter_price_id', 'terms', 'sub_total', 'discount', 'tax_amount', 'total', 'employee_id', 'user_id'

    ];

    protected $casts = [
        'job_date' => 'datetime',
        'created_at' => 'datetime',
        'updated-_at' => 'datetime'
    ];
    public function branch()
    {
        return $this->belongsTo('App\Models\Tenant\Branch');
    }
    public function customer()
    {
        return $this->belongsTo('App\Models\Tenant\Customer');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }
    public function employee()
    {
        return $this->belongsTo('App\Models\Tenant\Employee');
    }
    public function quotation()
    {
        return $this->belongsTo('App\Models\Tenant\Quotation');
    }

    public function charter_price()
    {
        return $this->belongsTo('App\Models\Tenant\Charter_price');
    }

    public function charter_job_items()
    {
        return $this->hasMany('App\Models\Tenant\Charter_job_item');
    }

    public function charter_job_statuses()
    {
        return $this->hasMany('App\Models\Tenant\Charter_job_status');
    }
    public function charter_job_insurance()
    {
        return $this->hasOne('App\Models\Tenant\Charter_job_insurance');
    }

    public function service_charges()
    {
        return $this->belongsToMany('App\Models\Tenant\Service_charge', 'service_charge_charter_job', 'charter_job_id', 'service_charge_id');
    }
    static function  nextCharterJobNumber()
    {
        if (Charter_job::count() == 0) {
            $nextCharterJobNumber = 'J' . date('Y') . '-000001';
        } else {

            //get last record
            $record = Charter_job::latest()->first();

            $expNum = explode('-', $record->job_no);

            //check first day in a year
            if (date('z') === '0') {
                $nextCharterJobNumber = 'J' . date('Y') . '-000001';
            } else {
                //increase 1 with last tranjob number
                $nextCharterJobNumber = $expNum[0] . '-' . sprintf('%06d', intval($expNum[1]) + 1);
            }
        }


        return  $nextCharterJobNumber;
    }
}
