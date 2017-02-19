@extends('main')

@section ('title')
Блог
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Блог</h1>
            <p class="lead"></p>
        </div>
    </div>

    @foreach($posts as $post)
    <div class="row">
        <div class="col-md-8">
            <h2>{{ $post->title }}</h2>
            <h5>Опубликовано:  {{ $post->created_at->diffForHumans() }}</h5>
            <p>{{ substr($post->body, 0 , 250) }} {{ strlen($post->body) > 250 ? '...' : "" }}</p>
            <a class="btn bg-primary" href="{{ url('blog/'.$post->slug) }}">Читать далее</a>
            <hr>
        </div>
    </div>
    @endforeach

    <div class="text-center">
        {!! $posts->links(); !!}
    </div>
@endsection