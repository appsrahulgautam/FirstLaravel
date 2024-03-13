<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;

class UserController extends Controller
{
    public static function profile(User $user){
        $findAllPosts = $user-> findAllPostsOfThisUser() -> latest() -> get();
        $totalpostscount = $user->findAllPostsOfThisUser()->count();
        return view("profile-posts" ,["username"=> $user->username, 
        "posts"=> $findAllPosts, "totalpostscount"=> $totalpostscount]);
    }

    //
    public static function register(Request $passeddata){
        //this is validating whether user has passed all data 

        $letscheckobject = $passeddata->validate([
            'username'=>'required|min:5|max:30|unique:users,username',
            'email'=> 'required|email|unique:users,email',
            'password'=>'required|min:4|confirmed'
        ]);
        //
        //
      $justcreateduser =   User::create($letscheckobject);
      auth()->login($justcreateduser);
        //
        //
        return redirect("/").with("successcustom","You have successfully created your account");
    }
}
