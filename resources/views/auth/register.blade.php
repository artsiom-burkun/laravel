@extends('main')

@section('title', 'Зарегистрироваться')
@section('stylesheet')
    {!! Html::style('/css/parsley.css') !!}
@endsection


@section('scripts')
<script src="/js/parsley.min.js"></script>
@endsection

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h1>Регистрация</h1>
        <hr>
        {!! Form::open(['data-parsley-validate']) !!}

        {{ Form::label('name', 'Введите логин:') }}
        {{ Form::text('name', null, ['class' => 'form-control', 'required' => '', 'type' => 'email']) }}
        <br/>
        {{ Form::label('email', 'Введите Email') }}
        {{ Form::email('email', null, ['class' => 'form-control', 'required' => '']) }}
        <br/>
        {{ Form::label('password', 'Введите пароль:') }}
        {{ Form::password('password', ['class' => 'form-control', 'required' => '']) }}
        <br/>
        {{ Form::label('password_confirmation', 'Введите пароль еще раз:') }}
        {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => '']) }}
        <br/>

        {{ Form::submit('Зарегистрироваться', array('class' => 'btn btn-success', 'style' => 'margin-top: 20px;')) }}

        {!! Form::close() !!}


    </div>
@endsection