<?php
namespace App\Http\Controllers;



use Illuminate\Http\Request;
// INI MENGHUBUNGKAN KE MODELS NYA
use App\Models\Category;
use App\Models\User;

class CategoryController extends Controller {

    public function slugCategory(Category $category)
    {
        return view('posts', [
            'title' => " Post By Category : $category->name ",
            'active' => "Categories",
            'posts' => $category->posts->load('category', 'author'),
        ]);
    }

    public function handleCategories()
    {
        return view('categories', [
            'title' => 'Post Categories',
            'active' => "Categories",
            'categories' => Category::all()
        ]);
    }

    // public function author( User $author)
    // {
    //     return view('posts', [
    //        'title' => "Post By author : $author->name",
    //         // 'posts' => $author->posts->load('category', 'author') = lazy eager loading
    //         'active' => 'home',
    //        'posts' => $author->posts->load('category', 'author')

    //     ]);
    // }
    
}