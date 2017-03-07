@extends('main')

@section('title')
    Тег: {{ $tag->name }}
@endsection


@section('content')
    <div class="col-md-8">
        <h1>Тег: {{ $tag->name }} <small> {{ $tag->posts()->count() }} записей </small></h1>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Заголовок</th>
                <th>Все теги</th>
                <th>Дествия</th>
            </tr>
            </thead>
            <tbody>
                @foreach($tag->posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>@foreach($post->tags as $postTag)
                                <span class="label label-default">{{ $postTag->name }}</span>
                            @endforeach</td>
                        <td>{!! Html::linkRoute('posts.show', 'Просмотреть запись', array($post->id), array('class' => 'btn btn-default btn-block')) !!}
                        </td>
                    </tr>
                @endforeach


            </tbody>

        </table>


    </div>
    <div class="col-md-4">
        <div class="well">
            <h3> Действия: </h3>

            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('tags.edit', 'Редактировать', array($tag->id), array('class' => 'btn btn-primary btn-block')) !!}
                </div>

                <div class="col-sm-6">

                    {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE' ]) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger btn-block']) !!}
                    {!! Form::close() !!}

                </div>
                <br/><br/><br/>

                <div class="row">
                    <div class="col-sm-11">
                        {!! Html::linkRoute('tags.index', 'К списку тегов', [],['class' => 'btn btn-default btn-block btn-h1-spacing', 'style' => 'margin-left: 15px']) !!}
                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection