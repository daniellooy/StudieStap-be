<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // var_dump($request->name);
        $request->validate([
             'firstname' => ['required'],
             'lastname' => ['required'],
             'email' => ['required', 'email', 'unique:users'],
             'password' => ['required', 'min:8', 'confirmed']
         ]);

         User::create([
             'firstname' => $request->firstname,
             'lastname' => $request->lastname,
             'email' => $request->email,
             'password' => Hash::make($request->password)
         ]);
    }
}