<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    use HasFactory;

    protected $table = 'imagens';

    protected $fillable = [
        'nome', 'path'
    ];

    public function Livros(){
        return $this->hasMany(Livro::class, 'id_imagem', 'id');
    }
}
