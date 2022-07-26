<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use Illuminate\Contracts\Auth\Authenticatable;


class UserController extends Controller
{
    public function login(Request $request){

        $request->validate([
            "email" => "required|email",
            "password" => "required|min:5|max:12"
        ]);

        $user = DB::table('users')
            ->where('users.email',$request->email)
            ->first();


        // Check user
        if($user){

            // check password
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loggedUser',$user);
                return view('dashboard')->with("success", "Successfully logged in");
            }

            else{
                return view("login")->with("fail", "Password does not match");
            }


        }
        else{

            return view("login")->with("fail", "Invalid email");
        }
    }


    public function signup(Request $request){

        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:5|max:12"
        ]);

        $user = new user();
        $user -> name = $request -> name;
        $user -> email  = $request -> email ;
        $user -> password =Hash::make($request -> password);
        $user -> role = 0;
        $user -> save();
        return view("login")->with("success", "Successfully Registered");

    }

    public function logout(){
        if(session()->has('loggedUser')){
            session()->pull('loggedUser');
            return view('login');
        }
    }

}
