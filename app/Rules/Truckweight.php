<?php

namespace App\Rules;

use App\Models\Tenant\Cartype;

use Illuminate\Contracts\Validation\Rule;

class Truckweight implements Rule
{
    public $id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $cartype = Cartype::where('id', $this->id)->first();

        return $cartype->payload >= $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute เกินน้ำหนักบรรทุกของรถ';
    }
}
