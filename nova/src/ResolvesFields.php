<?php

namespace Laravel\Nova;

use Closure;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Contracts\Cover;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Actions\Actionable;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Contracts\Resolvable;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Actions\ActionResource;
use Laravel\Nova\Fields\FieldCollection;
use Laravel\Nova\Contracts\ListableField;
use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Database\Eloquent\Relations\Pivot;

trait ResolvesFields
{
    /**
     * Resolve the index fields.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Illuminate\Support\Collection
     */
    public function indexFields(NovaRequest $request)
    {
        return $this->resolveFields($request, function (Collection $fields) {
            return $fields->reject(function ($field) {
                return $field instanceof ListableField || ! $field->showOnIndex;
            });
        })->each(function ($field) use ($request) {
            if ($field instanceof Resolvable && ! $field->pivot) {
                $field->resolveForDisplay($this->resource);
            }

            if ($field instanceof Resolvable && $field->pivot) {
                $accessor = $this->pivotAccessorFor($request, $request->viaResource);

                $field->resolveForDisplay($this->{$accessor} ?? new Pivot);
            }
        });
    }

    /**
     * Resolve the detail fields.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Illuminate\Support\Collection
     */
    public function detailFields(NovaRequest $request)
    {
        return $this->resolveFields($request, function (Collection $fields) {
            return $fields->filter->showOnDetail;
        })->when(in_array(Actionable::class, class_uses_recursive(static::newModel())), function ($fields) {
            return $fields->push(MorphMany::make(__('Actions'), 'actions', ActionResource::class));
        })->each(function ($field) use ($request) {
            if ($field instanceof ListableField || ! $field instanceof Resolvable) {
                return;
            }

            if ($field->pivot) {
                $accessor = $this->pivotAccessorFor($request, $request->viaResource);

                $field->resolveForDisplay($this->{$accessor} ?? new Pivot);
            } else {
                $field->resolveForDisplay($this->resource);
            }
        });
    }

    /**
     * Resolve the detail fields and assign them to their associated panel.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Illuminate\Support\Collection
     */
    public function detailFieldsWithinPanels(NovaRequest $request)
    {
        return $this->assignToPanels(
            Panel::defaultNameForDetail($request->newResource()),
            $this->detailFields($request)
        );
    }

    /**
     * Resolve the creation fields.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Illuminate\Support\Collection
     */
    public function creationFields(NovaRequest $request)
    {
        return $this->resolveFields($request, function ($fields) {
            return $this->removeNonCreationFields($fields);
        });
    }

    /**
     * Return the creation fields excluding any readonly ones.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Illuminate\Support\Collection
     */
    public function creationFieldsWithoutReadonly(NovaRequest $request)
    {
        return $this->creationFields($request)
                    ->reject(function ($field) use ($request) {
                        return $field->isReadonly($request);
                    });
    }

    /**
     * Resolve the creation fields and assign them to their associated panel.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Illuminate\Support\Collection
     */
    public function creationFieldsWithinPanels(NovaRequest $request)
    {
        return $this->assignToPanels(
            Panel::defaultNameForCreate($request->newResource()),
            $this->creationFields($request)
        );
    }

    /**
     * Resolve the creation pivot fields for a related resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Support\Collection  $relatedResource
     * @return \Illuminate\Support\Collection
     */
    public function creationPivotFields(NovaRequest $request, $relatedResource)
    {
        return $this->removeNonCreationFields(
            $this->resolvePivotFields($request, $relatedResource)
        );
    }

    /**
     * Remove non-creation fields from the given collection.
     *
     * @param  \Illuminate\Support\Collection  $fields
     * @return \Illuminate\Support\Collection
     */
    protected function removeNonCreationFields(Collection $fields)
    {
        return $fields->reject(function ($field) {
            return $field instanceof ListableField ||
                   $field instanceof ResourceToolElement ||
                   $field->attribute === 'ComputedField' ||
                   ($field instanceof ID && $field->attribute === $this->resource->getKeyName()) ||
                   ! $field->showOnCreation;
        });
    }

    /**
     * Resolve the update fields.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Illuminate\Support\Collection
     */
    public function updateFields(NovaRequest $request)
    {
        return $this->resolveFields($request, function ($fields) {
            return $this->removeNonUpdateFields($fields);
        });
    }

    /**
     * Return the update fields excluding any readonly ones.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Illuminate\Support\Collection
     */
    public function updateFieldsWithoutReadonly(NovaRequest $request)
    {
        return $this->updateFields($request)
                    ->reject(function ($field) use ($request) {
                        return $field->isReadonly($request);
                    });
    }

