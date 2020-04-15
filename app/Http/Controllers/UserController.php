<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

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
        return view('administration.user_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        User::create([ 'name'=>$request->name,
        'email'=>$request->email,
        'role_id'=>$request->role_id,
        'password' => Hash::make($request->password),
        ]);
 
       return redirect(route('admin_user'))->with('status', 'L\'utilisateur  a bien été enregistrée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('administration.user_edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update([ 'name'=>$request->name,
        'email'=>$request->email,
        'role_id'=>$request->role_id,
        'password' => Hash::make($request->password),
        ]);
 
       return redirect(route('admin_user'))->with('status', 'Votre modification a bien été enregistrée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->posts()->delete();
        $user->comments()->delete();
        $user->delete();

       
        return redirect()->back()->with('status', 'L\'utilisateur ainsi que ses articles et commentaires ont étés supprimés');

    }
}
