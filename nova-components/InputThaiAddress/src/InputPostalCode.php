<?php

namespace Wasandev\InputThaiAddress;

use Laravel\Nova\Fields\Field;

class InputPostalCode extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-postal-code';

    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta([
            'addressObject' => []
        ]);
    }



    public function withValues(array $data)
    {
        $currentObject = $this->meta['addressObject'];

        return $this->withMeta([
            'addressObject' => array_merge($currentObject, $data)
        ]);
    }

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
}
