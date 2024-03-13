<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  
    public static function loginuser(Request $request){

        $letscheckpassedvalues = $request->validate([
            "loginusername"=> "required",
            "loginpassword" => "required"
        ]);

        if (Auth::attempt(['username' => $letscheckpassedvalues["loginusername"],
         'password' => $letscheckpassedvalues["loginpassword"]])) {
            //login success
            $request->session()->regenerate();
            return redirect("/");
        }else{
           return redirect("/")->with("failedcustom","Failed to authenticate");
        }
    
    }


}