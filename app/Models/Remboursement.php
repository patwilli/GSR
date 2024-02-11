<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remboursement extends Model
{
    use HasFactory;
    protected $table = 'remboursements';

    public function bureau()
    {
        return $this->belongsTo(Bureau::class);
    }

    public function credit()
    {
        return $this->hasOne(Credit::class);
    }
}
