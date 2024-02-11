<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonctionnalite extends Model
{
    use HasFactory;
    protected $table = 'fonctionnalites';

    public function profils()
    {
        return $this->belongsToMany(Profil::class);
    }
}
