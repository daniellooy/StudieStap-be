<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressScore extends Model
{
    use HasFactory;

    protected $table = 'progressscores';
    protected $fillable = ['progressrubric_id', 'progressevaluation_id', 'score'];

    public function rubric(){
        return $this->hasOne(ProgressRubric::class, 'progressrubric_id');
    }
    public function evaluation(){
        return $this->belongsTo(ProgressEvaluation::class);
    }
}
