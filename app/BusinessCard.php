<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BusinessCard extends Model
{
    public function business_card_details()
    {
        return $this->hasMany(BusinessCardDetail::class, '', 'card_id');
    }

    public function hasProduct(): HasMany
    {
        return $this->hasMany(StoreProduct::class, 'card_id', 'card_id')->with('hasCategory');
    }
}
