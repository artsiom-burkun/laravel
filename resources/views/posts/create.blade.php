@extends('main')

@section('title', 'Создать новую запись')

@section('content')
       <div class="col-md-8 col-md-offset-2">
           <h1>Создать новую запись</h1>
               <hr>
           {!! Form::open(['route' => 'posts.store']) !!}
                {{ Form::label('title', 'Заголовок:') }}
                {{ Form::text('title', null, array('class' => 'form-control')) }}
<br/>
           {{ Form::label('body', 'Введите статью:') }}
           {{ Form::textarea('body', null, array('class' => 'form-control')) }}

           {{ Form::submit('Сделать запись', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}

           {!! Form::close() !!}


       </div>
@endsection