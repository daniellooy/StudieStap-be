<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class MessageAppendix extends Model
{
    use HasFactory;
    protected $fillable = [
        'message_id',
=======
class Message_appendix extends Model
{
    use HasFactory;
    protected $fillable = [
>>>>>>> Daniel
        'appendix_type',
        'appendix_path',
    ];

    public function message() {
        return $this->belongsTo(Message::class);
    }
}
