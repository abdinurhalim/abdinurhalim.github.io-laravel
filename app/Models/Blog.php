<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['keyword'] ?? false, fn ($query, $keyword) => $query->where('title', 'like', '%' . $keyword . '%')->orWhere('excerpt', 'like', '%' . $keyword . '%'));

        $query->when($filters['category'] ?? false, fn ($query, $category) => $query->whereHas('category', fn ($query) => $query->where('slug', $category)));

        $query->when($filters['author'] ?? false, fn ($query, $author) => $query->whereHas('author', fn ($query) => $query->where('username', $author)));
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
