<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\UserChannel;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return all channels
        $channels = Channel::with("users")->get();
        return $channels;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $fileName = $request->file('image_file')->getClientOriginalName();
        $file = $request->file('image_file');
        if (!empty($file)) {
            $path = $file->storeAs('images', $fileName);
        }
        $channel = new Channel([
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $path,
        ]);
        $channel->save();

        return response(['status' => 'succes'], 200);
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

        $channel =  Channel::orderBy('created_at')->where('id', $id)->with('messages.user', 'messages.appendix', 'messages.responseTo.user')->first();
        // return the data with specific names
        return $channel;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $channel =  Channel::where('id', $id)->with('users.user')->first();
        return $channel;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $channel = Channel::find($request->id);
        $channel->name = $request->name;
        $channel->description = $request->description;
        $file = $request->file('image_file');

        $channelUsers = $channel->users()->get();
        $selectedUsers = explode(",", $request->users);
        // check if selectedUser is empty
            foreach ($selectedUsers as $user) {
              if(!($user == '')){
                  $userChannel = UserChannel::firstOrCreate([
                      'user_id' => $user,
                      'channel_id' => $channel->id,
                    ]);
                    $userChannel->save();
                }
            }
        $deleteUsers = $channelUsers->whereNotIn("user_id", $selectedUsers)->all();
        $collectie = new Collection($deleteUsers);
        $collectie->each->delete();


        return $channel->users()->get();

        if (!empty($file)) {
            $path = $file->storeAs('images', $file->getClientOriginalName());
            $channel->image_path =  $path;
        }
        $channel->save();
        return response(['status' => 'succes'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $channel = Channel::find($request->id);
        $channel->delete();

        return response(['status' => 'succes'], 200);
    }
}