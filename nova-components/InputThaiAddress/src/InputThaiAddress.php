<?php

namespace Wasandev\InputThaiAddress;

use Laravel\Nova\Fields\Field;

class InputThaiAddress extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-thai-address';

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
}
