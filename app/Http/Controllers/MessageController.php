<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessageAppendix;
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
        // validate if there is a message or appendix_files

        $uploadedFiles = $request->appendix_files;
        if(!empty($uploadedFiles)){
            foreach ($uploadedFiles as $file){
                $filename = $file->getClientOriginalName(); 
                $file->storeAs('files', $filename);
                $fileType = $file->extension();
                $path = "files/" . $filename;
                return $path;
                // return $fileType;?
                // create an appendix object
                $appendix = new MessageAppendix([
                    'message_id' => $request->id,
                    'appendix_type' => $fileType,
                    'appendix_path' => 'null',
                ]);
                // $user->image = $file;
                // $user->save();
            }
        }
        if(!empty($request->message)){
            $userChannels = auth()->user()->channels;
            // rfind the channel that the request is trying to post in
            $userChannel = $userChannels->where('channel_id',$request->channel_id)->first();
            if($userChannel->id != $request->channel_id){
                return response()->json([
                    'message' => 'You are not allowed to post in this channel'
                ], 403);
            }
            $message = new Message([
                'message' => $request->message,
                'user_id' => auth()->user()->id,
                'channel_id' => $userChannel->channel_id,
            ]);

            // save the message
            $message->save();
        }
        return response(['status'=>'succes'], $message);
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
