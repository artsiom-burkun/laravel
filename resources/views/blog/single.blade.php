@extends('main')

@section ('title')
$post->title
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class="lead">{{ $post->body }}</p>
            <p>{{ $post->category->name }}</p>
        </div>
    </div>
@endsection