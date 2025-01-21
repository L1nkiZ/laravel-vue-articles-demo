<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    use HasFactory;

    protected $connection = 'laravel-vue-articles-demo';
    protected $table = 'laravel-vue-articles-demo.auteurs';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'nom_interne'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
