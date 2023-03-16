<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Variants extends Model
{
    use HasFactory;

    public function hasOption(): HasMany
    {
        return $this->hasMany(VariantOption::class,  'variant_id', 'id');
    }
}
