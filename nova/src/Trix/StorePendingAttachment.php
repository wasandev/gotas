<?php

namespace Laravel\Nova\Trix;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Trix;

class StorePendingAttachment
{
    /**
     * The field instance.
     *
     * @var \Laravel\Nova\Fields\Trix
     */
    public $field;

    /**
     * Create a new invokable instance.
     *
     * @param  \Laravel\Nova\Fields\Trix  $field
     * @return void
     */
    public function __construct(Trix $field)
    {
        $this->field = $field;
    }

    /**
     * Attach a pending attachment to the field.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __invoke(Request $request)
    {
        return Storage::disk($this->field->disk)->url(PendingAttachment::create([
            'draft_id' => $request->draftId,
            'attachment' => $request->attachment->store('/', $this->field->disk),
            'disk' => $this->field->disk,
        ])->attachment);
    }
}
