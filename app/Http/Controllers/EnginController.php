<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Engin;

use Illuminate\Support\Facades\Auth as FacadesAuth;

class Engincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engins = Engin::all();
        return view('engins.index', compact('engins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('engins.create');
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

        $engin = new Engin([
            'nom' => $request->get('nom'),
            'caracteristique' => $request->get('carecteristique'),
            'adresse' => $request->get('adresse'),
            'prix' => $request->get('prix'),
            'user_id' => FacadesAuth::user()->id,
        ]);
        $engin->save();
        return redirect('/engins')->with('success', 'lengin a été enregistré!');
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
        $engin = Engin::find($id);
        return view('engins.edit', compact('engin'));
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
        $engin = Engin::find($id);
        $engin->nom = $request->get('nom');
        $engin->caracteristique = $request->get('caracteristique');
        $engin->adresse = $request->get('adresse');
        $engin->prix = $request->get('prix');
        $engin->save();
        return redirect('/engins')->with('success', 'engin a été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $engin = Engin::find($id);
        $engin->delete();
        return redirect('/engins')->with('success', 'engin a été supprimé!');
    }
}
