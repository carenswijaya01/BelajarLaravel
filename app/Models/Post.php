<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Boleh di isi, sisanya tidak
    // protected $fillable = [
    //     'title',
    //     'excerpt',
    //     'body',
    // ];

    //Tidak boleh di isi, sisanya boleh
    protected $guarded = ['id'];

    protected $with = ['category', 'user'];

    public function scopeFilter($query, array $filters)
    {
        //Null Coalescing Operator
        //From:  isset($filters['search']) ? $filters['search'] : false
        //To: $filters['search'] ?? false
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query
                ->whereHas('category', function ($query) use ($category) {
                    $query->where('slug', $category);
                });
        });

        $query->when($filters['author'] ?? false, function ($query, $author) {
            return $query
                ->whereHas('user', function ($query) use ($author) {
                    $query->where('username', $author);
                });
        });

        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query
        //         ->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
