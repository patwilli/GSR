<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    use HasFactory;
    protected $table = 'agences';

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function bureaus()
    {
        return $this->hasMany(Bureau::class);
    }
}
