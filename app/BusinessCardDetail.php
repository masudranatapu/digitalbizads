<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCardDetail extends Model
{
    public function business_cards()
    {
        return $this->belongsTo(BusinessCard::class, '', 'card_id');
    }
}
