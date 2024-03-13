<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Post;
use Illuminate\Http\Request;

class PostContoller extends Controller
{
    public static function viewpost(Post $postobject){
        return view("singlepost", ["post"=> $postobject]);
    }  
    
    public static function viewposttest(){
        return view("singlepost");
    }  
    
    
    public static function createPost(){
        return view("create-post");
    } 
    
    public static function savepost(Request $request){

        $letscheckpassedvalues = $request->validate([
            "title"=>"required|min:5|max:30",
            "body"=>"required|min:5|max:1000",
        ]);

        //lets remobe html tags from the strings received 
        $letscheckpassedvalues["title"] = strip_tags($letscheckpassedvalues["title"]);
        $letscheckpassedvalues["body"] = strip_tags($letscheckpassedvalues["body"]);
        $letscheckpassedvalues["user_id"] = auth()->id();
        //

        $postObjectCreated = Post::create($letscheckpassedvalues);

        return redirect("/viewpost/{$postObjectCreated->id}")->with("successcustom","New post has been posted successfully");
       
    }
}
