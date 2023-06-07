<?php

namespace App\Http\Controllers;

use App\Models\FunFact;
use Illuminate\Http\Request;

class FunFactController extends Controller
{
    public function index(){
        return FunFact::all()->first();
    }

    public function edit(Request $request){
        $funfact = FunFact::all()->first();
        $funfact->fact = $request->fact;
        $funfact->save();
    }
}
