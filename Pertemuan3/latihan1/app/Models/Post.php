<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeFilter($query, array $filters): void
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) => 
            $query->where('title', 'like', '%' . $search . '%')
        );

        $query->when($filters['category'] ?? false, fn ($query, $category) =>
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            })
        );

        $query->when($filters['author'] ?? false, fn ($query, $author) =>
            $query->whereHas('author', function ($query) use ($author) {
                $query->where('username', $author);
            })
        );
    }
}
