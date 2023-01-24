<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCard extends Model
{
    public function business_card_details()
    {
        return $this->hasMany(BusinessCardDetail::class, '', 'card_id');
    }
}
