<?php

use App\Http\Controllers\First;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostContoller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;


Route::get('/', [First::class, "homepage"]);
Route::post('/register', [UserController::class,"register"])->middleware("onlyguests");
Route::post('/login', [LoginController::class,"loginuser"])->middleware("onlyguests");
Route::get('/logoutman', [LogoutController::class,"logoutman"])->middleware("onlyloggedin");
//
Route::get('/createpost', [PostContoller::class,"createPost"])->middleware("onlyloggedin");
Route::post('/savepost', [PostContoller::class,"savepost"])->middleware("onlyloggedin");
Route::get('/viewpost/{postobject}', [PostContoller::class,"viewpost"])->middleware("onlyloggedin");
Route::get('/viewposttest', [PostContoller::class,"viewposttest"])->middleware("onlyloggedin");
//
//we are passing username but want it to be linked with user model object in controller
Route::get('/profile/{user:username}', [UserController::class,"profile"])->middleware("onlyloggedin");


