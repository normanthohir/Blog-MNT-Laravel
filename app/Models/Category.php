<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = ['id'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
  
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
   
}
