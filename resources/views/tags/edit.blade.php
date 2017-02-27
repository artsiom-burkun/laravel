@extends('main')

@section('title')
    Редактировать тег
@endsection

@section('stylesheet')
    {!! Html::style('/css/parsley.css') !!}
@endsection
@section('scripts')
    <script src="/js/parsley.min.js"></script>
@endsection


@section('content')
    <div class="col-md-8">
        <h1>Теги</h1>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Название тега</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                </tr>
            </tbody>

        </table>


    </div>
    <div class="col-md-4">
        <div class="jumbotron" style="padding: 20px;">
            <h3>Изменить тэг</h3>
            {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT', 'data-parsley-validate']) !!}
            {{ Form::label('name', 'Название тега:') }}
            {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'data-parsley-length' => '[2, 50]')) }}
            <br/>
            {{ Form::submit('Сохранить изменения', array('class' => 'btn btn-warning')) }}
            {!! Html::linkRoute('tags.index', 'Назад', null, ['class' => 'btn btn-default']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection