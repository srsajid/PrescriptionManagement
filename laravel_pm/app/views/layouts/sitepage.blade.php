<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <meta name="author" content="Md Sajedur Rahman">
        <title>Prescription Management Application</title>
        <link href="{{SR::$baseUrl}}css/bootstrap.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,600,800' rel='stylesheet' type='text/css'>
        <link href="{{SR::$baseUrl}}css/font-awesome.min.css" rel="stylesheet">
        <link href="{{SR::$baseUrl}}css/style.css" rel="stylesheet">
        <link href="{{SR::$baseUrl}}css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="{{SR::$baseUrl}}css/validation/validationEngine.jquery.css" type="text/css"/>
        <link href="{{SR::$baseUrl}}css/alertify/alertify.core.css" rel="stylesheet" media="screen">
        <link href="{{SR::$baseUrl}}css/alertify/alertify.default.css" rel="stylesheet" media="screen">
        <script src="{{SR::$baseUrl}}js/respond.min.js"></script>

        <script src="{{SR::$baseUrl}}js/jquery.js"></script>
        <script src="{{SR::$baseUrl}}js/app/utility/form.jquery.js"></script>
        <script src="{{SR::$baseUrl}}js/app/utility/alertify.min.js"></script>
        <script src="{{SR::$baseUrl}}js/validation/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
        <script src="{{SR::$baseUrl}}js/validation/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
        <script src="{{SR::$baseUrl}}js/app/utility/form.js"></script>
        <script src="{{SR::$baseUrl}}js/site/site.js"></script>
    </head>

    <body id="top">

        @yield('content')

        <script src="{{SR::$baseUrl}}js/bootstrap.js"></script>
    </body>
</html>
