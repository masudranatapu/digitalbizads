<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StoreProduct extends Model
{
    public function hasCategory(): HasOne
    {
        return $this->hasOne(ProductCategory::class,  'id', 'category_id');
    }
}
