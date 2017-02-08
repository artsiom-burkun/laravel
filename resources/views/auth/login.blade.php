@extends('main')

@section('title', 'Войти в учетную запись')
@section('stylesheet')
    {!! Html::style('/css/parsley.css') !!}
@endsection


@section('scripts', '<script src="/js/parsley.min.js"></script>')


@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h1>Создать новую запись</h1>
        <hr>
        {!! Form::open(['route' => 'posts.store', 'data-parsley-validate']) !!}

        {{ Form::label('email', 'Ваш Email') }}
        {{ Form::email('email', null, ['class' => 'form-control', 'required' => '']) }}
        <br/>
        {{ Form::label('password', 'Введите пароль:') }}
        {{ Form::password('password', ['class' => 'form-control', 'required' => '']) }}
        <br/>
        {{ Form::checkbox('remember') }} {{ Form::label('remember', 'Запомнить?') }}
        <br/>
        {{ Form::submit('Войти', array('class' => 'btn btn-success', 'style' => 'margin-top: 20px;')) }}

        {!! Form::close() !!}


    </div>
@endsection