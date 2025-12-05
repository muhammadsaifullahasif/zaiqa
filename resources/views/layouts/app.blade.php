<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zaiqa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    @stack('styles')
</head>
<body>
    
    @include("layouts.top-bar")

    {{-- MAIN SECTION START --}}
    <main class="main">
        @include("layouts.header")

        {{-- MAIN CONTENT START --}}
        <section class="main-content">
            @yield('content')
        </section>
        {{-- MAIN CONTENT END --}}
    </main>
    {{-- MAIN SECTION END --}}

    @include("layouts.footer")

    <script src="{{ asset('assets/js/plugins/jquery.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/d35f256856.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            
        });
    </script>
    @stack('scripts')
</body>
</html>