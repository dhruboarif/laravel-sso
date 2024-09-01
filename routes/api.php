<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/logmeout', function (Request $request) {
//dd('ok');
     
    $user = $request->user();
    $accessToken = $user->token(); 
    DB::table("oauth_refresh_tokens")->where("access_token_id", $accessToken->id)->delete();
    $accessToken->delete();

    return response()->json(['message' => 'Revloked, Logged out successfully']);
})->middleware('auth:api');
