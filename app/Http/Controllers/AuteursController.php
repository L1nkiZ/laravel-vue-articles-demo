<?php

namespace App\Http\Controllers;

use App\Models\Auteur;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Validator;

class AuteursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auteurs =
            Auteur::select('id', 'nom', 'image', 'created_at')
            ->orderBy('nom', 'asc')
            ->get();

        return response()->json(compact('auteurs'));
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
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:200|unique:auteurs,nom',
            'image' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->messages()
            ]);
        }

        $auteur = Auteur::create([
            'nom' => $request->nom,
            'nom_interne' => Str::slug($request->nom, '_'),
            'image' => $request->image,
        ]);

        if ($auteur) {
            return response()->json([
                'error' => false,
                'message' => 'L\'auteur a été créé avec succès',
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
        $auteur = Auteur::find($id);

        if ($auteur) {
            return response()->json(compact('auteur'));
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
            'nom' => 'required|string|max:200',
            'image' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->messages()
            ]);
        }

        $auteur = Auteur::find($id);

        if ($auteur) {
            $auteur->update($request->all());
            return response()->json([
                'error' => false,
                'message' => 'L\'auteur a été modifiée avec succès',
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
        $auteur = Auteur::find($id);

        if ($auteur) {
            if ($auteur->livres()->exists()) {
                return response([
                    'error' => true,
                    'message' => "Un ou pSlusieurs livres sont reliées à cette auteur. Vous ne pouvez pas le supprimer."
                ]);
            }

            $auteur->delete();

            return response()->json([
                'error' => false,
                'message' => 'L\'auteur a été supprimer',
            ]);
        }

        return response()->json($this->error);
    }
}
