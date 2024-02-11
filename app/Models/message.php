<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'codeAgent',
        'credit',
        'message',
        'expediteur',
        'profilExpediteur',
        'notifier',
        'vu',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'codeAgent');
    }
}
