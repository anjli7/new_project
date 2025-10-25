<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/user.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>User</title>
</head>
<body>

    @include('partials.header')

    <div class=" flex-column min-vh-100">
  
        <div class="flex-grow-1 d-flex">
            @include('partials.usersidebar')

            <main class=" flex-grow-1 p-4">
                @yield('content')
            </main>
        </div>
    </div>

    @include('partials.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/user.js') }}"></script>
</body>
</html>                                                             