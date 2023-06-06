<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','thumbnail', 'learningcategory_id'];

    public function videos(): HasMany {
        return $this->hasMany(Video::class)->with('questions');
    }

    public function learningcategory(): BelongsTo {
        return $this->belongsTo(LearningCategory::class);
    }
}
