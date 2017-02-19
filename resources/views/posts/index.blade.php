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
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary">
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
                    <th>Дата редактирования</th>
                </thead>
                <tbody>
                     @foreach ($posts as $post)
                         <tr>
                             <th>{{ $post->id }}</th>
                             <td>{{ $post->title }}</td>
                             <td>{{ $post->body}}  {{ strlen($post->body) > 50 ? "..." : "" }}</td>
                             <td>{{ $post->created_at }}</td>
                             <td>{!! Html::linkRoute('posts.show', 'Просмотреть', array($post->id), array('class' => 'btn btn-default btn-block btn-sm')) !!}
                                 {!! Html::linkRoute('posts.edit', 'Редактировать', array($post->id), array('class' => 'btn btn-primary btn-block btn-sm')) !!}
                             </td>
                         </tr>
                     @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $posts->links(); !!}
            </div>
        </div>
    </div>

@endsection