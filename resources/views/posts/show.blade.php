@extends('main')

@section ('title', 'Просмотреть запись')

@section('content')

    <h1>{{ $post->title }}</h1>

<p class="lead">{{ $post->body }}</p>
@endsection