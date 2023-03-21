<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderDetail extends Model
{
    use HasFactory;

    public function hasVariant(): HasOne
    {
        return $this->hasOne(Variants::class, 'id', 'variant_id');
    }

    public function hasOption(): HasOne
    {
        return $this->hasOne(VariantOption::class, 'id', 'variant_option_id');
    }
    public function hasProduct(): HasOne
    {
        return $this->hasOne(StoreProduct::class, 'id', 'product_id');
    }
}
