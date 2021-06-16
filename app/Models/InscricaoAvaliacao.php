<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class InscricaoAvaliacao extends Pivot
{
    use HasFactory;

    public $incrementing = true;

    protected $fillable = [
        'avaliacao_id',
        'grupo_id',
        'nota'
    ];
}
