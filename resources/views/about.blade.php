@auth
    @php
    $layout = 'Layout.isUser';
    @endphp
@else
    @php
    $layout = 'Layout.isGuest';
    @endphp
@endauth

@extends($layout)

@section('content')
    <div class="container-about">
        <div class="text-about">
            <h1>Hi bro, Saya {{ $name }}, </h1>
            <p>{{ $description }}</p>
        </div>
        <div class="avatar-about">
            <img src="/img/avatar.png" alt="{{ $name }}" width="400">
        </div>
    </div>
@endsection
