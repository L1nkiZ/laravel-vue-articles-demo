<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Livre;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LivreControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livres =
            Livre::with([
                'auteur' => function ($query) {
                    $query->select('id', 'nom');
                },
            ])
            ->leftjoin('auteurs as a', 'a.id', '=', 'livres.auteur_id')
            ->select('livres.id', 'titre', 'contenu', 'auteur_id', 'a.nom as auteur_nom', 'a.image as auteur_image')
            ->get();

        return response()->json(compact('livres'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
