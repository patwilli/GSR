<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $table = 'produits';

    public function remboursements()
    {
        return $this->hasMany(Remboursement::class);
    }
    public function credit()
    {
        return $this->hasMany(Credit::class);
    }
}
