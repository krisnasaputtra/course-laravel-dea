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
    <form class="search_post" action="/">
        <input type="text" name="search" placeholder="Search Posts . . ."
            value="{{ request('query') ?? request('search') }}" autofocus>
        <button type="submit" hidden></button>
    </form>
    <div class="wrapper-content">
        @foreach ($posts as $post)
            <div class="container-content">
                <h1 class="text-content">{{ $post->title }}</h1>
                <i class="text-content tags">{{ $post->tags }}</i>
                <p class="text-content">{{ $post->excerpt }}</p>
                <a class="text-content detail" href="/post/{{ $post->id }}">Detail</a>
            </div>
        @endforeach
    </div>
    {{-- {{ dd($posts->links()) }} --}}
    @php
    $link = $posts->links()->elements[0];
    $currentpage = $posts->currentpage();
    $lastpage = $posts->lastPage();
    @endphp
    @if (count($link) === 1)
        <div class="links-pagination">
            <div class="links-pagination current">

                <a href={{ $link[$currentpage] }}>{{ $currentpage }}</a>
            </div>
        </div>
    @else
        @if ($currentpage === 1)
            <div class="links-pagination">
                <div style="border-left: 1px solid rgba(0, 0, 0, 0.8)" class="links-pagination current">

                    <a href={{ $link[$currentpage] }}>{{ $currentpage }}</a>
                </div>
                <div class="links-pagination next">

                    <a href={{ $link[$currentpage + 1] }}> next </a>
                </div>
            </div>
        @elseif($currentpage === $lastpage)
            <div class="links-pagination">
                <div class="links-pagination prev">

                    <a href={{ $link[$currentpage - 1] }}> prev </a>
                </div>
                <div style="border-right: 1px solid rgba(0, 0, 0, 0.8)" class="links-pagination current">

                    <a href={{ $link[$currentpage] }}>{{ $currentpage }}</a>
                </div>
            </div>
        @else
            <div class="links-pagination">
                <div class="links-pagination prev">

                    <a href={{ $link[$currentpage - 1] }}> prev </a>
                </div>
                <div class="links-pagination current">

                    <a href={{ $link[$currentpage] }}>{{ $currentpage }}</a>
                </div>
                <div class="links-pagination next">

                    <a href={{ $link[$currentpage + 1] }}> next </a>
                </div>
            </div>
        @endif
    @endif
@endsection
