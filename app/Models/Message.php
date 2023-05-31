<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
        "channel_id",
        "user_id",
        "response_to_id",
    ];

    public function channel() {
        return $this->belongsTo(Channel::class);
    }   
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function appendix() {
        return $this->hasMany(MessageAppendix::class);
    }
}
