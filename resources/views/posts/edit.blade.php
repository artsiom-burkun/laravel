@extends('main')

@section('title', 'Редактировать запись')
@section('stylesheet')
    {!! Html::style('/css/parsley.css') !!}
@endsection

@section('content')

    <div class="row">
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}



        <div class="col-md-8">
            {{ Form::label('title', 'Заголовок') }}
            {{ Form::text('title', null, ["class" => 'form-control']) }}
               <br/>
            {{ Form::label('body', 'Содержание статьи') }}
            {{ Form::textarea('body', null, ["class" => 'form-control']) }}

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
                        {{ Form::submit('Сохранить', ['class' => 'btn btn-success btn-block']) }}
                    </div>

                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Назад', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                    </div>

                </div>

            </div>
        </div>


        {!! Form::close() !!}
    </div>

@endsection