<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class First extends Controller
{
  
    public static function homepage(){
      if(auth()->check()){
        //if user already logged in 
        return view("home_logged_in_no_results"); 
     }else{
        return view("welcome"); 
     }
    }


}
