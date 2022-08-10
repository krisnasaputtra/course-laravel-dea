<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500&family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" type="image/svg" sizes="32x32" href="/img/favicon/favicon-32x32.svg">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>

<body>
    @include('toatsr')

    <div class="container">
        <header>
            @include('partials.navbar')
        </header>
        {{-- Start Our Content --}}
        <main>
            <div>
                @yield('content')
            </div>
        </main>
        {{-- End Our Content --}}
        <footer class="footer">Course Laravel | Create by Krisna Saputra 😎</footer>
    </div>
    <script>
        feather.replace()
    </script>
    <script>
        document.addEventListener('trix-file-accept', (e) => {
            e.preventDefault()
        })
    </script>
    <script src="/js/jquery.min.js"></script>
</body>

</html>
