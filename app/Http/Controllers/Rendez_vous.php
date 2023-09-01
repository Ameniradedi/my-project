<?php

namespace App\Http\Controllers;

use App\Http\Controllers\client as ControllersClient;
use Illuminate\Http\Request;
use App\Models\Rdv;
use App\Models\Client;
use App\Models\Bureau_d_etude;
use App\Models\rendez_vous;
use Illuminate\Support\Facades\Log;

class RdvController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $rdvs = rendez_vous::join('client', 'client.id', '=', 'rdvs.client_id')
      ->join('medecins', 'medecins.id', '=', 'rdvs.medecin_id')
      ->get([
        'rdvs.id',
        'rdvs.date',
        'rdvs.heure',
        'clients.prenom AS client_prenom',
        'client.nom AS client_nom',
        'Bureau_d_etude.prenom AS Bureau_d_etude_prenom',
        'Bureau_d_etude.nom AS Bureau_d_etude_nom'
      ]);
    //dd($rdvs);
    return view('rdvs.index', compact('rdvs'));
  }


  /**,
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $client = Client::all();
    $Bureau_d_etude = Bureau_d_etude::all();
    return view('rdvs.create', compact('client', 'bureau d etude'));
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
      'date' => 'required',
      'heure' => 'required'
    ]);

    $rdv = new rendez_vous([
      'date' => $request->get('date'),
      'heure' => $request->get('heure'),
      'client_id' => $request->get('getclient'),
      'bureau_id' => $request->get('bureau')
    ]);

    $rdv->save();
    return redirect('/rdvs')->with('success', 'Le rdv a été enregistré!');
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
    $client = Client::all();
    $Bureau_d_etude = Bureau_d_etude::all();
    $rdv = rendez_vous::find($id);
    return view('rdvs.edit', compact('rdv', 'client', 'bureau d etude'));
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
      'date' => 'required',
      'heure' => 'required',
      'client_id' => 'required',
      'bureau_id' => 'required'
    ]);
    $rdv = Bureau_d_etude::find($id);
    $rdv->date = $request->get('date');
    $rdv->heure = $request->get('heure');
    $rdv->client_id = $request->get('getClient');
    $rdv->bureau_id = $request->get('getbureau');


    $rdv->save();
    return redirect('/rdvs')->with('success', 'Le rdv a été modifié!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $rdv = rendez_vous::find($id);
    $rdv->delete();
    return redirect('/rdvs')->with('success', 'Le rdv a été supprimé!');
  }
}
