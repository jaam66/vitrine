<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') - {{ config('app.name') }} </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo_harpia.ico') }}" />

    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body>
    <header class="topo w-screen">
        @include('admin.partials/topo')
    </header>
    <main class="container mx-auto px-4">
        <div>
            @yield('barra')
        </div>
        <div class="form_topo">
            @yield('hdr')
        </div>
        <div>
            @yield('content')
        </div>
    </main>
    <footer class="rodape w-screen mt-5">
        @include('admin.partials/rodape')
    </footer>
</body>
</html>
