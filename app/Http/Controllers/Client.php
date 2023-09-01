<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
            'prenom' => 'required'
        ]);

        $client = new Client([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'adresse' => $request->get('adresse'),
            'email' => $request->get('email'),
            'tel' => $request->get('tel')

        ]);
        $client->save();
        return redirect('/client')->with('success', 'Le client a été enregistré!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('client.edit', compact('client'));
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
            'prenom' => 'required'
        ]);
        $client = client::find($id);
        $client->nom = $request->get('nom');
        $client->prenom = $request->get('prenom');
        $client->adresse = $request->get('adresse');
        $client->email = $request->get('email');
        $client->tel = $request->get('tel');
        $client->save();
        return redirect('/patients')->with('success', 'Le patient a été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Client::find($id);
        $patient->delete();
        return redirect('/clients')->with('success', 'Le client a été supprimé!');
    }
}
