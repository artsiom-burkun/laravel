@extends('main')

@section('title')
    Блог на ларавел - Контакты
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Контакты</h1>
            <hr>
            <div class="panel panel-default">
                <div class="panel-body">
                        <form role="form">
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="name" class="form-control" id="name" placeholder="Введите имя">
                            <p class="help-block">Пример строки с подсказкой</p>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Введите email">
                            <p class="help-block">Пример строки с подсказкой</p>
                        </div>
                        <div class="form-group">
                            <label for="pass">Пароль</label>
                            <input type="password" class="form-control" id="pass" placeholder="Пароль">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox"> Ознакомился с правилами</label>
                        </div>
                        <button type="submit" class="btn btn-success">Войти</button>
                    </form>
                </div>
                </div>
        </div>
    </div>


@endsection