    /**
     * Resolve the update fields and assign them to their associated panel.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Illuminate\Support\Collection
     */
    public function updateFieldsWithinPanels(NovaRequest $request)
    {
        return $this->assignToPanels(
            Panel::defaultNameForUpdate($request->newResource()),
            $this->updateFields($request)
        );
    }

    /**
     * Resolve the update pivot fields for a related resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Support\Collection  $relatedResource
     * @return \Illuminate\Support\Collection
     */
    public function updatePivotFields(NovaRequest $request, $relatedResource)
    {
        return $this->removeNonUpdateFields(
            $this->resolvePivotFields($request, $relatedResource)
        );
    }

    /**
     * Remove non-update fields from the given collection.
     *
     * @param  \Illuminate\Support\Collection  $fields
     * @return \Illuminate\Support\Collection
     */
    protected function removeNonUpdateFields(Collection $fields)
    {
        return $fields->reject(function ($field) {
            return $field instanceof ListableField ||
                   $field instanceof ResourceToolElement ||
                   $field->attribute === 'ComputedField' ||
                   ($field instanceof ID && $field->attribute === $this->resource->getKeyName()) ||
                   ! $field->showOnUpdate;
        });
    }

    /**
     * Resolve the given fields to their values.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Closure|null  $filter
     * @return \Illuminate\Support\Collection
     */
    protected function resolveFields(NovaRequest $request, Closure $filter = null)
    {
        $fields = $this->availableFields($request);

        if (! is_null($filter)) {
            $fields = $filter($fields);
        }

        $fields->whereInstanceOf(Resolvable::class)->each->resolve($this->resource);

        $fields = $fields->filter->authorize($request)->values();

        return $request->viaRelationship()
                    ? $this->withPivotFields($request, $fields->all())
                    : $fields;
    }

    /**
     * Resolve the field for the given attribute.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  string  $attribute
     * @return \Laravel\Nova\Fields\Field
     */
    public function resolveFieldForAttribute(NovaRequest $request, $attribute)
    {
        return $this->resolveFields($request)->findFieldByAttribute($attribute);
    }

    /**
     * Resolve the inverse field for the given relationship attribute.
     *
     * This is primarily used for Relatable rule to check if has-one / morph-one relationships are "full".
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  string  $attribute
     * @param  string|null  $morphType
     * @return \Illuminate\Support\Collection
     */
    public function resolveInverseFieldsForAttribute(NovaRequest $request, $attribute, $morphType = null)
    {
        $field = $this->resolveFieldForAttribute($request, $attribute);

        if (! isset($field->resourceClass)) {
            return collect();
        }

        $relatedResource = $field instanceof MorphTo
                                ? Nova::resourceForKey($morphType ?? $request->{$attribute.'_type'})
                                : ($field->resourceClass ?? null);

        $relatedResource = new $relatedResource($relatedResource::newModel());

        $result = $relatedResource->availableFields($request)->reject(function ($f) use ($field) {
            return isset($f->attribute) &&
                   isset($field->inverse) &&
                   $f->attribute !== $field->inverse;
        })->filter(function ($field) use ($request) {
            return isset($field->resourceClass) &&
                   $field->resourceClass == $request->resource();
        });

        return $result;
    }

    /**
     * Resolve the resource's avatar URL, if applicable.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return string|null
     */
    public function resolveAvatarUrl(NovaRequest $request)
    {
        $fields = $this->resolveFields($request);

        $field = $fields->first(function ($field) {
            return $field instanceof Cover;
        });

        if ($field) {
            return $field->resolveThumbnailUrl();
        }
    }

    /**
     * Get the panels that are available for the given create request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Illuminate\Support\Collection
     */
    public function availablePanelsForCreate($request)
    {
        return $this->panelsWithDefaultLabel(Panel::defaultNameForCreate($request->newResource()), $request);
    }

    /**
     * Get the panels that are available for the given update request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Illuminate\Support\Collection
     */
    public function availablePanelsForUpdate($request)
    {
        return $this->panelsWithDefaultLabel(Panel::defaultNameForUpdate($request->newResource()), $request);
    }

    /**
     * Get the panels that are available for the given detail request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Illuminate\Support\Collection
     */
    public function availablePanelsForDetail($request)
    {
        return $this->panelsWithDefaultLabel(Panel::defaultNameForDetail($request->newResource()), $request);
    }

