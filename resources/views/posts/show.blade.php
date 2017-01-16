@extends('main')

@section ('title', 'Просмотреть запись')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class="lead">{{ $post->body }}</p>
        </div>


    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <dt>Дата создания:</dt>
                <dd>{{ date('F j, Y, H:i', strtotime($post->created_at)) }}</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Дата редактирования:</dt>
                <dd>{{ date('F j, Y, H:i', strtotime($post->created_at)) }}</dd>
            </dl>
<hr>

            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('posts.edit', 'Редактировать', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                </div>

                <div class="col-sm-6">
                    {!! Html::linkRoute('posts.destroy', 'Удалить', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                </div>
            </div>

        </div>
    </div>
    </div>


@endsection