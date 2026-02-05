<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    protected static function booted()
    {
        // Если слаг передали, то его берём, в противном случае, делаем из названия категории
        static::creating(function ($category) {

            $category->slug = Str::slug($category->slug ?? $category->name);

        });

        static::updating(function ($category) {

            if ($category->isDirty('name') && !$category->isDirty('slug')) {
                $category->slug = Str::slug($category->name);
            }

        });
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