    /**
     * Get the fields that are available for the given request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Laravel\Nova\Fields\FieldCollection
     */
    public function availableFields(NovaRequest $request)
    {
        return new FieldCollection(array_values($this->filter($this->fields($request))));
    }

    /**
     * Merge the available pivot fields with the given fields.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  array  $fields
     * @return \Laravel\Nova\Fields\FieldCollection
     */
    protected function withPivotFields(NovaRequest $request, array $fields)
    {
        $pivotFields = $this->resolvePivotFields($request, $request->viaResource)->all();

        if ($index = $this->indexToInsertPivotFields($request, $fields)) {
            array_splice($fields, $index + 1, 0, $pivotFields);
        } else {
            $fields = array_merge($fields, $pivotFields);
        }

        return new FieldCollection($fields);
    }

    /**
     * Resolve the pivot fields for the requested resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  string  $relatedResource
     * @return \Illuminate\Support\Collection
     */
    public function resolvePivotFields(NovaRequest $request, $relatedResource)
    {
        $fields = $this->pivotFieldsFor($request, $relatedResource);

        return (new FieldCollection($this->filter($fields->each(function ($field) use ($request, $relatedResource) {
            if ($field instanceof Resolvable) {
                $accessor = $this->pivotAccessorFor($request, $relatedResource);

                $field->resolve($this->{$accessor} ?? new Pivot);
            }
        })->filter->authorize($request)->values()->all())))->values();
    }

    /**
     * Get the pivot fields for the resource and relation.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  string  $relatedResource
     * @return \Illuminate\Support\Collection
     */
    protected function pivotFieldsFor(NovaRequest $request, $relatedResource)
    {
        $field = $this->availableFields($request)->first(function ($field) use ($relatedResource) {
            return isset($field->resourceName) &&
                   $field->resourceName == $relatedResource;
        });

        if ($field && isset($field->fieldsCallback)) {
            return collect(array_values(
                $this->filter(call_user_func($field->fieldsCallback, $request, $this->resource))
            ))->each(function ($field) {
                $field->pivot = true;
            });
        }

        return collect([]);
    }

    /**
     * Get the name of the pivot accessor for the requested relationship.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  string  $relatedResource
     * @return string
     */
    public function pivotAccessorFor(NovaRequest $request, $relatedResource)
    {
        $field = $this->availableFields($request)->first(function ($field) use ($request, $relatedResource) {
            return ($field instanceof BelongsToMany ||
                    $field instanceof MorphToMany) &&
                   $field->resourceName == $relatedResource;
        });

        return $this->resource->{$field->manyToManyRelationship}()->getPivotAccessor();
    }

    /**
     * Get the index where the pivot fields should be spliced into the field array.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  array  $fields
     * @return int
     */
    protected function indexToInsertPivotFields(NovaRequest $request, array $fields)
    {
        foreach ($fields as $index => $field) {
            if (isset($field->resourceName) &&
                $field->resourceName == $request->viaResource) {
                return $index;
            }
        }
    }

    /**
     * Get the displayable pivot model name from a field.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  string  $field
     * @return string|null
     */
    public function pivotNameForField(NovaRequest $request, $field)
    {
        $field = $this->availableFields($request)->where('attribute', $field)->first();

        if (! $field || (! $field instanceof BelongsToMany &&
                         ! $field instanceof MorphToMany)) {
            return self::DEFAULT_PIVOT_NAME;
        }

        if (isset($field->pivotName)) {
            return $field->pivotName;
        }
    }

    /**
     * Return the panels for this request with the default label.
     *
     * @param  string  $label
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return \Illuminate\Support\Collection
     */
    protected function panelsWithDefaultLabel($label, NovaRequest $request)
    {
        return with(
            collect(array_values($this->fields($request)))->whereInstanceOf(Panel::class)->values(),
            function ($panels) use ($label) {
                return $panels->when($panels->where('name', $label)->isEmpty(), function ($panels) use ($label) {
                    return $panels->prepend((new Panel($label))->withToolbar());
                })->all();
            }
        );
    }

    /**
     * Assign the fields with the given panels to their parent panel.
     *
     * @param  string  $label
     * @param  \Illuminate\Support\Collection  $panels
     * @return \Illuminate\Support\Collection
     */
    protected function assignToPanels($label, Collection $panels)
    {
        return $panels->map(function ($field) use ($label) {
            if (! $field->panel) {
                $field->panel = $label;
            }

            return $field;
        });
    }
}
