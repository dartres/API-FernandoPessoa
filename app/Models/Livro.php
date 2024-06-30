<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'id_autor', 'tipo', 'idioma', 'lancamento', 'link'];

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'id_autor', 'id');
    }
}
