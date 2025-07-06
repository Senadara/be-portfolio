<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'proficiency_level',
    ];

    protected $casts = [
        'proficiency_level' => 'integer',
    ];
}
