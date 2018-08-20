<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
     
    public function index()
    {
        $user = Auth::user();
        return view('admin/user', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function newEmail(Request $request)
    {
        $user = Auth::user();
        $newEmail = $request->email;
        $currentPassword = $request->currentPassword;

        if (Hash::check($currentPassword, $user->password)) {
            $objuser = User::find(Auth::user()->id);
            $objuser->email = $newEmail;
            $objuser->save();
            return redirect()->back()->with('message', 'Email alterado com sucesso.');
        } else {
            return redirect()->back()->with('error', 'Senha não confere.');
        }
    }

    public function newPassword(Request $request)
    {
        $user = Auth::user();
        $currentPassword = $request->currentPassword;
        $newPassword = $request->newPassword;
        $passwordConfirmation = $request->passwordConfirmation;
        

        if (Hash::check($currentPassword, $user->password) && ($newPassword == $passwordConfirmation)) {
            $objuser = User::find(Auth::user()->id);
            $objuser->password = Hash::make($newPassword);
            $objuser->save();
            return redirect()->back()->with('message', 'Senha alterada com sucesso.');
        } else {
            return redirect()->back()->with('error', 'Senhas não conferem.');
        }
    }


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
        //
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
        //
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
    }
}
