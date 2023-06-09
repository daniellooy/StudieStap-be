<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question','explanation', 'video_id'];
    public function questionAnswer(): HasMany{
        return $this->hasMany(Question_Answer::class);
    }

    public function userAnswers(): hasMany{
        return $this->hasMany(UserAnswer::class);
    }

    public function userHasAnsweredThisQuestion($user_id){
        return $this->userAnswers()->where('user_id','=', $user_id)->exists();
    }
}
