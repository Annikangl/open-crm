<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/materialize.min.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}"> --}}
</head>
<body>
    
<div id="app">
    <router-view></router-view>
</div>
    {{-- <script src="{{ asset('assets/js/materialize.min.js') }}"></script> --}}
   
    <script src="./js/app.js"></script>
</body>
</html>