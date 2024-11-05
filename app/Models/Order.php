<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_name', 
        'quantity', 
        'price', 
        'customer_name', 
        'customer_email'
    ];
}

