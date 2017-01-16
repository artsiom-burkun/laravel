<!DOCTYPE html>
<html lang="en">
@include('partials._head')
<body>

@include('partials._nav')

<div class="container">
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