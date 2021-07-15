<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Blog MarvelDc</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
  <div class="container">
  	<h2>MarvelDc</h2>
    @yield('content')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>