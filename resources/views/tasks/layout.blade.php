@extends('layouts.app')
<html>
<head>
    <title>Tasks</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
@section('affichage')
<div class="container d-flex justify-content-center align-items-center"">
    @yield('content')
</div>
@endsection
</body>
</html>