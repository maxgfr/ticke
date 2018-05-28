<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use Auth;
use App\Entity;
use Illuminate\Support\Facades\Input;

class EntityController extends Controller
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
        $entities = Auth::user()->entity()->get();
        return view('connected.entity', compact('entities'));
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
            'nom' => 'required',
            'adr' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = Entity::create(array_merge($request->all(), ['users_id' => Auth::user()->id]));
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
            'nom' => 'required',
            'adr' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = Entity::findOrFail($req->id);
            $data->nom = $req->nom;
            $data->adr = $req->adr;
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
         $entity = Entity::findOrFail($req->id);
         /* Security */
         $id_user = Auth::user()->id;
         if ($id_user != $entity->users_id) {
             abort(404);
         }
         /* End security */
         $entity->delete();
         return response()->json();
     }
}
