<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','thumbnail','file_path','module_id'];

    public function module(): BelongsTo {
        return $this->belongsTo(Module::class);
    }

    public function questions(): HasMany{
        return $this->hasMany(Question::class)->with('questionAnswer');
    }
}
