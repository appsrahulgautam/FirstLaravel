<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{

    public static function logoutman(){
        Auth::logout();
        return redirect("/") -> with("successcustom","You have logged out");
    }
}
