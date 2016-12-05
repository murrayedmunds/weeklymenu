<?php
/*
Author: Murray Edmunds
Created: 03 Dec 2016
*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>Murray Edmunds Weekly Menu</title>
    <meta name="description" content="Weekly Menu by Murray Edmunds">
    <meta property="og:description" content="Weekly Menu by Murray Edmunds">
    <meta name="twitter:Weekly Menu by Murray Edmunds">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Murray Edmunds">
    <meta http-equiv="last-modified" content="2016-12-03" />
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
        <p>description of app</p>
    </div>
    <div id="registration">
        <h2>Registration</h2>
        <form method="POST" action="saveuser/">
            {{ csrf_field() }}
            <label>Name: <input type="text" name="name" size="34" value="{{ old('name') }}"></label><br>
            <label>Email: <input type="text" name="email" size="34" value="{{ old('email') }}"></label><br>
            <label>Password: <input type="password" name="password" size="30"></label><br>
            <label>Your Secret Question: <input type="text" name="question" value="{{ old('question') }}"></label><br>
            <label>Your Secret Answer: <input type="text" name="answer"></label><br>
            <button type="submit">Submit</button>
        </form>
        <div id="regErrors">
            @if ($errors->all() >0 && session('form') == 'regError')
            <ul class="errors list-unstyled">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
    <div id="login">
        <h2>Login</h2>
        <form method="POST" action="loginvalid/">
            {{ csrf_field() }}
            <label>Email: <input type="email" name="email" value={{ old('email') }}></label><br>
            <label>Password: <input type="password" name="password"></label><br>
            <button type="submit">Submit</button><br>
            <!--<a href="resetpassword/">Reset Password</a>-->
        </form>
        <div id="loginErrors">
            @if ($errors->all() >0  && session('form') == 'loginError')
            <ul class="errors list-unstyled">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
</body>

</html>