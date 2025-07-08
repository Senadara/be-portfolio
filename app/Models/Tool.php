<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasImage;

class Tool extends Model
{
    use HasFactory, HasImage;

    protected $fillable = [
        'name',
        'icon',
        'description',
        'category',
        'proficiency_level',
    ];

    protected $casts = [
        'proficiency_level' => 'integer',
    ];
}
