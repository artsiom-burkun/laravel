@extends('main')

@section('title')
    Блог на ларавел - Главная
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h1>Про блог<br/> про ларавел<br/> на ларавел</h1>
            <p class="lead">Пару слов</p>
            <a href="#" class="btn btn-info">Кнопка 1</a>
            <a href="#" class="btn btn-danger">Кнопка 2</a>
            <a href="#" class="btn btn-default">Кнопка 3</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">

@foreach($posts as $post)
        <div class="post">
            <h3>{{ $post->title }}</h3>
            <p>{!!  substr($post->body, 0, 300) !!} {{ strlen($post->body) > 300 ? "..." : "" }}</p>
            <a href="{{ url('blog/'.$post->slug.'.html') }}" class="btn btn-info pull-right">Читать далее...</a>
            <br/><br/>
        </div>
        <hr>

@endforeach

    </div>

    <div class="col-md-3 col-md-offset-1">
        <h3>Дополнительный заголовок</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
</div>
@endsection

