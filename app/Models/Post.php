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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
