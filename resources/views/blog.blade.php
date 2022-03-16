
@extends('layouts.main')

@section('contain')
<h1 class="mb-3 text-center" >{{ $title }}</h1>
<div class="row justify-content-center mb-4">
    <div class="col-md-6">
        <form action="/posts" method="GET">
            @if (request('category'))
            <input type="hidden"  name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
            <input type="hidden"  name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search...." name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
              </div>
        </form>
    </div>
</div>

@if ($post->count() > 0)
    <div class="card mb-3">
        @if ($post[0]->image)
        <div style="max-height:350px; overflow:hidden" >
            <img src="{{ asset('storage/'. $post[0]->image) }}" class="img-fluid mt-3">  
        </div>
        @else
        <img src="https://source.unsplash.com/1200x400/?{{ $post[0]->category->name }}" class="card-img-top" alt="...">
        @endif

        <div class="card-body text-center">
            <h5 class="card-title">{{ $post[0]->title }}</h5>
            <p class="card-text">
                <small class="text-muted">
                    by : <a href="/posts?author={{ $post[0]->author->username }}" class="text-decoration-none text-warning"> {{ $post[0]->author->name }} </a>  in <a href="/posts?category={{ $post[0]->category->slug }}" class="text-decoration-none">{{ $post[0]->category->name }}</a> {{ $post[0]->created_at->diffForHumans() }}
                </small>
            </p>
            <p class="card-text">{{ $post[0]->excerpt }}</p>
            <a href="/posts/{{ $post[0]->slug }} " class="text-decoration-none btn btn-primary">Read More..</a>
        </div>
    </div>
    

        <div class="container">
            <div class="row">
                @foreach ($post->skip(1) as $p)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute px-2 py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/posts?category={{ $p->category->slug }}" class="text-white text-decoration-none">{{ $p->category->name }}</a></div>
                            @if ($p->image)
                                <img src="{{ asset('storage/'. $p->image) }}" class="img-fluid mt-3">  
                            @else
                            <img src="https://source.unsplash.com/500x400?{{ $p->category->name }}" class="card-img-top" alt="...">
                            @endif
                            <div class="card-body">
                            <h5 class="card-title">{{ $p->title }}</h5>
                                <p class="card-text">
                                    <small class="text-muted">
                                        by : <a href="/posts?author={{ $p->author->username }}" class="text-decoration-none text-warning"> {{ $p->author->name }} </a>  in <a href="/posts?category={{ $p->category->slug }}" class="text-decoration-none">{{ $p->category->name }}</a> {{ $p->created_at->diffForHumans() }}
                                    </small>
                                </p>
                            <p class="card-text mb-3">{{ $p->excerpt }}</p>
                            <a href="/posts/{{ $p->slug }}" class="btn btn-primary">Read More..</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No post Found.</p>
    @endif
    
    {{ $post->links() }}
@endsection

