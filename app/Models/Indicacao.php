<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicacao extends Model
{
    use HasFactory;
    
    protected $table = 'indicacoes';

    protected $fillable = [
        'nome', 'cpf', 'telefone', 'email'
    ];

    public function status()
    {
        
    }

}
