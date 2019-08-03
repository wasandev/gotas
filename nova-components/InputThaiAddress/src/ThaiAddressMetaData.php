<?php

namespace Wasandev\InputThaiAddress;

use Laravel\Nova\Element;
use Laravel\Nova\Fields\Text;

class ThaiAddressMetadata extends Text
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'thai-address-metadata';

    /**
     * Initialize the field
     *
     * @param [type] $name
     * @param [type] $attribute
     * @param [type] $resolveCallback
     */


    /**
     * The value for autocomplete
     *
     * @param string $addressValue
     * @return void
     */
    public function fromValue(string $addressValue)
    {
        return $this->withMeta(['addressValue' => $addressValue]);
    }

    /**
     * Set the field in disabled mode
     *
     * @return void
     */
    public function disabled()
    {
        return $this->withMeta(['disabled' => true]);
    }

    /**
     * Set the field invisible but save it
     *
     * @return void
     */
    public function invisible()
    {
        return $this->withMeta(['invisible' => true]);
    }
}
