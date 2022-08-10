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
    <div class="container-detail-post">
        <h1 class="text-content">{{ $post->title }}</h1>
        <i class="text-content tags">{{ $post->tags }}</i>
        <p class="text-content">{!! $post->description !!}</p>
        <a style="margin-top: 10px" class="text-content detail" href="/">Kembali</a>
    </div>
@endsection
