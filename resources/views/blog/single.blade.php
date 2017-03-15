@extends('main')

@section ('title')
{{ $post->title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>

            <hr>
            <div class="row">
            <div class="col-md-6">
                <span class="glyphicon glyphicon-folder-open"></span> &nbsp;<a href="#">{{ $post->category->name }}</a>
                &nbsp;&nbsp;<span class="glyphicon glyphicon-bookmark"></span>
                @foreach($post->tags as $tag)
                    <a href="#"><span class="label label-default">{{ $tag->name }}</span></a>
                @endforeach
            </div>
            <div class="col-md-6">
                <span class="glyphicon glyphicon-pencil"></span> <a href="#comments"> Комментарии ({{ count($post->comments) }})</a>
                &nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>
                {{ LocalizedCarbon::instance($post->created_at)->diffForHumans() }}
            </div>
            </div>
            <hr>


            <div class="content">{!! $post->body !!}</div>

            <hr>
            <h3>Комментарии ({{ count($post->comments) }})</h3>
            <div class="panel panel-default" name="comments" id="comments">
                <div class="panel-body">
                    @foreach($post->comments as $comment)
                        <div class="comment">
                            <p><span class="glyphicon glyphicon-user"></span>
                            <b>{{ $comment->name }}:</b>
                                <span class="small">
                                <span class="glyphicon glyphicon-time"></span>
                                    {{ LocalizedCarbon::instance($comment->created_at)->diffForHumans() }}</span>
                            </p>
                            <p><span class="glyphicon glyphicon-comment"></span> {{ $comment->comment }}</p>
                            <a href="/">Ответить</a>
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

        <div class="col-md-4">


            <!-- Latest Posts -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Последние записи:</h4>
                </div>
                <ul class="list-group">
                    @foreach($allposts as $posts)
                        <li class="list-group-item"><a href="{{ url('blog/'.$post->slug.'.html') }}">{{ $posts->title }}</a></li>
                    @endforeach

                </ul>
            </div>

            <!-- Categories -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Категории</h4>
                </div>
                <ul class="list-group">
                    @foreach($categories as $category)
                        <li class="list-group-item">
                            <span class="glyphicon glyphicon-folder-open"></span> &nbsp;
                            <a href="/"> {{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Recent Comments -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Последние комментари</h4>
                </div>
                <ul class="list-group">
                    @foreach($comments as $comment)
                        <li class="list-group-item">
                            <span class="glyphicon glyphicon-user"></span>
                            <strong><a class="black" href="/">{{ $comment->name }}:</a></strong>
                            <span class="small">
                                <span class="glyphicon glyphicon-time"></span>
                                {{ LocalizedCarbon::instance($comment->created_at)->diffForHumans() }}</span>
                            <br/>


                            <span class="glyphicon glyphicon-comment"></span>
                            <a class="black" href="/">
                            {!!  substr($comment->comment, 0, 100) !!} {{ strlen($comment->comment) > 100 ? "..." : "" }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>


        </div>





    </div>
@endsection