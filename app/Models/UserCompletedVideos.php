<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompletedVideos extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'video_id'];
    protected $table = 'user_completed_videos';
}
