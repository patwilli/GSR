<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    public $timestamps = false;

    protected $fillable = [
        'codeProfil',
        'codeFonctionnalite',
    ];

    public function profil()
    {
        return $this->belongsTo(Profil::class);
    }

    public function fonctionnalite()
    {
        return $this->belongsTo(Fonctionnalite::class);
    }
}
