<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\products;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'productsId',
        'orderId',
        'quantity',
    ];

    protected $visible = ['products','quantity'];

    public function products(): HasOne
    {
        return $this->hasOne(Products::class, 'id', 'productsId');
    }
}
