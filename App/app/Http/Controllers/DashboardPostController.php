<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   
        // untuk menampilkan semua data post
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id' , auth()->user()->id)->get()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // untuk menampilkan tambah data
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */

    // request menangani semua data yg dikirimkan dari form nya 
    public function store(Request $request)
    {
        
        // untuk menjalankan funsi tambah
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required|',
            'image' => 'image|file|max:1400',
            'body' => 'required'
        ]);

        // cek jika gambar nya kosong
        if($request->file('image'))
        {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        // limit(strip_tags( = menghilangkan tags html
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body, 200));

        Post::create($validatedData);
        return redirect('dashboard/posts')->with('success', 'new post has been added');
    }

    /**
     * Display the specified resource.                                                                                                                                                                                                       
     */
    public function show(Post $post)
     {

     
        // fungsi untuk menampilkan detail dari crud nya
        return  view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // halaman buat menampilkan halaman ubah data / view 
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // halaman prosess ubah data / proses ubah data nya
        $rules =[
            'title' => 'required|max:255',
            'category_id' => 'required|',
            'image' => 'image|file|max:1400',
            'body' => 'required'
        ];


        // jika slug yg baru sama dengan slug yg lama gak usah divalidasi
        // jika request slug tidak sama dengan dengan 
        // ini cara mempertahankan nilai lama dari slug nya agar tidak perlu dirubah
        if($request->slug != $post->slug)
        {
           $rules['slug'] ='required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        // cek jika gambar nya kosong
         if($request->file('image'))
          {
             if($request->oldImage) {
                Storage::delete($request->oldImage);
             }
          $validatedData['image'] = $request->file('image')->store('post-images');
          } 
        

        $validatedData['user_id'] = auth()->user()->id;
        // limit(strip_tags( = menghilangkan tags html
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body, 200));

        Post::where('id', $post->id)
                ->update($validatedData)
        ;

        return redirect('dashboard/posts')->with('success', 'post has been update');

    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // hapus image di file
        if($post->image) {
            Storage::delete($post->image);
         }
        // hapus postingan / image di tabel

        Post::destroy($post->id);
        return redirect('dashboard/posts')->with('success', 'Post has been deleted!');

    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]); 
    }

}
