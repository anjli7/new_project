<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <title>Panel</title>
</head>
<body>

  
    <div class="d-flex"> 
        {{-- Sidebar --}}
        @include('partials.adminsidebar')

        {{-- Main Content --}}
        <div class="main-content flex-grow-1">
            {{-- Top Navbar --}}
            @include('partials.adminheader')

            {{-- Page Content --}}
            <div class="content-wrapper p-4">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>
</body>
</html>