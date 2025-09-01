<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/welcome', function () {
    return response()->json([
        'message' => 'hello welcome to PCM API',
        'version' => '1.0.0',
        'description' => 'You can create projects, add tasks, assign tasks to users, and track task progress.',
        'tip' => "Have a nice day 🍀"
    ]);
});


Route::post('/welcome', function (Request $request) {
    return response()->json([
        'message'   => 'This is a POST request',
         'data'     => $request->all(),
         'name'     => $request->name
    ]);
});
