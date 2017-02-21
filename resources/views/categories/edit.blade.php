@extends('main')

@section('title')
    Редактировать категорию
@endsection

@section('stylesheet')
    {!! Html::style('/css/parsley.css') !!}
@endsection
@section('scripts')
    <script src="/js/parsley.min.js"></script>
@endsection


@section('content')
    <div class="col-md-8">
        <h1>Категории</h1>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Полное название категории</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                </tr>
            </tbody>

        </table>


    </div>
    <div class="col-md-4">
        <div class="jumbotron" style="padding: 20px;">
            <h3>Изменить название категории</h3>
            {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT', 'data-parsley-validate']) !!}
            {{ Form::label('name', 'Название категории:') }}
            {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'data-parsley-length' => '[2, 50]')) }}
            <br/>
            {{ Form::submit('Сохранить изменения', array('class' => 'btn btn-warning')) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection