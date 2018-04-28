<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use Auth;
use App\Restaurant;
use Illuminate\Support\Facades\Input;

class RestaurantController extends Controller
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
        $restaurants = Restaurant::get();
        return view('connected.restaurant', compact('restaurants'));
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
            'cp' => 'required|digits:5',
            'ville' => 'required',
            'mobile' => 'required|numeric',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = Restaurant::create(array_merge($request->all(), ['responsable' => Auth::user()->id]));
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
        $data = Restaurant::findOrFail($req->id);
        $data->nom = $req->nom;
        $data->adr = $req->adr;
        $data->ville = $req->ville;
        $data->cp = $req->cp;
        $data->mobile = $req->mobile;
        $data->save();
        return response()->json($req);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $req)
     {
         $restaurant = Restaurant::findOrFail($req->id);
         $restaurant->delete();
         return response()->json();
     }
}
