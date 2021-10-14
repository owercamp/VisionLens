<?php

namespace App\Http\Controllers;

use App\Models\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('bussiness.sales');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    request()->validate([
      "identity_client" => "required",
      "name_client" => "required|min:3",
      "address" => "required",
      "phone" => "required",
      "facture" => "required",
      "email_Client" => "required|email",
      "quota" => "required",
      "valueQuota" => "required",
      "obs" => "required"
    ]);

    return $request;
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Models\Sales  $sales
   * @return \Illuminate\Http\Response
   */
  public function show(Sales $sales)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Models\Sales  $sales
   * @return \Illuminate\Http\Response
   */
  public function edit(Sales $sales)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Models\Sales  $sales
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Sales $sales)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Models\Sales  $sales
   * @return \Illuminate\Http\Response
   */
  public function destroy(Sales $sales)
  {
    //
  }
}
