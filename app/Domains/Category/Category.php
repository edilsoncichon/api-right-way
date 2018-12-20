<?php

namespace App\Domains\Category;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Domains\Category
 * @property int $id
 * @property string $name
 * @property string $name_slug
 * @property string $description
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 */
class Category extends Model
{
    protected $fillable = [
        'name', 'name_slug', 'description'
    ];
}
