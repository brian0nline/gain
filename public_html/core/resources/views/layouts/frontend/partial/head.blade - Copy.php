<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<link rel="shortcut icon" href="{{ asset('asset/storage/Favicon-img.png') }}" />
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>
    @hasSection('title')
        @yield('title') |
    @endif {{ set('siteName') }}
</title>
<link rel="stylesheet" href="{{ asset('asset/vendor/wow/animate.min.css') }}" />
<link rel="stylesheet" href="{{ asset('asset/vendor/fontawesome/css/all.min.css') }}" />
<link rel="stylesheet" href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('asset/vendor/toastr/build/toastr.min.css') }}" />
<link rel="stylesheet" href="{{ asset('asset/css/custom.css?ver=1.0.2') }}" />

@stack('style')
@livewireStyles
@hasSection('checkbox')
    <link rel="stylesheet" href="{{ asset('asset/static/checkbox/bootstrap-toggle.min.css') }}">
@endif
<script src="{{ asset('asset/js/jquery.min.js') }}"></script>

