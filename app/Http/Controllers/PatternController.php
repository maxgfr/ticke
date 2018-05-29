<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pattern;

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
        $pattern = Pattern::get();
        return view('pattern.index', ['pattern' => $pattern]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pattern = new Pattern();
        return view('pattern.create', compact('pattern');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PatternRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatternRequest $request)
    {
        Pattern::create($request->all());
        return redirect()->route('pattern.index')->with('success', 'Pattern ajouté avec succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pattern  $pattern
     * @return \Illuminate\Http\Response
     */
    public function show(Pattern $pattern)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pattern = Pattern::findOrFail($id);
        return view('pattern.edit', compact('pattern');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PatternRequest  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatternRequest $request, $id)
    {
        $pattern = Pattern::findOrFail($id);
        $pattern->update($request->all());
        return redirect()->route('pattern.index')->with('success', 'Pattern mis à jour!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pattern = Pattern::findOrFail($id);
        $pattern->delete();
        return redirect()->route('pattern.index')->with('error', 'Pattern supprimé...');
    }
}
