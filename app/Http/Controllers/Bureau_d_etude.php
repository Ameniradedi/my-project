<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rdv;
use App\Models\client;
use App\Models\bureau_d_etude;
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
      ->join('bureau_d_etudes', 'bureau_d_etudes.id', '=', 'rdvs.bureau_d_etude_id')
      ->get([
        'rdvs.id',
        'rdvs.date',
        'rdvs.heure',
        'clients.prenom AS client_prenom',
        'client.nom AS client_nom',
        'bureau_d_etudes.prenom AS bureau_d_etude_prenom',
        'bureau_d_etudes.nom AS bureau_d_etude_nom'
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
    $clients = Client::all();
    $bureau_d_etudes = Bureau_d_etude::all();
    return view('rdvs.create', compact('client', 'bureau_d_etudes'));
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
      'bureau_d_etude_id' => $request->get('getbureau_d_etude')
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
    $client = client::all();
    $bureau_d_etudes = bureau_d_etude::all();
    $rdv = rendez_vous::find($id);
    return view('rdvs.edit', compact('rdv', 'client', 'bureau_d_etudes'));
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
      'bureau_d_etude_id' => 'required'
    ]);
    $rdv = rendez_vous::find($id);
    $rdv->date = $request->get('date');
    $rdv->heure = $request->get('heure');
    $rdv->client_id = $request->get('getclient');
    $rdv->bureau_d_etude_id = $request->get('getbureau_d_etude');


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
