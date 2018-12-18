<?php

namespace App\Domains;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'name_slug', 'description'
    ];
}
