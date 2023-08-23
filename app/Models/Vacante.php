<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'salary_id',
        'category_id',
        'company',
        'deadline',
        'description',
        'image',
        'user_id'
    ];

    // Cast data to a specify format
    protected $casts = [
        'deadline' => 'datetime',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Salary()
    {
        return $this->belongsTo(Salary::class);
    }

    public function Applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function recruiter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

