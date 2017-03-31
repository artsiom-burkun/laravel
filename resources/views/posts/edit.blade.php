@extends('main')

@section('title')
Редактировать запись
@endsection

@section('stylesheet')
    {!! Html::style('/css/parsley.css') !!}
    {!! Html::style('/css/select2.min.css') !!}
@endsection


@section('scripts')
    <script src="/js/parsley.min.js"></script>
    <script src="/js/select2.min.js"></script>
    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            content_css: '//www.tinymce.com/css/codepen.min.css'
        });
    </script>

    <script type="text/javascript">
        $(".multiple").select2();
        $(".multiple").select2().val({!!  json_encode(  $post->tags()->allRelatedIds()  )  !!}).trigger('change');
    </script>
@endsection

@section('content')

    <div class="row">

        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}



        <div class="col-md-8">
            {{ Form::label('title', 'Заголовок') }}
            {{ Form::text('title', null, ["class" => 'form-control']) }}
            <br/>
            {{ Form::label('slug', 'alias') }}
            {{ Form::text('slug', null, ["class" => 'form-control']) }}
            <br/>
            {{ Form::label('category_id', 'Категория:') }}
            {{ Form::select('category_id', $categories, null, ["class" => 'form-control']) }}
            <br/>
            {{ Form::label('tags', 'Теги:') }}
            {{ Form::select('tags[]', $tags, null, ["class" => 'multiple form-control', 'multiple' => 'multiple']) }}
            <br/><br/>
            {{ Form::label('body', 'Содержание статьи') }}
            {{ Form::textarea('body', null, ["class" => 'form-control']) }}

        </div>


        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Дата создания:</dt>
                    <dd>{{ date('F j, Y, H:i', strtotime($post->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Дата редактирования:</dt>
                    <dd>{{ date('F j, Y, H:i', strtotime($post->created_at)) }}</dd>
                </dl>
                <hr>

                <div class="row">

                    <div class="col-sm-6">
                        {{ Form::submit('Сохранить', ['class' => 'btn btn-success btn-block']) }}
                    </div>

                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.index', 'К списку статей', array($post->id), array('class' => 'btn btn-default btn-block')) !!}
                    </div>

                </div>

            </div>
        </div>


        {!! Form::close() !!}
    </div>

@endsection