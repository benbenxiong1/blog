<!doctype html>
<html lang="zh-CN">
<head>
    <title>@yield('title')</title>
    <!-- 必须的 meta 标签 -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap 的 CSS 文件 -->
    <link rel="stylesheet" href="{{ url('/static/bootstrap/css/bootstrap.min.css') }}">

    <script src="{{ url('/static/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ url('/static/bootstrap/js/bootstrap.min.js') }}" ></script>
    <script src="{{ url('/static/layer/layer.js') }}" ></script>

</head>
<body>
@section('body')

@show
</body>
</html>