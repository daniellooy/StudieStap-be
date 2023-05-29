<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    function getQuestion(Request $request, $id){
        return Question::with('questionAnswer')->find($id);
    }
}
