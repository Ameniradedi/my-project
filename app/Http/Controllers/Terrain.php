?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;
use App\Models\terrain;

class terraintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terrain = terrain::all();
        return view('terrain.index', compact('terrain'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('terrain.create');
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
            'titre juridique' => 'required',
            'espace' => 'required'
        ]);

        $terrain = new terrain([
            'titre juridique' => $request->get('titre'),
            'espace' => $request->get('espace'),
            'num tel de proprietaire' => $request->get('num tel de proprietaire'),
            'prix' => $request->get('prix')
        

        ]);
        $terrain->save();
        return redirect('/terrain')->with('success', 'Le terrain a été enregistré!');
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
        $terrain = terrain::find($id);
        return view('terrain.edit', compact('terrain'));
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
            'code' => 'required'
        ]);
        $terrain = terrain::find($id);
        $terrain->Titre = $request->get('titre');
        $terrain->espace= $request->get('espace');
        $terrain->numero = $request->get('num');
        $terrain->prix = $request->get('prix');
        $terrain->save();
        return redirect('/terrain')->with('success', 'Le terrain a été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $terrain = terrain::find($id);
        $terrain->delete();
        return redirect('/terrain')->with('success', 'Le terrain a été supprimé!');
    }
}
