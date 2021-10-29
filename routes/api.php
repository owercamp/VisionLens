<?php

use App\Models\Client;
use App\Models\Sales;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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

Route::post("getClient", function (Request $request) {
  $query = Client::where('cli_id', $request->data)->get();
  return response()->json($query);
})->name("getClient");

Route::get("getUser", function (Request $request) {
  $query = User::where('id', $request->data)->get();
  return response()->json($query);
})->name("getUser");

// *consulta cliente para venta
Route::post("dataClient", function (Request $request) {
  $query = Client::where('cli_ide', $request->data)->get();
  return response()->json($query);
})->name("dataClient");

// *consulta ultima factura
Route::get("getFacture", function () {
  $query = Sales::orderBy('sal_fact', 'desc')->get();
  $facture = (isset($query[0]['sal_fact'])) ? $query[0]['sal_fact'] : "VL-000000";
  return response()->json($facture);
})->name("getFacture");

// ?consulta factura solicitada
Route::post("getSale", function (Request $request) {
  $query = Sales::where('id', $request->data)->get();
  return response()->json($query);
})->name("getSale");
