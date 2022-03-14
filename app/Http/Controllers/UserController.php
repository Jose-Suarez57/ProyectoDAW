<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){

        $users = User::paginate(4);

        return view('users.index', compact('users'));

    }

    public function edit(User $user)
    {

        return view('users.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        if($request->banned == null){

            $request->validate([
                'name' => 'required|min:3|max:255',
                'age' => 'numeric|min:10|max:99',
            ]);

            $user->name = $request->name;
            $user->age = $request->age;

            $user->save();

            return redirect()->route('index')->with('success','');

        } else if($request->banned == 0) {

            $user->banned = 1;

            $user->save();

            return redirect()->back();

        } else {

            $user->banned = 0;

            $user->save();

            return redirect()->back();

        }


    }
}
