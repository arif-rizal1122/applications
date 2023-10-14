<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // untuk menjalankan funsi tambah
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
        // halaman buat menampilkan halaman ubah data 

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // halaman prosess ubah data 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // hapus postingan

    }
}
