<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasImage;

class Profile extends Model
{
    use HasFactory, HasImage;

    protected $fillable = [
        'name',
        'title',
        'bio',
        'email',
        'phone',
        'address',
        'photo',
    ];
}
