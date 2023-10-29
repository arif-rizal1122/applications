



@extends('dashboard.layouts.main')



  {{-- @dd($post); --}}

@section('container')

 
<div class="container">
 
<h1 class="mb-3">{{ $post->title }}</h1>
    

  <div class="row my-3">
   <h2>{{ $post->category->name  }} </h2>

    <div class="col-lg-8">
    
     
     <div>
      {{-- fitur read --}}
      <a href="/dashboard/posts" class="btn btn-info"><i class="bi bi-arrow-clockwise"></i>Back to all posts</a> 
      {{-- fitur edit --}}
      <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i class="bi bi-brush-fill"></i>Edit</a>        
      {{-- fitur delete --}}
      <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="bi bi-backspace-fill"></i>Delete</button>
      </form> 

      </div> 

   
      @if ($post->image)
      <div style="max-height: 350px; overflow:hidden;">
      <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category }}" class="img-fluid mt-3">
      </div>
       @else    
      <img src="https://picsum.photos/500/500?{{ $post->category->name }}" alt="{{ $post->category }}" class="img-fluid mt-3">       
      @endif

   
      
      </div>
      <article class="my-3 fs-4">
        {!! $post->body !!}
     </article>

    </div>
  </div>
    
@endsection

