<?php

namespace App\Rules;

use App\Models\System\Hostname;
use Illuminate\Contracts\Validation\Rule;


class UniqueSubdomain implements Rule
{
    public function passes($attribute, $value)
    {
        if (Hostname::whereFqdn(tenant_fqdn($value))->exists()) {
            return false;
        }

        return true;
    }

    public function message()
    {
        return __('ชื่อนี้มีอยู่แล้ว โปรดระบุชื่ออื่น');
    }
}
