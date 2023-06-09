<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id')->with(['hasVariant', 'hasOption', 'hasProduct']);;
    }

    public function hasTransection(): BelongsTo
    {
        return $this->belongsTo(ProductOrderTransaction::class, 'transaction_id', 'id');
    }
}
