<?php

namespace App\Models\Tenant;

use App\Nova\Quotation as AppQuotation;
use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Quotation extends Model
{
    use UsesTenantConnection;

    const OPEN_STATUS = 'Open';
    const EDIT_STSTUS = 'Edit';
    const COMFIRM_STATUS = 'Comfirm';
    const REJECT_STATUS = 'Reject';

    protected $fillable = [
        'active', 'status', 'quotation_no', 'quotation_date', 'branch_id', 'customer_id', 'paymenttype', 'terms', 'expiration_date', 'user_id',

    ];

    protected $casts = [
        'quotation_date' => 'datetime',
        'expiration_date' => 'datetime'
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
        return $this->belongsTo('App\Models\tenant\User');
    }

    public function charter_prices()
    {
        return $this->belongsToMany('App\Models\Tenant\Charter_price', 'charter_price_quotation', 'quotation_id', 'charter_price_id');
    }

    public static function getStatuses()
    {
        return [
            self::OPEN_STATUS => self::OPEN_STATUS,
            self::EDIT_STATUS => self::EDIT_STATUS,
            self::CONFIRM_STATUS => self::CONFIRM_STATUS,
            self::REJECT_STATUS => self::REJECT_STATUS,

        ];
    }

    static function  nextQuotationNumber()
    {
        if (Quotation::count() == 0) {
            $nextQuotationNumber = 'Q' . date('Y') . '-000001';
        } else {

            //get last record
            $record = Quotation::latest()->first();

            $expNum = explode('-', $record->quotation_no);

            //check first day in a year
            if (date('z') === '0') {
                $nextQuotationNumber = 'Q' . date('Y') . '-000001';
            } else {
                //increase 1 with last tranjob number
                $nextQuotationNumber = $expNum[0] . '-' . sprintf('%06d', intval($expNum[1]) + 1);
            }
        }


        return  $nextQuotationNumber;
    }
}
