<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;


class Tranjob extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'trantype',
        'branchsend_id',
        'branchrec_id',
        'tranjob_no',
        'tracking_no',
        'sender_id',
        'sendoptions',
        'loadaddress_id',
        'reciever_id',
        'deliveryaddress_id',
        'recieveoptions',
        'paymenttype',
        'tranjob_date',
        'user_id',
        'employee_id',
        'senddate', 'discount',
        'terms_and_conditions', 'reference'
    ];
    protected $casts = [
        'tranjob_date' => 'date',
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\Tenant\Employee');
    }
    public function branch_send()
    {
        return $this->belongsTo('App\Models\Tenant\Branch', 'branchsend_id');
    }
    public function branch_rec()
    {
        return $this->belongsTo('App\Models\Tenant\Branch', 'branchrec_id');
    }

    public function customer_sender()
    {
        return $this->belongsTo('App\Models\Tenant\Customer', 'sender_id');
    }

    public function customer_reciever()
    {
        return $this->belongsTo('App\Models\Tenant\Customer', 'reciever_id');
    }

    public function loadaddress()
    {
        return $this->belongsTo('App\Models\Tenant\Address', 'loadaddress_id');
    }

    public function deliveryaddress()
    {
        return $this->belongsTo('App\Models\Tenant\Address', 'deliveryaddress_id');
    }

    public function tranjob_details()
    {
        return $this->hasMany('App\Models\Tenant\Tranjob_detail');
    }

    static function  nextTranjobNumber()
    {
        if (Tranjob::count() == 0) {
            $nextTranjobNumber = date('Y') . '-000001';
        } else {

            //get last record
            $record = Tranjob::latest()->first();

            $expNum = explode('-', $record->tranjob_no);

            //check first day in a year
            if (date('z') === '0') {
                $nextTranjobNumber = date('Y') . '-000001';
            } else {
                //increase 1 with last tranjob number
                $nextTranjobNumber = $expNum[0] . '-' . sprintf('%06d', intval($expNum[1]) + 1);
            }
        }
        //dd($nextTranjobNumber);

        return  $nextTranjobNumber;
    }
}
