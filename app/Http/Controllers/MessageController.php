<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Models\messageAppendix;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return all messages
        return auth()->user()->channel->messages;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // variable you need are channel_id, user_channel_id, content
        // optional for the message is the response_to_id, appendix 
        // create a new message
        // check if the user of the request is the auth user
        // if not return error
        // if yes create a new message
        // if the message has an appendix create a new appendix
        // return the message
        $request->validate([
            'message' => 'required',
        ]);
        $userChannel = auth()->user()->channel;
        if($userChannel->id != $request->channel_id){
            return response()->json([
                'message' => 'You are not allowed to post in this channel'
            ], 403);
        }
        if($request->appendix){
            $appendix = new messageAppendix([
                'appendix' => $request->appendix,
            ]);
            $appendix->save();
        }
        $message = new message([
            'message' => $request->message,
            'user_id' => auth()->user()->id,
            'channel_id' => auth()->user()->channel->id,
        ]);
        $message->save();
        return $message;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
   

    }

    /**
     * Display the specified resource.
     */
    public function show(message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(message $message)
    {
        //
    }
}
