<?php

namespace App\Models;

use App\Models\Products;
use App\Models\Customers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlists extends Model
{
    use HasFactory;

    protected $table = 'wishlists';
    protected $fillable = [
        'customer_id',
        'product_id',
    ];

    protected $primaryKey = 'id'; 

    public function customers()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id'); 
    }

    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id'); 
    }
}