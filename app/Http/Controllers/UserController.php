<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Http\Request;
    
 
class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return $user;
        
    }
    /**
     * Update the profile for a given user.
     */
    public function update(Request $request)
    {

        $user = User::findOrFail($request->id);
        $profile_image = $request->file('profile_image');
        
        if(!empty($profile_image)){
            $path = $profile_image = $request->file('profile_image')->storeAs('images', $request->file('profile_image')->getClientOriginalName());
        }


        $user->update([
            'firstname' => $request->first_name,
            'lastname' => $request->last_name,
            'image' => $path,
            'bio' => $request->biography,
            'phone' => $request->phone,
            'workshop' => $request->workshop,
            'city' => $request->city,
            'street' => $request->street,
            // 'streetnumber' => $request->address,
            'zip' => $request->zip,
            'email' => $request->email,
        ]);
        $user->save();
        // update the fields of the users that are different from the request
        
        return $user;
    }
}