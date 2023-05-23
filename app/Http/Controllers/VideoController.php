<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{

    public function index(Request $request){
        return Video::with('module')->orderBy('module_id')->get();
    }
    public function getVideoById(Request $request, $id){
        $video = Video::with('questions')->find($id);
        $module = Module::with('videos')->find($video->module_id);

        return response()->json([
            'video' => $video,
            'module' => $module
        ]);
    }

    public function editVideo(Request $request){
        $video = Video::find($request->id);
        $video->title = $request->title;
        $video->description = $request->description;
        $file = $request->file('thumbnail');
        $video_file = $request->file('video_file');
        if(!empty($file)){
            $path = $file->store('video_thumbnails');
            $video->thumbnail = '/' . $path;
        }
        if(!empty($video_file)){
            $path = $video_file->store('videos');
            $video->file_path = '/' . $path;
        }

        if($video->module_id != $request->module_id){
            $video->module_id = $request->module_id;
        }

        $video->save();

        return response($request);
    }

    public function addVideo(Request $request){
        $file = $request->file('thumbnail');
        $video_file = $request->file('video_file');
        if(!empty($file)){
            $path = $file->store('video_thumbnails');
        }
        if(!empty($video_file)){
            $file_path = $video_file->store('videos');
            $video_file_path = '/' . $file_path;
        }
        else{
            return response('Geen video geupload, fout.');
        }

        $video = new Video([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => '/' . $path,
            'file_path' => $video_file_path,
            'module_id' => $request->module_id,
        ]);
        $video->save();
    }

    public function deleteVideo(Request $request){
        $video = Video::find($request->id);
        $video->delete();
    }

}
