@extends('main')

@section ('title')
Просмотреть запись
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class="lead">{{ $post->body }}</p>
            <hr>
            @foreach($post->tags as $tag)
                <span class="label label-default">{{ $tag->name }}</span>
            @endforeach
        </div>


    <div class="col-md-4">
        <div class="well">

            <p><b>Дата создания:</b></p>
            <p>{{ date('F j, Y, H:i', strtotime($post->created_at)) }}</p>
            <hr>

            <p><b>Опубликовано в:</b></p>
            <p>{{ $post->category->name }}</p>
            <hr>

            <p><b>Ссылка:</b></p>
            <p><a href="{{ url('blog/'.$post->slug) }}">{{ url('blog/'.$post->slug) }}</a></p>
            <hr>

            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('posts.edit', 'Редактировать', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                </div>

                <div class="col-sm-6">

                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE' ]) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger btn-block']) !!}
                    {!! Form::close() !!}

                </div>
                <br/><br/><br/>

                <div class="row">
                    <div class="col-sm-11">
                        {!! Html::linkRoute('posts.index', 'К списку статей', [],['class' => 'btn btn-default btn-block btn-h1-spacing', 'style' => 'margin-left: 15px']) !!}
                    </div>
                </div>


            </div>

        </div>
    </div>
    </div>


@endsection