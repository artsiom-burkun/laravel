<!DOCTYPE html>
<html lang="en">
@include('partials._head')
<body>

@include('partials._nav')

<div class="container">
    {{ Auth::check() ? "Уже тут" : "Еще нет" }}
    {!! Form::open(['route' => 'logout', 'method' => 'POST']) !!}
    {{ Form::submit('Выйти', array('class' => 'btn btn-success', 'style' => 'margin-top: 20px;')) }}
    {!! Form::close() !!}

    @include('partials._messages')
    @yield('content')
</div>

<hr>

<footer class="footer">
    <div class="container">
        <p class="text-muted">2017 год</p>
    </div>
</footer>


@include('partials._footer')

</body>
</html>