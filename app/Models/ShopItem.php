<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "price" 
    ];

    public function purchases() {
        return $this->hasMany(ShopItemPurchase::class);
    }
}
