<?php

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("getClient",function(Request $request){
    $query = Client::where('cli_id',$request->data)->get();
    return response()->json($query);
})->name("getClient");

Route::get("getUser", function(Request $request){
    $query = User::where('id',$request->data)->get();
    return response()->json($query);
})->name("getUser");
