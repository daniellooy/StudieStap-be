<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
    ];

    public function user() {
        return $this->belongsTo(UserChannel::class);
    }

    public function appendix(): HasMany {
        return $this->hasMany(MessageAppendix::class);
    }
}
