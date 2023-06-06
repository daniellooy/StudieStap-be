<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressRubric extends Model
{
    use HasFactory;

    protected $table = 'progressrubrics';

    protected $fillable = ['title', 'description'];
}
