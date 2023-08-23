<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cv',
        'vacante_id'
    ];

    public function user()
    {   
        return $this->belongsTo(User::class);
    }
}
