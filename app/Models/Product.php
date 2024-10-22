<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tentukan kolom yang bisa diisi massal
    protected $fillable = ['custom_id', 'image', 'title', 'size', 'price', 'stock', 'description'];

    // Tentukan primary key-nya adalah custom_id
    protected $primaryKey = 'custom_id';

    // Nonaktifkan auto-increment
    public $incrementing = false;

    // Tentukan tipe custom_id sebagai string
    protected $keyType = 'string';
}
