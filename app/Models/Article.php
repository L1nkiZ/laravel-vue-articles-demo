<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $connection = 'LaravelVueDemo';
    protected $table = 'LaravelVueDemo.auteurs';
    protected $primaryKey = 'id';
    protected $fillable = ['titre', 'contenu', 'auteur_id', 'visible'];

    public function article()
    {
        return $this->belongsTo(Article::class, 'auteur_id');
    }
}
