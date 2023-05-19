<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{
    public function index(Request $request){
        return Module::with('videos')->get();
    }

    public function getModuleVideos(Request $request, $id){
        return Module::with('videos')->find($id);
    }

    public function editModule(Request $request){
        $module = Module::find($request->id);
        $module->title = $request->title;
        $module->description = $request->description;
        $file = $request->file('thumbnail');
        if(!empty($file)){
            $path = $file->store('video_thumbnails');
            $module->thumbnail = '/' . $path;
        }
        $module->save();

        return response($request);
    }

    public function deleteModule(Request $request){
        $module = Module::find($request->id);
        $module->delete();
    }
}
