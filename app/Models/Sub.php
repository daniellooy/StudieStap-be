<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub extends Model
{
    use HasFactory;

    protected $fillable = [
        
    ];

    public function done() {
        return $this->hasMany(SubsDone::class);
    }

    public function achievement() {
        return $this->belongsTo(Achievement::class);
    }
}
