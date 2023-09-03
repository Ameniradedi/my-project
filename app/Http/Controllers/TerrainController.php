<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TerrainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terrains = Terrain::all();
        return view('terrains.index', compact('terrains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('terrains.create');
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

        $terrain = new Terrain([
            'nom' => $request->get('nom'),
            'espace' => $request->get('espace'),
            'prix' => $request->get('prix'),
            'adresse' => $request->get('adresse'),
            'description' => $request->get('description'),
            'user_id' => Auth::user()->id,
            "numero_proprietaire" => $request->get('numero_proprietaire'),

        ]);
        $terrain->save();
        return redirect('/terrains')->with('success', 'lterrain a été enregistré!');
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
        $terrain = Terrain::find($id);
        return view('terrains.edit', compact('terrain'));
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
        $terrain = Terrain::find($id);
        $terrain->nom = $request->get('nom');
        $terrain->espace = $request->get('espace');
        $terrain->prix = $request->get('prix');
        $terrain->adresse = $request->get('adresse');
        $terrain->description = $request->get('description');
        $terrain->numero_proprietaire = $request->get('numero_proprietaire');
        $terrain->save();
        return redirect('/terrains')->with('success', 'terrain a été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $terrain = Terrain::find($id);
        $terrain->delete();
        return redirect('/terrains')->with('success', 'terrain a été supprimé!');
    }
}
