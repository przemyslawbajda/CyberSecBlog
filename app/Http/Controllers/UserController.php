<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;


class UserController extends Controller
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
        
        if(!$user = User::find($id)){
            return redirect('');
        }
        
        if (\Auth::user()->id != $user->id or !Auth::check()) { 
            return redirect('');
        }
        return view('updateUserForm', compact('user'));
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        if(!$user = User::find($id)){
            return redirect('');
        }
        
        if (\Auth::user()->id != $user->id or !Auth::check()) { 
            return redirect('');
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        if($user->save()) { 
            return redirect('home');
            
        }
        
        return redirect('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        if(!$user = User::find($id)){
            return redirect('');
        }
        
        if (\Auth::user()->id != $user->id or !Auth::check()) { 
            return redirect('');
        }
        
        if($user->delete()) { 
            return redirect('');
            
        }
    }
}
