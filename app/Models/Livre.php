<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'public.livres';
    protected $primaryKey = 'id';
    protected $fillable = ['titre', 'nom_interne', 'contenu', 'auteur_id', 'image', 'visible'];

    public function auteur()
    {
        return $this->belongsTo(Auteur::class, 'auteur_id');
    }
}
