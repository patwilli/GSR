<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class relance extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeCredit',
        'dateRelance',
        'dateEcheance',
        'info',
        'statut',
    ];
}
