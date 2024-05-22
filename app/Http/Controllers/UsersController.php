<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class UsersController extends Controller
{
    public function index()
    {
        return view("users.index", [
            "pengguna" => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
    }

    public function insertdata(Request $request)
    {
        User::create($request->all());
        return redirect('/users')->with('success', 'New User Data Created Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view("users.store");
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
        $users = User::find($id);
        if (!$users) return redirect()->route('users.edit');
        return view('users.edit', [
            'users' => $users
        ]); 
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
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->email_verified_at = $request->email_verified_at;
        if ($request->password) $users->password = bcrypt ($request->password);
        $users->roles = $request->roles;
        $users->aktif = $request->aktif;
        $users->save();
        return redirect('/users')->with('success', 'users Data Update Successfully');    
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapususers($id) 
    { 
        $users = User::find($id);
        $users->delete();
        return redirect('/users')->with('success', 'The users Data Successfully Delete!');
    }
}
