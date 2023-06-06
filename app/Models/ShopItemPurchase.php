<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopItemPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'shopitem_id',
        'user_id',
    ];
}
