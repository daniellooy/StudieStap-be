<?php

namespace App\Http\Controllers;

use App\Models\Question_Answer;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    function getQuestion(Request $request, $id){
        $question = Question::with('questionAnswer')->find($id);
        $question->answered = $question->userHasAnsweredThisQuestion(auth('sanctum')->user()->id);
        if($question->answered){
            $useranswer = UserAnswer::query()
                ->where('user_id', '=', auth('sanctum')->user()->id)
                ->where('question_id', '=', $question->id)->first();
            $question->userAnswer = $useranswer;
        }

        return $question;
    }

    function index(){
        return Question::with('questionAnswer')->get();
    }

    public function addQuestion(Request $request){
        $question = new Question([
            'question' => $request->question,
            'explanation' => $request->explanation,
            'video_id' => $request->video_id,
        ]);
        $question->save();
        $answers = json_decode($request->answers);

        foreach ($answers as $answer){
            $newanswer = new Question_Answer([
                'answer' => $answer->answer,
                'correct' => $answer->correct,
                'question_id' => $question->id
            ]);

            $newanswer->save();
        }

        return $answers;
    }

    public function editQuestion(Request $request){
        $question = Question::find($request->id);
        $question->question = $request->question;
        $question->explanation = $request->explanation;

        $question->save();

        $answers = json_decode($request->answers);

        foreach ($answers as $answer){
            $updateanswer = Question_Answer::find($answer->id);
            $updateanswer->answer = $answer->answer;
            $updateanswer->correct = $answer->correct;
            $updateanswer->question_id = $question->id;
            $updateanswer->save();
        }

        return response($question, 200);
    }

    public function deleteQuestion(Request $request){
        $video = Question::find($request->id);
        $video->delete();
    }
}
