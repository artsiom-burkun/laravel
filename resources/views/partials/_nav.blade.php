<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Laravel.dev</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Главная</a></li>
                <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="/blog">Блог</a></li>
                <li class="{{ Request::is('about.html') ? "active" : "" }}"><a href="/about.html">О компании</a></li>
                <li class="{{ Request::is('kontakty.html') ? "active" : "" }}"><a href="/kontakty.html">Контакты</a></li>
            </ul>
            @if (Auth::check())
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Привет, {{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/posts">Мои записи</a></li>
                        <li><a href="/posts/create">Создать новую запись</a></li>
                        <li><a href="{{ route('categories.index') }}">Категории</a></li>
                        <li><a href="{{ route('tags.index') }}">Теги</a></li>
                        <li><a href="#">Редактировать профиль</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            {!! Form::open(['route' => 'logout', 'method' => 'POST']) !!}
                            {{ Form::submit('Выйти', ['class' => 'btn btn-link', 'style' => 'padding-left: 20px;']) }}
                            {!! Form::close() !!}
                        </li>
                    </ul>
                </li>
            </ul>
            @else
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Войти / Регистрация<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                            {!! Form::open(['route' => 'login', 'data-parsley-validate', 'style' => 'padding: 20px 5px 5px 20px; min-width: 250px;']) !!}

                            {{ Form::label('email', 'Ваш Email') }}
                            {{ Form::email('email', null, ['class' => 'form-control', 'required' => '']) }}
                            <br/>
                            {{ Form::label('password', 'Введите пароль:') }}
                            {{ Form::password('password', ['class' => 'form-control', 'required' => '']) }}
                            
                            {{ Form::checkbox('remember') }} {{ Form::label('remember', 'Запомнить?') }}
                            <br/>
                            {{ Form::submit('Войти', array('class' => 'btn btn-success', 'style' => 'margin-top: 20px;')) }}

                            {!! Form::close() !!}

                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/password/reset">Забыли пароль?</a></li>
                            <li><a href="/register">Зарегистрироваться</a></li>
                        </ul>
                    </li>
                </ul>

            @endif
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>