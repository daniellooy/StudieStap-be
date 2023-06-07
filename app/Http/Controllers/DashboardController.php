<?php

namespace App\Http\Controllers;

use App\Models\FeaturedModule;
use App\Models\FunFact;
use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $featuredmodule = FeaturedModule::all()->first();
        $featuredmodule->moduledata = Module::query()->where('id', '=', $featuredmodule->module_id)->first();


        return response([
            'funfact' => FunFact::all()->first(),
            'featuredmodule' => $featuredmodule,
            'users' => User::all()
        ]);
    }
}
