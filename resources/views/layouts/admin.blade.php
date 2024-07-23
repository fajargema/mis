<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') &mdash; Pusat Karir</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/fe/img/favicon/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/fe/img/favicon/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/fe/img/favicon/favicon-32x32.png') }}">
    <link rel="manifest" href="{{ asset('assets/fe/img/favicon/site.webmanifest') }}">

    @stack('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/iconly.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <script src="{{ asset('assets/admin/static/js/initTheme.js') }}"></script>

    <div id="app">
        @include('components.admin.sidebar')
        <div id="main" class='layout-navbar navbar-fixed'>
            @include('components.admin.navbar')
            <div id="main-content">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">There's something wrong!</h4>
                    <hr>
                    <p>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @yield('content')

            </div>
            @include('components.admin.footer')
        </div>
    </div>

    <script src="{{ asset('assets/admin/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/admin/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <script src="{{ asset('assets/admin/compiled/js/app.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>

    <script src="{{ asset('assets/admin/extensions/jquery/jquery.min.js') }}"></script>

    <script>
        //sweetalert for success or error message
        @if(session()->has('success'))
            swal({
                type: "success",
                icon: "success",
                title: "BERHASIL!",
                text: "{{ session('success') }}",
                timer: 5000,
                showConfirmButton: false,
                showCancelButton: false,
                buttons: false,
            });
            @elseif(session()->has('error'))
            swal({
                type: "error",
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                timer: 5000,
                showConfirmButton: false,
                showCancelButton: false,
                buttons: false,
            });
            @elseif(session()->has('info'))
            swal({
                type: "info",
                icon: "info",
                title: "INFO!",
                text: "{{ session('info') }}",
                timer: 5000,
                showConfirmButton: false,
                showCancelButton: false,
                buttons: false,
            });
            @endif
    </script>

    @stack('script')

</body>

</html>
