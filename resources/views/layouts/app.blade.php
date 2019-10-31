<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#F7D90B" />
    <title>GOTAS : Transportaion Application Service</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}" defer></script>


    <!-- // ... // -->

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
    </script>

    <!-- This makes the current user's id available in javascript -->
    @if(!auth()->guest())
    <script>
        window.Laravel.userId = <?php echo auth()->user()->id; ?>
    </script>
    @endif





    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @stack('scripts')
</head>

<body class=" h-full bg-grey-dark font-sans leading-normal tracking-normal">
    <div id="app">
        @yield('nav')



        @yield('content')

        @yield('footer')
    </div>
</body>

</html>
