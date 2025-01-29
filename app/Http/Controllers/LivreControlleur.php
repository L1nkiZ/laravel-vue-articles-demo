<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Livre;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Validator;

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
                    $query->select('id', 'nom', 'image');
                },
            ])
            ->leftjoin('auteurs as a', 'a.id', '=', 'livres.auteur_id')
            ->select('livres.id', 'titre', 'auteur_id', 'livres.image')
            ->orderBy('nom', 'asc')
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
        $auteurs = Auteur::select('id', 'nom')
            ->orderBy('nom', 'asc')
            ->get();

        return response()->json(compact('auteurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'required|string|max:100|unique:livres,titre',
            'contenu' => 'nullable|string',
            'auteur_id' => 'nullable|numeric|exists:auteurs,id',
            'image' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->messages()
            ]);
        }

        $livre = Livre::create([
            'titre' => $request->titre,
            'nom_interne' => Str::slug($request->titre, '_'),
            'contenu' => $request->contenu,
            'image' => $request->image,
            'visible' => true,
            'auteur_id' => $request->auteur_id,
        ]);

        if ($livre) {
            return response()->json([
                'error' => false,
                'message' => 'Le livre a été créé avec succès',
            ]);
        }

        return response()->json($this->error);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livre = Livre::with([
            'auteur' => function ($query) {
                $query->select('id', 'nom', 'image');
            },
        ])
            ->leftjoin('auteurs as a', 'a.id', '=', 'livres.auteur_id')
            ->select('livres.id', 'titre', 'contenu', 'auteur_id', 'livres.image', 'contenu', 'livres.created_at')
            ->where('livres.id', $id)
            ->first();

        return response()->json(compact('livre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auteurs = Auteur::select('id', 'nom')
            ->orderBy('nom', 'asc')
            ->get();

        $livre = Livre::find($id);

        if ($livre) {
            return response()->json(compact('livre', 'auteurs'));
        }

        return response()->json($this->error);
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
        $validator = Validator::make($request->all(), [
            'titre' => 'required|string|max:100|unique:livres,titre',
            'contenu' => 'nullable|string',
            'auteur_id' => 'nullable|numeric|exists:auteurs,id',
            'image' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->messages()
            ]);
        }

        $livre = Livre::find($id);

        if ($livre) {
            $livre->update($request->all());
            return response()->json([
                'error' => false,
                'message' => 'Le livre a été modifié avec succès',
            ]);
        }

        return response()->json($this->error);
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
