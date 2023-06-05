<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'cattegory_name_en',
        'cattegory_name_fr',
        'cattegory_slug_en',
        'cattegory_slug_fr',
        'cattegory_icon',
    ];
}
