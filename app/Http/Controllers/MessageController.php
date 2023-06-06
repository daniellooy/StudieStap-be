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
       
        $userChannels = auth()->user()->channels;
        // rfind the channel that the request is trying to post in
        $userChannel = $userChannels->where('channel_id',$request->channel_id)->first();
        $uploadedFiles = $request->appendix_files;
        if($request->response_to_id === 'null'  ){
            $message = new Message([
                'message' => $request->message,
                'user_id' => auth()->user()->id,
                'channel_id' => $userChannel->channel_id,
            ]);
        }else{
            $message = new Message([
                'message' => $request->message,
                'user_id' => auth()->user()->id,
                'response_to_id' =>  $request->response_to_id,
                'channel_id' => $userChannel->channel_id,
            ]);
        }
        $message->save();
        if(!empty($uploadedFiles)){
            foreach ($uploadedFiles as $file){
                $filename = $file->getClientOriginalName(); 
                $file->storeAs('files', $filename);
                $fileType = $file->extension();
                $path = "files/" . $filename;
                $appendix = new MessageAppendix([
                    'message_id' => $message->id,
                    'appendix_type' => $fileType,
                    'appendix_path' => $path,
                ]);
                $appendix->save();
            }
        }
        return response(['status'=>'succes'], 200);
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
