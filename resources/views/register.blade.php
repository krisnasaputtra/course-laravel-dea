@extends('Layout.isGuest')

@section('content')
    <div class="wrapper-container-form-auth">
        <div class="container-form-auth">
            <h3>Register Page</h3>
            @if ($errors->any())
                <div class="message-error">
                    <h4>Data belum benar/lengkap</h4>
                    <div class="wrap-text-error">
                        @foreach ($errors->all() as $message)
                            <span class="message-text-error"><span
                                    data-feather="chevron-right"></span>{{ $message }}</span>
                        @endforeach
                    </div>
                </div>
            @endif
            <form class="form-action" action="{{ route('register_action') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="name" required value="{{ old('name') }}">
                <input type="email" name="email" placeholder="email" required value="{{ old('email') }}">
                <input type="password" name="password" placeholder="password" required value="{{ old('password') }}">
                <button type="submit">Sign-Up</button>
            </form>
        </div>
    </div>
@endsection
