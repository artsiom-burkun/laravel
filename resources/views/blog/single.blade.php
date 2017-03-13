@extends('main')

@section ('title')
{{ $post->title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class="lead">{{ $post->body }}</p>
            <hr>
            <p><b>Опубликовано в</b>: {{ $post->category->name }}</p>

            <hr>
            <h3>Комментарии</h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    @foreach($post->comments as $comment)
                        <div class="comment">
                            <p>{{ $comment->name }}</p>
                            <p>{{ $comment->comment }}</p>
                        </div>
<hr>
                    @endforeach

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <form role="form" action="{{ route('comments.store', $post->id) }}" method="POST" data-parsley-validate="data-parsley-validate">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="name" id="name" name="name" class="form-control"  placeholder="Введите имя" required="">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required="" class="form-control"  placeholder="Введите email">
                        </div>

                        <div class="form-group">
                            <label for="comment">Комментарий</label>
                            <textarea id="comment" name="comment" class="form-control" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Оставить комментарий</button>
                    </form>
                </div>
            </div>

        </div>





    </div>
@endsection