<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $user = Auth::user();
        return view('connected.utilisateur', compact('user'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function update(Request $req)
    {
        $utilisateur = Auth::user();
        if ($req['password'] != null) {
            if ($req['email'] == Auth::user()->email) {
                $rules = array(
                    'name' => 'required|string|max:255',
                    'firstname' => 'required|string|max:255',
                    'mobile' => 'required|max:20',
                    'password' => 'required|string|min:6',
                    'password-confirm' => 'required|same:password',
                );
            } else {
                $rules = array(
                    'name' => 'required|string|max:255',
                    'firstname' => 'required|string|max:255',
                    'mobile' => 'required|max:20',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6',
                    'password-confirm' => 'required|same:password',
                );
            }
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $utilisateur->update([
                    'name' => $req['name'],
                    'firstname' => $req['firstname'],
                    'mobile' => $req['mobile'],
                    'email' => $req['email'],
                    'password' => bcrypt($req['password']),
                ]);
                return redirect()->back()->with('success','Informations modifiées');
            }
        } else {
            if ($req['email'] == Auth::user()->email) {
                $rules = array(
                    'name' => 'required|string|max:255',
                    'firstname' => 'required|string|max:255',
                    'mobile' => 'required|max:20',
                );
            } else {
                $rules = array(
                    'name' => 'required|string|max:255',
                    'firstname' => 'required|string|max:255',
                    'mobile' => 'required|max:20',
                    'email' => 'required|string|email|max:255|unique:users',
                );
            }
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $utilisateur->update([
                    'name' => $req['name'],
                    'firstname' => $req['firstname'],
                    'mobile' => $req['mobile'],
                    'email' => $req['email'],
                ]);
                return redirect()->back()->with('success','Informations modifiées');
            }
        }
    }

}
