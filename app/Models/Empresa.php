<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nome',
        'cnpj',
        'icms_pago',
        'creditos_possiveis',
        'resultado',
    ];
}
