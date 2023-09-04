<?php

namespace App\Http\Controllers;

use App\Models\Bureau_d_etude;
use App\Models\Rdv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rdvs = Rdv::all();
        return view('rdvs.index', compact('rdvs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bureau_d_etudes = Bureau_d_etude::all();
        return view('rdvs.create', compact('bureau_d_etudes'));
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
            'date_et_heure' => 'required',
        ]);

        $rdv = new Rdv([
            'date_et_heure' => $request->get('date_et_heure'),
            'bureau_d_etude_id' => $request->get('bureau_d_etude_id'),
            'user_id' => Auth::user()->id,
        ]);
        $rdv->save();
        return redirect('/rdvs')->with('success', 'le render vous a été enregistré!');
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
        $bureau_d_etudes = Bureau_d_etude::all();
        $rdv = Rdv::find($id);
        return view('rdvs.edit', compact('rdv', 'bureau_d_etudes'));
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

        $rdv = Rdv::find($id);
        $rdv->date_et_heure = $request->get('date_et_heure');
        $rdv->bureau_d_etude_id = $request->get('bureau_d_etude_id');
        $rdv->save();
        return redirect('/rdvs')->with('success', 'le render vous a été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rdv = Rdv::find($id);
        $rdv->delete();
        return redirect('/rdvs')->with('success', 'le render vous a été supprimé!');
    }
}