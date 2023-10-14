



@extends('dashboard.layouts.main')



  {{-- @dd($post); --}}

@section('containerPosts')
 
<div class="container">

  <div class="row my-3">
    <div class="col-lg-8">
      <h1 class="mb-3">{{ $post->title }}</h1>

     <div>
      <a href="" class="btn btn-info"><i class="bi bi-arrow-clockwise"></i></a>     
      <a href="" class="btn btn-warning"><i class="bi bi-brush-fill"></i></a>        
       <a href="" class="btn btn-danger"><i class="bi bi-arrow-clockwise"></i></a>     
      </div> 

      <img src="https://picsum.photos/500/500?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
      </div>
      <article class="my-3 fs-4">
        {!! $post->body !!}
      </article>
    </div>
  </div>
    
@endsection

