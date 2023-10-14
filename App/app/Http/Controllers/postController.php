<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
// INI MENGHUBUNGKAN KE MODELS NYA
use App\Models\Post;

use App\Models\User;

class postController extends Controller 
{


    public function index()
    {

    /*1*/

    // query dan mengurutkan 
    //  $posts = Post::latest();
     
    //  if(request('search')) {
    //     // ini akan mencari keasamaan apapun yg ada di depan maupun apa yg ada di belakangnya..
    //     $posts->where('title', 'like' , '%' . request('search') . '%')
    //           ->orWhere('body', 'like' , '%' . request('search') . '%');

    //  }

     // method pencarian


    /*2*/


    // return view('posts', [
    //     "title" => "All Posts",
    //     "active" => "Posts",
    //     "posts" => Post::latest()->filter(request(['search']))->get()
    // ]);


    /*3*/
    $title = '';
    if(request('category'))
    {
        $category = Category::firstWhere('slug', request('category'));
        $title = ' In ' . $category->name; 
    }


    if(request('author'))
    {
        $author = User::firstWhere('username', request('author'));
        $title = ' by ' . $author->name ;
    }

    
    return view('posts', [
        "title" => "All Posts" . $title,
        "active" => "Posts",
        "posts" => Post::latest()->filter(request(['search' , 'category',
        // apapun query sebelumnya (di aktifkan pagination bawa jangan kereset) 
        'author']))->paginate(7)->withQueryString()      
    ]);


    // return view('posts', [
    //     "title" => "All Posts" . $title,
    //     "active" => "Posts",
    //     "posts" => Post::latest()->filter(request(['search' , 'category', 'author']))->get()
    // ]);


    }


    public function show(Post $post)
    {
        return view('post', [
            "title" => "single post",
            "active" => "Posts",

            //  "post" => $post = post ini adalah yg diambil dari models nya
            "post" => $post
        ]);
    }


    public function view()
    {
        return view('home', [
            "title" => "home",
            "active" => "Home"
        ]);
    }

    public function viewAbout()
    {
        return view('about', [
            "title" => "About",
            "active" => "About", 
            "name" => "arif rizal",
            "email" => "rizaol@gmail.com",
            "image" => "coba.jpg"
        ]);
    }
}