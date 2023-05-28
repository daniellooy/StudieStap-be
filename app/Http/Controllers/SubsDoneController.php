<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubsDoneRequest;
use App\Http\Requests\UpdateSubsDoneRequest;
use App\Models\Sub;
use App\Models\SubsDone;
use Illuminate\Http\Request;

class SubsDoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Sub $sub)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubsDoneRequest $request, Sub $sub)
    {
       $subDone = $sub->done()->create([ 'user_id' => $request->user()->id ]);
       return response()->json($subDone);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sub $sub, SubsDone $subsDone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubsDoneRequest $request, Sub $sub, SubsDone $subsDone)
    {
        $subsDone->update($request->validated());

        return $subsDone;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sub $sub, SubsDone $subsDone)
    {
        $subsDone->delete();
    }
}
