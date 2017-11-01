<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Baranoa') }}</title>
    <link href="{!! url('css/app.css') !!}" rel="stylesheet">
</head>

<body class="bg-dark">

<div class="container-fluid">
    @yield('content')
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<!-- Bootstrap core JavaScript-->
<script src="{!! url('js/app.js') !!}"></script>
</div>
</body>

</html>
