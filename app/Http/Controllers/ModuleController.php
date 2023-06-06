<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use PhpParser\Node\Expr\AssignOp\Mod;

class ModuleController extends Controller
{
    public function index(Request $request){
        return Module::with('videos')->get();
    }

    public function getModuleVideos(Request $request, $id){
        $module = Module::with('videos')->find($id);
        $alltrue = true;

        foreach($module->videos as $video){
            $video->completed = $video->userCompletedThisVideo(auth('sanctum')->user()->id);
            if($video->completed == false){
                $alltrue = false;
            }
        }

        $module->completed = $alltrue;
        return $module;
    }

    public function editModule(Request $request){
        $module = Module::find($request->id);
        $module->title = $request->title;
        $module->description = $request->description;
        $module->learningcategory_id = $request->learningcategory_id;
        $file = $request->file('thumbnail');
        if(!empty($file)){
            $path = $file->store('video_thumbnails');
            $module->thumbnail = '/' . $path;
        }
        $module->save();

        return response($request);
    }

    public function addModule(Request $request){
        $file = $request->file('thumbnail');
        if(!empty($file)){
            $path = $file->store('video_thumbnails');
        }
        $module = new Module([
            'title' => $request->title,
            'description' => $request->description,
            'learningcategory_id' => $request->learningcategory_id,
            'thumbnail' => '/' . $path,
        ]);
        $module->save();
    }

    public function deleteModule(Request $request){
        $module = Module::find($request->id);
        $module->delete();
    }
}
