<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $table = 'profils';

    public function utilisateurs()
    {
        return $this->hasOne(Utilisateur::class);
    }

    public function fonctionnalites()
    {
        return $this->belongsToMany(Fonctionnalite::class);
    }
}
