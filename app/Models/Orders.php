<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrdersDetails;
use App\Models\Products;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Orders extends Model
{
    use HasFactory;

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetails::class, 'orderId', 'id')->with('products');
    }
}
