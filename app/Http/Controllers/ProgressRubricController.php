<?php

namespace App\Http\Controllers;

use App\Models\ProgressRubric;
use Illuminate\Http\Request;

class ProgressRubricController extends Controller
{
    public function index(){
        return ProgressRubric::all();
    }

    public function show(Request $request, $id){
        return ProgressRubric::find($id);
    }

    public function edit(Request $request){
        $rubric = ProgressRubric::find($request->id);
        $rubric->title = $request->title;
        $rubric->description = $request->description;
        $rubric->save();
    }

    public function add(Request $request){
        $rubric = new ProgressRubric([
            'title'=> $request->title,
            'description' => $request->description
        ]);

        $rubric->save();
    }

    public function delete(Request $request){
        ProgressRubric::query()->where('id', '=', $request->id)->delete();
    }
}
