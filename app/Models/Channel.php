<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_path',
        'description',
    ];

<<<<<<< HEAD
    public function users() {
=======
    public function user() {
>>>>>>> Daniel
        return $this->hasMany(UserChannel::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }
}
