@extends('main')

@section('title')
Создать новую запись
@endsection

@section('stylesheet')
    {!! Html::style('/css/parsley.css') !!}
    {!! Html::style('/css/select2.min.css') !!}

@endsection


@section('scripts')
    <script src="/js/parsley.min.js"></script>
    <script src="/js/select2.min.js"></script>
    <script src="/js/tinymce/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            height: 350,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            content_css: '/js/tinymce/themes/modern/theme.min.js'
        });
    </script>

    <script type="text/javascript">
        $(".multiple").select2();
    </script>
@endsection

@section('content')
       <div class="col-md-8 col-md-offset-2">
           <h1>Создать новую запись</h1>
               <hr>
           {!! Form::open(['route' => 'posts.store', 'data-parsley-validate', 'files' => true]) !!}
                {{ Form::label('title', 'Заголовок:') }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required' => '')) }}
<br/>
           {{ Form::label('slug', 'alias:') }}
           {{ Form::text('slug', null, ['class' => 'form-control']) }}
           <br/>

           {{ Form::label('category_id', 'Категория:') }}
           <select class="form-control" name='category_id'>
               @foreach($categories as $category)
               <option value="{{ $category->id }}" >{{ $category->name }}</option>
               @endforeach
           </select>
           <br/>


           {{ Form::label('tags', 'Тэги:') }}
           <select class="multiple form-control" name='tags[]' multiple="multiple">
               @foreach($tags as $tag)
                   <option value="{{ $tag->id }}"> {{ $tag->name }} </option>
               @endforeach
           </select>
           <br/>
           <br/>
           {{ Form::label('featured_image', 'Загрузите изображение:') }}
           {{ Form::file('featured_image') }}
           <br/>
           <br/>

           {{ Form::label('body', 'Введите статью:') }}
           {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}

           {{ Form::submit('Сделать запись', array('class' => 'btn btn-success btn-lg', 'style' => 'margin-top: 20px;')) }}

           {!! Form::close() !!}


       </div>
@endsection