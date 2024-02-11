<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Echeancier extends Model
{
    use HasFactory;
    protected $table = 'echeanciers';
    public function credit()
    {
        return $this->belongsTo(Credit::class, 'codecredit');
    }
}
