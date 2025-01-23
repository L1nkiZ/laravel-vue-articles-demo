<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'public.auteurs';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'nom_interne', 'image', 'created_at', 'updated_at'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
