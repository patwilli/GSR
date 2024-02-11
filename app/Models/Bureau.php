<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bureau extends Model
{
    use HasFactory;
    protected $table = 'bureaus';

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class);
    }
    public function echeancier()
    {
        return $this->hasMany(Echeancier::class);
    }
    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

    public function remboursements()
    {
        return $this->hasMany(Remboursement::class);
    }
    public function credit()
    {
        return $this->hasMany(Credit::class);
    }
}
