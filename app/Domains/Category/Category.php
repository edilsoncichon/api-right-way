<?php

namespace App\Domains\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'name_slug', 'description'
    ];
}
