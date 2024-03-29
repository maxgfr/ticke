<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pattern;
use Validator;
use Response;
use Auth;
use Illuminate\Support\Facades\Input;

class PatternController extends Controller
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
        $patterns = Auth::user()->pattern()->get();
        return view('connected.pattern', compact('patterns'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'nom' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = Pattern::create(array_merge($request->all(), ['users_id' => Auth::user()->id]));
            return response()->json($data);
        }
    }


    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $req)
    {
        $rules = array(
            'nom' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = Pattern::findOrFail($req->id);
            $data->nom = $req->nom;
            $data->save();
            return response()->json($req);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $req)
     {
         $pattern = Pattern::findOrFail($req->id);
         /* Security */
         $id_user = Auth::user()->id;
         if ($id_user != $pattern->users_id) {
             abort(404);
         }
         /* End security */
         $pattern->delete();
         return response()->json();
     }
}
