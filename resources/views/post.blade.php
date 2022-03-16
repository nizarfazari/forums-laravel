@extends('layouts.main')

@section('contain')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="mb-3">{{ $post->title }}</h2>
            by : <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none text-warning"> {{
                $post->author->name }} </a> in <a href="/posts?category={{ $post->category->slug }}"
                class="text-decoration-none">{{ $post->category->name }}</a>
            @if ($post->image)
            <img src="{{ asset('storage/'. $post->image) }}" class="img-fluid mt-3">
            @else
            <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" class="img-fluid mt-3">
            @endif

            <article class="my-3 fs-4">
                {!! $post->body !!}
            </article>
            <a href="/posts" class="d-block text-decoration-none">Back to blog</a>
        </div>
    </div>
</div>

@endsection