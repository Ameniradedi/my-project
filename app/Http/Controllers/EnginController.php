<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Engin;


class Engincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engin = engin::all();
        return view('engins.index', compact('engin'));
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
            'carecteristique' => 'required'
        ]);

        $engin = new Engin([
            'nom' => $request->get('nom'),
            'carecteristique' => $request->get('carecteristique'),
            'prix' => $request->get('prix'),
            'disponibilité' => $request->get('disponibilité'),
            'numéro tel'=> $request->get('numero')

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
        $engin =Engin::find($id);
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
            'caracteristique' => 'required'
        ]);
        $engin = Engin::find($id);
        $engin->nom = $request->get('nom');
        $engin->prix = $request->get('prix');
        $engin->carecteristique = $request->get('carecteristique');
        $engin->disponibilité= $request->get('disponibilité');
        $engin->description= $request->get('description');
        $engin->num_tel = $request->get('num tel');
        $engin->save();
        return redirect('/engin')->with('success', 'engin a été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $engin= engin::find($id);
        $engin->delete();
        return redirect('/engin')->with('success', 'engin a été supprimé!');
    }
}
