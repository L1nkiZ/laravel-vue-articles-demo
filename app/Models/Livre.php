<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'public.auteurs';
    protected $primaryKey = 'id';
    protected $fillable = ['titre', 'contenu', 'auteur_id', 'visible'];

    public function auteur()
    {
        return $this->belongsTo(Auteur::class, 'auteur_id');
    }
}
