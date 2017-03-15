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
            <div class="row">
                <div class="col-md-6">
                    <span class="glyphicon glyphicon-folder-open"></span> &nbsp;<a href="#">{{ $post->category->name }}</a>
                    &nbsp;&nbsp;<span class="glyphicon glyphicon-bookmark"></span>
                    @foreach($post->tags as $tag)
                        <a href="#"><span class="label label-default">{{ $tag->name }}</span></a>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <span class="glyphicon glyphicon-pencil"></span> <a href="{{ url('blog/'.$post->slug.'.html') }}#comments"> Комментарии ({{ count($post->comments) }})</a>
                    &nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>
                    {{ LocalizedCarbon::instance($post->created_at)->diffForHumans() }}
                </div>
            </div>
            <br/>
            <div class="content">{!!  substr($post->body, 0 , 250) !!} {{ strlen($post->body) > 250 ? '...' : "" }}</div>
            <br/>
            <a class="btn bg-primary pull-right" href="{{ url('blog/'.$post->slug.'.html') }}">Читать далее</a>
            <br/><br/>
            <hr>
            <br/>
        </div>
    </div>
    @endforeach

    <div class="text-center">
        {!! $posts->links(); !!}
    </div>
@endsection