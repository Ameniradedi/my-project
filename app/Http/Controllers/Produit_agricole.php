<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produit_agricole;

class produit_agricoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produit_agricole = produit_agricole::all();
        return view('produit agricole.index', compact('produit agricole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produit agricole.create');
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
            'type' => 'required'
        ]);

        $medicament = new produit_agricole([
            'nom' => $request->get('nom'),
            'description' => $request->get('description'),
            'prix' => $request->get('prix'),
            'num tel' => $request->get('num tel')

        ]);
        $medicament->save();
        return redirect('/produit agricole')->with('success', 'Le produit agricole a été enregistré!');
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
        $produit_agricole = produit_agricole::find($id);
        return view('produit agricole.edit', compact('produit agricole'));
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
            'type' => 'required'
        ]);
        $produit_agricole = produit_agricole::find($id);
        $produit_agricole->nom = $request->get('nom');
        $produit_agricole->type = $request->get('type');
        $produit_agricole->prix= $request->get('prix');
        $produit_agricole->num_tel = $request->get('num tel');
        $produit_agricole->save();
        return redirect('/produit agricole')->with('success', 'Le produit a été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit_agricole= produit_agricole::find($id);
        $produit_agricole->delete();
        return redirect('/produit agricole')->with('success', 'Le produit a été supprimé!');
    }
}
