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
                    {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}

                    {!! Html::linkRoute('categories.edit', 'Редактировать', [$category->id], ['class' => 'btn btn-primary']) !!}
                    
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            </tbody>

        </table>


    </div>
    <div class="col-md-4">
        <div class="jumbotron" style="padding: 20px;">
        <h3>Создать новую категорию</h3>
        {!! Form::open(['route' => 'categories.store', 'data-parsley-validate']) !!}
        {{ Form::label('name', 'Название категории:') }}
        {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'data-parsley-length' => '[2, 50]')) }}
        <br/>
        {{ Form::submit('Создать категорию', array('class' => 'btn btn-success')) }}
        {!! Form::close() !!}
    </div>
    </div>
@endsection