@extends('main')

@section ('title')
Просмотреть все записи
@endsection

@section('content')
    <div class="row">

        <div class="col-md-9">
            <h1>Все записи</h1>
        </div>

        <div class="col-md-3">
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-success">
                 Создать новую запись
            </a>
        </div>
        <hr>
        <div class="col-md-12">
            <hr>
        </div>


    </div>


    <div class="row">

        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Заголовок</th>
                    <th>Содержание</th>
                    <th>Дата создания</th>
                    <th style="width: 35%">Действия</th>
                </thead>
                <tbody>
                     @foreach ($posts as $post)
                         <tr>
                             <th>{{ $post->id }}</th>
                             <td>{{ $post->title }}</td>
                             <td>{{ $post->body}}  {{ strlen($post->body) > 50 ? "..." : "" }}</td>
                             <td>{{ $post->created_at }}</td>
                             <td>
                                 {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

                                 {!! Html::linkRoute('posts.show', 'Просмотреть', array($post->id), array('class' => 'btn btn-default')) !!}
                                 {!! Html::linkRoute('posts.edit', 'Редактировать', array($post->id), array('class' => 'btn btn-warning')) !!}

                                 {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                                 {!! Form::close() !!}


                             </td>
                         </tr>
                     @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>

@endsection