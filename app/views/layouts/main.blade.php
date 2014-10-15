<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Developer's Best Friend</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/application.css') }}" />
</head>
<body>
<div class="container">
  <div class='top-spacer'></div>
  @yield('body')
</div>
@section('javascripts')
  <script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
@show
</body>
</html>