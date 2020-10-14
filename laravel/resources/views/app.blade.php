<!DOCTYPE html>
<html lang="{{Session::get('lang')}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.png">

    <title>Oaxaca4Meetings Administrador</title>
    <!--  Fonts and icons     -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="{{ url('/') }}/css/material-dashboard.css" rel="stylesheet">




</head>

<body>

    <div id="app">
        <router-view></router-view>
    </div>


    <script src="{{ url('/') }}/js/app.js"></script>

</body>

</html>
