<?php

namespace App\Http\Controllers;

use App\Models\Bureau_d_etude;
use Illuminate\Http\Request;

class Bureau_d_etudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bureau_d_etudes = Bureau_d_etude::all();
        return view('bureau_d_etudes.index', compact('bureau_d_etudes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bureau_d_etudes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
        ]);

        $bureau_d_etude = new Bureau_d_etude([
            'nom' => $request->get('nom'),
            'adresse' => $request->get('adresse'),

        ]);
        $bureau_d_etude->save();
        return redirect('/bureau_d_etudes')->with('success', 'lbureau_d_etude a été enregistré!');
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
        $bureau_d_etude = Bureau_d_etude::find($id);
        return view('bureau_d_etudes.edit', compact('bureau_d_etude'));
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
        $request->validate([
            'nom' => 'required',
        ]);
        $bureau_d_etude = Bureau_d_etude::find($id);
        $bureau_d_etude->nom = $request->get('nom');
        $bureau_d_etude->adresse = $request->get('adresse');
        $bureau_d_etude->save();
        return redirect('/bureau_d_etudes')->with('success', 'bureau_d_etude a été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bureau_d_etude = Bureau_d_etude::find($id);
        $bureau_d_etude->delete();
        return redirect('/bureau_d_etudes')->with('success', 'bureau_d_etude a été supprimé!');
    }
}
