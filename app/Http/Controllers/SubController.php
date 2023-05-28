<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubRequest;
use App\Http\Requests\UpdateSubRequest;
use App\Models\Achievement;
use App\Models\Sub;

class SubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Sub::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubRequest $request, Achievement $achievement)
    {
       $sub = $achievement->subs()->create($request->validated());

       return response()->json($sub);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sub $sub)
    {
        return response()->json($sub);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubRequest $request, Sub $sub)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sub $sub)
    {
        $sub->delete();
    }
}
