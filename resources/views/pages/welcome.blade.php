@extends('main')

@section('title')
    Блог на ларавел
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h1>Про блог<br/> про ларавел<br/> на ларавел</h1>
            <p class="lead">Пару слов</p>
            <a href="#" class="btn btn-info">Кнопка 1</a>
            <a href="#" class="btn btn-danger">Кнопка 2</a>
            <a href="#" class="btn btn-default">Кнопка 3</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">

        <div class="post">
            <h3>Заголовок статьи</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a href="#" class="btn btn-info pull-right">Читать далее...</a>
            <br/><br/>
        </div>
        <hr>

        <div class="post">
            <h3>Заголовок статьи</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a href="#" class="btn btn-info pull-right">Читать далее...</a>
            <br/><br/>
        </div>
        <hr>

        <div class="post">
            <h3>Заголовок статьи</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a href="#" class="btn btn-info pull-right">Читать далее...</a>
            <br/><br/>
        </div>
        <hr>
    </div>

    <div class="col-md-3 col-md-offset-1">
        <h3>Дополнительный заголовок</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
</div>
@endsection

