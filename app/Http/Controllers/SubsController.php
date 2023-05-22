<?php

namespace App\Http\Controllers;

use DB;
use App\Models\subs;
use Illuminate\Http\Request;

class SubsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subs = DB::table("subs")->get();
        return response()->json($subs);
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
    public function show(subs $subs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(subs $subs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, subs $subs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subs $subs)
    {
        //
    }
}
