<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Developer's Best Friend</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">@yield('body')</div>
  </div>
</div>
<script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>