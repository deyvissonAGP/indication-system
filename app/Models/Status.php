<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    
    protected $table = 'status';
    protected $primaryKey  = 'id';

    protected $fillable = [
        'descricao'
    ];
    
    const INICIADA    = 1;
    const EM_PROCESSO = 2;
    const FINALIZADA  = 3;
}
