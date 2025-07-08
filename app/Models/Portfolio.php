<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasImage;

class Portfolio extends Model
{
    use HasFactory, HasImage;

    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
    ];
}
