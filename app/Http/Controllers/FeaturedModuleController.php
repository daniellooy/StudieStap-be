<?php

namespace App\Http\Controllers;

use App\Models\FeaturedModule;
use Illuminate\Http\Request;

class FeaturedModuleController extends Controller
{
    public function index(){
        return FeaturedModule::query()
            ->with('module')
            ->get();
    }

    public function edit(Request $request){
        $featuredmodule = FeaturedModule::all()->first();
        $featuredmodule->module_id = $request->module_id;
        $featuredmodule->save();

        return $featuredmodule;
    }
}
