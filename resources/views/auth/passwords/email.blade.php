@extends('main')

@section('title')
    Восстановить забытый пароль
@endsection

@section('stylesheet')
    {!! Html::style('/css/parsley.css') !!}
@endsection


@section('scripts')
    <script src="/js/parsley.min.js"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Восстановить пароль</h3>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            На почту отправлено письмо со ссылкой на восстановление пароля
                        </div>
                    @endif
                    {!! Form::open(['data-parsley-validate', 'method' => 'POST', 'url' => 'password/email']) !!}

                    {{ Form::label('email', 'Введите Email') }}
                    {{ Form::email('email', null, ['class' => 'form-control', 'required' => '']) }}

                    <br/>

                    {{ Form::submit('Восстановить пароль', array('class' => 'btn btn-primary')) }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @endsection