<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@yield("title")</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="responsive web">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/master.css')}}">
    @yield("link")
</head>
<body>
    <div class="side-nav">
        <div class="list-group">
            <a class="list-group-item list-group-item-action" href="{{route('admin.artis')}}">Artis</a>
            <a class="list-group-item list-group-item-action" href="{{route('admin.logout')}}">Logout</a>
        </div>
    </div>
    <div id="main">
        @yield("content")
    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    @yield("script")
</body>
</html>
