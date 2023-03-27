<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StoreProduct extends Model
{




    public function hasCategory(): HasOne
    {
        return $this->hasOne(ProductCategory::class,  'id', 'category_id');
    }

    public function hasVariant(): HasMany
    {
        return $this->hasMany(Variants::class, 'product_id', 'product_id')->with('hasOption');
    }
    public function hasStore(): HasOne
    {
        return $this->hasOne(BusinessCard::class, 'card_id', 'card_id');
    }
}
