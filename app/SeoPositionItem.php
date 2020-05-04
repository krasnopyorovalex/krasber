<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeoPositionItem extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function seoPosition(): BelongsTo
    {
        return $this->belongsTo(SeoPosition::class);
    }
}
