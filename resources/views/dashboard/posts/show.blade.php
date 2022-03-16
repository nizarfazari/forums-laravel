@extends('dashboard.layouts.main')

@section('contain')
<div class="container">
    <div class="row mb-5 my-4">
        <div class="col-md-8">
            <h2 class="mb-3">{{ $posts->title }}</h2>
            @if ($posts->image)
            <div style="max-height:350px; overflow:hidden" >
                <img src="{{ asset('storage/'. $posts->image) }}" class="img-fluid mt-3">  
            </div>
            @else
            <img src="https://source.unsplash.com/1200x400/?{{ $posts->category->name }}" class="img-fluid mt-3">  
            @endif

            <article class="my-3 fs-4 pt-3">
                {!! $posts->body !!}
            </article>
            <a href="/dashboard/posts" class="btn btn-success">Back to my post</a> 
        </div>
    </div>
</div>
@endsection