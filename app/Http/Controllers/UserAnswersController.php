<?php

namespace App\Http\Controllers;

use App\Models\UserAnswer;
use Illuminate\Http\Request;

class UserAnswersController extends Controller
{
    public function answerquestion(Request $request){
        $newuseranswer = new UserAnswer([
            'user_id' => auth('sanctum')->user()->id,
            'question_id' => $request->question_id,
            'answer_id' => $request->answer_id,
        ]);

        $newuseranswer->save();
    }
}
