@if (Session::has('success'))

    <div class="alert alert-success" role="alert">
        <b>Успех:</b> {{ Session::get('success') }}</div>

@endif

@if (count($errors) > 0 )

    <div class="alert alert-danger" role="alert">
        <b>Ошибки:</b>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
@endif
