<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return all channels
        
        return Channel::all();
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
        // order by messages created_at
        // get the channel messages and the appendixes of that message


        $channel =  Channel::orderBy('created_at')->where('id',$id)->with('messages.user', 'messages.appendix', 'messages.responseTo.user')->first();
        // return the data with specific names
        return $channel;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(channel $channel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, channel $channel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(channel $channel)
    {
        //
    }
}
