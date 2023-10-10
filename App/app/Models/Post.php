<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // setiap pemanggilan category dan author maka ini akan terbawa juga
    protected $with = ['category', 'author'];

      // searching [spesific]
      public function scopeFilter($query, array $filters)
      {
            $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like' , '%' . $search . '%')
                          ->orWhere('body', 'like' , '%' . $search . '%');
        });

        

            $query->when($filters['category'] ?? false, function($query, $category)
            {
                // join table 
                return $query->whereHas('category', function($query) use ($category )
                {
                    $query->where('slug', $category);
                });
            });


            $query->when($filters['author'] ?? false, function($query, $author)
            {
                // join table 
                return $query->whereHas('author', function($query) use ($author )
                {
                    $query->where('username', $author);
                });
            });
      }

    // ini menghubungkan relasi dari category_id
    // satu post hanya punya satu category [belongsto]
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    // ini menghubungkan relasi dari category_id
    // satu post hanya punya satu user [belongsto]
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

