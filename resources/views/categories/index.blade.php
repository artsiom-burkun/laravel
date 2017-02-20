@extends('main')

@section('title')
    Категории
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
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a hre="/" class="btn btn-primary">Редактировать</a>
                    <a hre="/" class="btn btn-danger">Удалить</a>
                </td>
            </tr>
            @endforeach
            </tbody>

        </table>


    </div>
    <div class="col-md-4">
        <h3>Создать новую категорию</h3>
        {!! Form::open(['route' => 'categories.store', 'data-parsley-validate']) !!}
        {{ Form::label('name', 'Название категории:') }}
        {{ Form::text('name', null, array('class' => 'form-control', 'required' => '')) }}
        <br/>
        {{ Form::submit('Создать категорию', array('class' => 'btn btn-success')) }}
        {!! Form::close() !!}
    </div>
@endsection