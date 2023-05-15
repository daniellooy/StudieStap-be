<?php

namespace App\Http\Controllers;

use DB;
use App\Models\achievements;
use Illuminate\Http\Request;

class AchievementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $achievements = DB::table("achievements")->get();
        return response()->json($achievements);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(achievements $achievements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(achievements $achievements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, achievements $achievements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(achievements $achievements)
    {
        //
    }
}
