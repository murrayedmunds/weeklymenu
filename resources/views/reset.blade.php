<?php
/*
Author: Murray Edmunds
Created: 12 Dec 2016
*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>Murray Edmunds Weekly Menu</title>
    <meta name="description" content="Weekly Menu by Murray Edmunds">
    <meta  name="twitter:title" content="twitter:Weekly Menu by Murray Edmunds">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Murray Edmunds">
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
    <div>
        <h1>Weekly Menu by Murray Edmunds</h1>
    </div>
    <div>
        <h3>Reset Password</h3>
        <form method="post" action="/reset/update/">
            {{ csrf_field() }}
            <label>New Password: <input type="password" name="password" aria-required="true"></label><br>
            <label>Confirm Password: <input type="password" name="password_confirmation" size="30" aria-required="true"></label><br>
            <button type="submit">Create New Password</button>
        </form>
    </div>
    <div>
        @if ($errors->all() > 0)
        <ul class="errors list-unstyled">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <hr>
    <footer>
        <p><a href="http://www.murrayedmunds.ca">Back to www.murrayedmunds.ca</a></p>
        <p>&copy; {{ date('Y') }} Murray Edmunds</p>
    </footer>
</body>