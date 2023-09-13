<?php

namespace App\Http\Controllers;

use App\Models\Produit_agricole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Produit_agricoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produit_agricoles = Produit_agricole::join('users', 'users.id', '=', 'produit_agricoles.user_id')
            ->get([
                "produit_agricoles.id",
                "produit_agricoles.nom",
                "produit_agricoles.adresse",
                "produit_agricoles.prix",
                'users.name AS user_name',
            ]);
        return view('produit_agricoles.index', compact('produit_agricoles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produit_agricoles.create');
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

        $produit_agricole = new Produit_agricole([
            'nom' => $request->get('nom'),
            'prix' => $request->get('prix'),
            'adresse' => $request->get('adresse'),
            'user_id' => Auth::user()->id,
        ]);
        $produit_agricole->save();
        return redirect('/produit_agricoles')->with('success', 'lproduit_agricole a été enregistré!');
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
        $produit_agricole = Produit_agricole::find($id);
        return view('produit_agricoles.edit', compact('produit_agricole'));
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
        $produit_agricole = Produit_agricole::find($id);
        $produit_agricole->nom = $request->get('nom');
        $produit_agricole->prix = $request->get('prix');
        $produit_agricole->adresse = $request->get('adresse');
        $produit_agricole->save();
        return redirect('/produit_agricoles')->with('success', 'produit_agricole a été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit_agricole = Produit_agricole::find($id);
        $produit_agricole->delete();
        return redirect('/produit_agricoles')->with('success', 'produit_agricole a été supprimé!');
    }
}