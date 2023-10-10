{{-- @dd($post); --}}
@extends('layouts.main')

@section('container')
 
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                  <h1 class="mb-3">{{ $post->title }}</h1>
              

                    <p>By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>

                                        
                    <img src="https://picsum.photos/500/500?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
     {{-- ini menampilkan apapun yg ada di dlm nya walaupun dia html --}}
    <article class="my-3 fs-4">
                    {!! $post->body !!}
    </article>

                    <a href="/posts" class="d-block mt-3"> Back To blogs </a>
                                
                </div>
            </div>
        </div>
      

    
@endsection


