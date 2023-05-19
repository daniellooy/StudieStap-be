<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function getVideoById(Request $request, $id){
        $video = Video::find($id);
        $module = Module::with('videos')->find($video->module_id);

        return response()->json([
            'video' => $video,
            'module' => $module
        ]);
    }
}
