<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.users', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = User::where('id',$request->id)->first();
        if(!$user){
            $message = __('messages.Error_Messages');
            return back()->with('ErrorUpdate',$message);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        
        $message = __('messages.Update_Register')." ".$user->name;
        return redirect()->route('user.index')->with('SuccessUser',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user = User::where('id',$request->id)->first();
        if(!$user){
            $message = __('messages.Error_Messages');
            return back()->with('ErrorUpdate',$message);
        }
        $user->destroy($request->id);
        DB::statement('alter table users auto_increment=1');
        $message = __('messages.Destroy_User').' '.$user->name;
        return redirect()->route('user.index')->with("DeleteUser",$message);
    }
}
