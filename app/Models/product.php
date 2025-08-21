<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tb_products';
    protected $primaryKey = 'prd_id';
    public $timestamps = false; // ⬅️ ini penting biar Laravel tidak update created_at / updated_at

    protected $fillable = [
        'prd_name',
        'prd_price',
        'prd_stock',
        'prd_create_by',
    ];
}
