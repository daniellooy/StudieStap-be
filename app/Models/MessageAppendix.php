<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message_appendix extends Model
{
    use HasFactory;
    protected $fillable = [
        'appendix_type',
        'appendix_path',
    ];

    public function message() {
        return $this->belongsTo(Message::class);
    }
}
