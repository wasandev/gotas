<?php

namespace Laravel\Nova\Fields;

use Illuminate\Support\Arr;
use Laravel\Nova\Http\Requests\NovaRequest;

class BooleanGroup extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'boolean-group-field';

    /**
     * The text alignment for the field's text in tables.
     *
     * @var string
     */
    public $textAlign = 'center';

    /**
     * Set the options for the field.
     *
     * @param  array
     * @return $this
     */
    public function options($options)
    {
        return with(Arr::isAssoc($options), function ($isAssoc) use ($options) {
            return $this->withMeta([
                'options' => collect($options)->map(function ($label, $name) use ($isAssoc) {
                    return $isAssoc
                        ? ['label' => $label, 'name' => $name]
                        : ['label' => $label, 'name' => $label];
                })->values()->all(),
            ]);
        });
    }

    /**
     * Hydrate the given attribute on the model based on the incoming request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  string  $requestAttribute
     * @param  object  $model
     * @param  string  $attribute
     * @return void
     */
    protected function fillAttributeFromRequest(NovaRequest $request, $requestAttribute, $model, $attribute)
    {
        if ($request->exists($requestAttribute)) {
            $model->{$attribute} = json_decode($request[$requestAttribute], true);
        }
    }
}
