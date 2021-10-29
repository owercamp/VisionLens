<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Sales;
use Illuminate\Support\Arr;

class SalesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $sales = Sales::all();
    return view('bussiness.sales', compact('sales'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
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
      "total" => "required",
      "quota" => "required",
      "valueQuota" => "required",
      "obs" => "required"
    ]);

    $identy = str_replace(".", "", $request->identity_client);
    $total = str_replace(".", "", $request->total);
    $vQuota = str_replace(".", "", $request->valueQuota);

    Sales::create(
      [
        "sal_ide" => $identy,
        "sal_name" => $request->name_client,
        "sal_pho" => $request->phone,
        "sal_add" => $request->address,
        "sal_fact" => $request->facture,
        "sal_ema" => $request->email_Client,
        "sal_total" => $total,
        "sal_qua" => $request->quota,
        "sal_vqua" => $vQuota,
        "sal_obs" => $request->obs
      ]
    );

    $message = __('messages.RegisterSale') . " " . strtoupper($request->facture);
    return back()->with("Success", $message);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Sales  $sales
   * @return \Illuminate\Http\Response
   */
  public function show(Sales $sales)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Sales  $sales
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
   * @param  \App\Models\Sales  $sales
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Sales $sales)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Sales  $sales
   * @return \Illuminate\Http\Response
   */
  public function destroy(Sales $sales)
  {
    //
  }
}
