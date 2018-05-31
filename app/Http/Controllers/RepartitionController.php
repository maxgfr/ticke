<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repartition;
use App\Pattern;
use Validator;
use Response;
use Auth;
use Illuminate\Support\Facades\Input;

class RepartitionController extends Controller
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
    public function index($id)
    {
        $pattern = Pattern::findOrFail($id);
        $repartitions = $pattern->repartition()->get();
        return view('connected.repartition', compact('repartitions', 'id'));
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
            'emplacement' => 'required|numeric',
            'total' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = Repartition::create(array_merge($request->all(), ['pattern_id' => $request->get('pattern_id')]));
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
            'emplacement' => 'required|numeric',
            'total' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = Repartition::findOrFail($req->id);
            if ($req->nom != "") {
                $data->nom = $req->nom;
            }
            $data->emplacement = $req->emplacement;
            $data->total = $req->total;
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
         $repartion = Repartition::findOrFail($req->id);
         $repartion->delete();
         return response()->json();
     }
}
