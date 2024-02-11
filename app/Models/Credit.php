<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;
    protected $table = 'credits';

    public function echeancier()
    {
        return $this->hasMany(Echeancier::class);
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'codeProduit');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'identifiantClient');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'codeAgent');
    }
    public function bureau()
    {
        return $this->belongsTo(Bureau::class, 'codeBureau');
    }
    public function remboursement()
    {
        return $this->belongsTo(Remboursement::class);
    }
}
