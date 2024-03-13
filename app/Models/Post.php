<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use  HasFactory;
    
    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];

    //to return the author of the post when we pass the post model
    public function findUserWhoPostedThis(){
        return $this->belongsTo(User::class, "user_id");
    }
}
