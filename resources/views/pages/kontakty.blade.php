@extends('main')

@section('title')
    Блог на ларавел - Контакты
@endsection

@section('stylesheet')
    {!! Html::style('/css/parsley.css') !!}
@endsection


@section('scripts')
    <script src="/js/parsley.min.js"></script>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Контакты</h1>
            <hr>
            <div class="panel panel-default">
                <div class="panel-body">
                        <form role="form" action="{{ url('kontakty.html') }}" method="POST" data-parsley-validate="data-parsley-validate">
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
                            <label for="message">Сообщение</label>
                            <textarea id="message" name="message" class="form-control" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Отправить сообщение</button>
                    </form>
                </div>
                </div>
        </div>
    </div>


@endsection