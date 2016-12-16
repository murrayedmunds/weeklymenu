<!DOCTYPE html>
<html>
<head>
    <title>Murray Edmunds Weekly Menu</title>
    <meta name="description" content="Weekly Menu by Murray Edmunds">
    <meta  name="twitter:title" content="twitter:Weekly Menu by Murray Edmunds">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Murray Edmunds">
    <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/js.storage.min.js') }}"></script>
    @yield('javascript')
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:400,400i,700" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="{{ URL::asset('img/mwre-flavicon.png')}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!--[if lt IE 9]>
    <script src="bower_components/html5shiv/dist/html5shiv.js"></script>
    <![endif]-->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-86811250-1', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body>
<hearder>
    <ul class="nav nav-pills">
        <li><a href="/home/">Home</a></li>
        <li><a href="/menus/">Menus</a></li>
        <li><a href="/settings/">Settings</a></li>
        <li><a href="/logout/">Logout</a></li>
    </ul>
</hearder>
@yield('content')
<hr>
<footer>
    <p><a href="http://www.murrayedmunds.ca">Back to www.murrayedmunds.ca</a></p>
    <p>&copy; {{ date('Y') }} Murray Edmunds</p>
</footer>
</body>
</html>
