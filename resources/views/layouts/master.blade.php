<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>

    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/app.css">
    @yield("styles")
</head>
<body>
@include("partials.header")
<div class="container-fluid">
  @if(isset($message))
    <div class="alert alert-{{$messageStatus}}" role="alert">
      {{$message}}
    </div>
  @endif
  
  @yield("content")
</div>



<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

@yield("scripts")
</body>
</html>