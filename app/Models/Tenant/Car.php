<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Car extends Model
{
    use UsesTenantConnection;

    protected $fillable = [
        'car_regist',
        'status',
        'carimage',
        'car_province',
        'ownertype',
        'vendor_id',
        'engineno',
        'carno',
        'cartype_id',
        'carposition',
        'carstyle_id',
        'carbrand',
        'carmodel',
        'purchase_date',
        'purchase_price',
        'registration_date',
        'tiretype_id',
        'tires',
        'car_cc',
        'car_volumn',
        'car_weight',
        'load_weight',
        'fueltype',
        'saler_id',
        'insurance1_id',
        'insurance1_no',
        'insurance1_enddate',
        'insurance2_id',
        'insurance2_no',
        'insurance2_enddate',
        'finance_id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'registration_date' => 'date',
        'insurance1_enddate' => 'date',
        'insurance2_enddate' => 'date'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\Tenant\User');
    }

    public function cartype()
    {
        return $this->belongsTo('App\Models\Tenant\Cartype');
    }


    public function carstyle()
    {
        return $this->belongsTo('App\Models\Tenant\Carstyle');
    }

    public function owner()
    {
        return $this->belongsTo('App\Models\Tenant\Vendor', 'vendor_id');
    }
    public function seller()
    {
        return $this->belongsTo('App\Models\Tenant\Vendor', 'saler_id');
    }

    public function financer()
    {
        return $this->belongsTo('App\Models\Tenant\Vendor', 'finance_id');
    }

    public function tiretype()
    {
        return $this->belongsTo('App\Models\Tenant\Tiretype');
    }
    public function province()
    {
        return $this->belongsTo('App\Models\Tenant\Province',  'car_province', 'name');
    }
}
