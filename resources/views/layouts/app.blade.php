<!doctype html>
<html lang="ar">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @section('css')
    <link href="{{ asset('assets/signin.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/bootstrap.min.css') }}" rel="stylesheet">
    @endsection
    @include('layouts.head')
    <!-- Bootstrap core CSS -->

  </head>
  <body>

    @yield('content')

    @include('layouts.footer-scripts')

</body>

</html>
