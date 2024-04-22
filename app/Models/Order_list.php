<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_list extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'quantity', 'product_id', 'order_id'];
}
