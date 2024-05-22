<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total',
        'endtotal',
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'user_id');
}
}