<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'preco'];

    public function getPrecoAtribute()
    {
        return $this->attributes['preco'] / 100;
    }

    public function setPrecoAtribute($attr)
    {
        return $this->attributes['preco'] = $attr * 100;
    }


    public function loja()
    {
        return $this->belongsTo(Loja::class);
    }
}