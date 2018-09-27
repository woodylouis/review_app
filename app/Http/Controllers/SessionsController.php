<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }
    
    
    
    //Redirect to edit page after login
    public function store(Request $request)
    {
       $credentials = $this->validate($request, [
           'email' => 'required|email|max:255',
           'password' => 'required'
       ]);

       if (Auth::attempt($credentials, $request->has('remember'))) {
           session()->flash('success', 'Welcome back！');
           return redirect()->intended(route('users.show', [Auth::user()]));
       } else {
           session()->flash('danger', 'Password is incorrect');
           return redirect()->back();
       }
    }
}
