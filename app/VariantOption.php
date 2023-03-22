<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VariantOption extends Model
{
    use HasFactory;

    public function hasVariant(): BelongsTo
    {
        return $this->belongsTo(Variants::class,  'variant_id', 'id');
    }
}
