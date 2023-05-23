<?php

namespace App\Http\Controllers;

use App\Models\UserChannel;
use Illuminate\Http\Request;

class UserChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $channels = auth()->user()->channels;
        foreach($channels as $channel){
            $channel->channel;
        }
        return $channels;
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
    public function show(String $id)
    {
        // return a channel by id
        $channel =  UserChannel::where('channel_id',$id)->get();
        $messages = $channel;
        return [ $channel, $messages];
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserChannel $userChannel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserChannel $userChannel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserChannel $userChannel)
    {
        //
    }
}
