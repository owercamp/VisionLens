<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;


class ClientController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $register = Client::all();
    return \view('clients.listClient', compact('register'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $register = Client::all();
    return view('clients.newclient', compact('register'));
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
      "name_client" => "required",
      "identity_client" => "required",
      "address" => "required",
      "phone" => "required|min:9",
      "email_Client" => "required|email",
      "referred" => "required"
    ]);

    $identity = \str_replace('.', '', $request->identity_client);

    $findClient = Client::where('cli_ide', $identity)->first();

    if ($findClient) {
      $message = __('messages.Identity_Exists') . ': ' . $request->identity_client;
      return back()->with('Error', $message);
    }
    Client::create([
      'cli_name' => Str::ucfirst($request->name_client),
      'cli_ide' => $identity,
      'cli_add' => Str::lower($request->address),
      'cli_pho' => $request->phone,
      'cli_ema' => $request->email_Client,
      'cli_ref' => Str::ucfirst($request->referred)
    ]);
    $message = __('messages.Success_Client') . ': ' . $request->name_client;
    return \redirect()->route('client.index')->with('Success', $message);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Client  $client
   * @return \Illuminate\Http\Response
   */
  public function show(Client $client)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Client  $client
   * @return \Illuminate\Http\Response
   */
  public function edit(Client $client)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Client  $client
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
    request()->validate([
      "name_client" => "required",
      "identity_client" => "required",
      "address" => "required",
      "phone" => "required|min:9",
      "email_Client" => "required|email",
      "referred" => "required"
    ]);

    $client = Client::where('cli_id', $request->id)->first();

    if (!$client) {
      $message = __('messages.Error_Messages');
      return back()->with('Error', $message);
    }

    $client->cli_name = $request->name_client;
    $client->cli_ide = $request->identity_client;
    $client->cli_add = $request->address;
    $client->cli_pho = $request->phone;
    $client->cli_ema = $request->email_Client;
    $client->cli_ref = $request->referred;
    $client->save();

    $message = __('messages.Update_Register') . ' ' . $request->name_client;
    return redirect()->route('client.index')->with('Update', $message);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Client  $client
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, Client $client)
  {
    $client = Client::where('cli_id', $request->id)->first();
    if (!$client) {
      $message = __('messages.Error_Messages');
      return back()->with('Error', $message);
    }
    $client->destroy($request->id);
    DB::statement("alter table clients auto_increment=1");
    $message = __('messages.Destroy_Client') . ' ' . $client->cli_name;
    return redirect()->route('client.index')->with("Delete", $message);
  }
}
