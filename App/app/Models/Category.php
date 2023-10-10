<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * The attributes that aren't mass assignable.
 *
 * @var array
 */

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    // ini menghubungkan relasi dari model post
    // satu category punya banyak post [hasMany]
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
