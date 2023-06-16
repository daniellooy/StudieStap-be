<?php

namespace App\Http\Controllers;

use App\Models\UserCompletedVideos;
use Illuminate\Http\Request;

class UserCompletedVideoController extends Controller
{
    public function completeVideo(Request $request){
        $usercompletedvideo = new UserCompletedVideos([
            'user_id' => auth('sanctum')->user()->id,
            'video_id' => $request->video_id
        ]);

        $usercompletedvideo->save();
    }
}
