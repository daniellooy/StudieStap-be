<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LearningCategory extends Model
{
    use HasFactory;

    protected $table = 'learningcategory';
    protected $fillable = ["title", "description"];

    public function modules(): HasMany {
        return $this->hasMany(Module::class, 'learningcategory_id')->with('videos');
    }

}
