@extends('main')

@section('title')
    Теги
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
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td>
                    {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}

                    {!! Html::linkRoute('tags.edit', 'Редактировать', [$tag->id], ['class' => 'btn btn-primary']) !!}

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
        <h3>Создать новый тег</h3>
        {!! Form::open(['route' => 'tags.store', 'data-parsley-validate']) !!}
        {{ Form::label('name', 'Название тега:') }}
        {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'data-parsley-length' => '[2, 50]')) }}
        <br/>
        {{ Form::submit('Создать тег', array('class' => 'btn btn-success')) }}
        {!! Form::close() !!}
    </div>
    </div>
@endsection