<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginPage(){//first we are checking that if the user is already logged in then show him the books.index page else show him the login page
        if(Auth::check()){
            return redirect()->route('books.index');
        }
        else{
            return view('login');
        }
    }
    public function login(Request $request){
        $data = $request->validate([//validating form fields
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($data)){//checking if the email and password exists in the db table('users');
            return redirect()->route('books.index');
        }else{
            return redirect()->route('login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

}
