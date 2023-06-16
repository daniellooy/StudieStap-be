<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressEvaluation extends Model
{
    use HasFactory;


    protected $table = 'progressevaluations';
    protected $fillable = ['title', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function scores(){
        return $this->hasMany(ProgressScore::class, 'progressevaluation_id');
    }
}
