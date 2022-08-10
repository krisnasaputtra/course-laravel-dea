@extends('Layout.isGuest')

@section('content')
    <div class="wrapper-container-form-auth">
        <div class="container-form-auth">
            <h3>Login Page</h3>
            @if ($errors->any())
                <div class="message-error">
                    <h4>Data belum benar/lengkap</h4>
                    @foreach ($errors->all() as $message)
                        <span class="message-text-error"><span data-feather="chevron-right"></span>{{ $message }}</span>
                    @endforeach
                </div>
            @endif
            <form class="form-action" action="{{ route('login_action') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="email" required value="{{ old('email') }}">
                <input type="password" name="password" placeholder="password" required value="{{ old('password') }}">
                <button type="submit">Sign-In</button>
            </form>
        </div>
    </div>
@endsection
