<?php

namespace App\Http\Controllers;

use App\Models\LearningCategory;
use Illuminate\Http\Request;

class LearningCategoryController extends Controller
{
    public function index(){
        return LearningCategory::with('modules')->get();
    }

    public function getCategoryById(Request $request, $id){
        return LearningCategory::with('modules')->find($id);
    }

    public function editCategory(Request $request){
        $learningcategory = LearningCategory::find($request->id);
        $learningcategory->title = $request->title;
        $learningcategory->description = $request->description;
        $learningcategory->save();

        return response($request);
    }

    public function addCategory(Request $request){
        $learningcategory = new LearningCategory([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        $learningcategory->save();
    }

    public function deleteCategory(Request $request){
        $module = LearningCategory::find($request->id);
        $module->delete();
    }
}
