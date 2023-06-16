<?php

namespace App\Http\Controllers;

use App\Models\ProgressEvaluation;
use App\Models\ProgressRubric;
use App\Models\ProgressScore;
use App\Models\User;
use Illuminate\Http\Request;

class ProgressEvaluationsController extends Controller
{

    public function userEvaluationdata(Request $request){
        $user = auth('sanctum')->user();
        $rubrics = ProgressRubric::all();

        return response([
            'rubrics' => $rubrics,
            'evaluations'=> $user->evaluations
        ]);
    }

    public function index(){
        return ProgressEvaluation::with('user')->get();
    }

    public function show(Request $request, $id){
        $evaluation = ProgressEvaluation::query('scores')->where('id', '=', $id)->with('scores')->first();
        foreach ($evaluation->scores as $score){
            $score->rubric = ProgressRubric::find($score->progressrubric_id);
        }

        return $evaluation;
    }

    public function edit(Request $request){
        $evaluation = ProgressEvaluation::find($request->id);
        $evaluation->title = $request->title;
        $evaluation->user_id = $request->user_id;
        $scores = json_decode($request->scores);

        foreach ($scores as $score){
            $currscore = ProgressScore::find($score->id);
            $currscore->score = $score->score;
            $currscore->save();
        }

        $evaluation->save();
    }

    public function add(Request $request){
        $evaluation = new ProgressEvaluation([
            'title'=> $request->title,
            'user_id' => $request->user_id
        ]);

        $evaluation->save();

        $scores = json_decode($request->scores);
        foreach ($scores as $score){
            $newscore = new ProgressScore([
                'progressrubric_id' => $score->rubric->id,
                'progressevaluation_id' => $evaluation->id,
                'score' => $score->score
            ]);
            $newscore->save();
        }

        $evaluation->save();
    }

    public function delete(Request $request){
        ProgressEvaluation::query()->where('id', '=', $request->id)->delete();
    }

}
