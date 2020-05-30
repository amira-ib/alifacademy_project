<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{--library--}}
        <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/lib/fontawesome/css/font-awesome.min.css">

        {{--image icon--}}
        <link rel="shortcut icon" href="/images/alif_logo.png" type="image/png">
        <title>Alif Academy</title>

        <!-- Custom styles for this template -->
        <link href="/css/style.css" rel="stylesheet">
    </head>
    <body>
        @include('layouts.nav')
        <div class="container">
            @yield('content')
        </div>


        {{--@include('layouts.footer')--}}
        {{--library--}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="/lib/bootstrap/js/bootstrap.min.js"></script>

    </body>
</html>