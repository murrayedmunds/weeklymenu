<?php
/*
Author: Murray Edmunds
Created: 19 Dec 2016
*/
?>

@extends('layouts.login')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ URL::asset('js/login.js') }}"></script>
@endsection

@section('description')
    <p>Weekly Menu will let you save your Pinterest boards and create random weekly menu's from them.</p>
@endsection

@section('content')
    <div id="registration">
        <h2>Registration</h2>
        <form method="POST" action="saveuser/">
            {{ csrf_field() }}
            <label>Name: <input type="text" name="name" size="34" value="{{ old('name') }}" aria-required="true"></label><br>
            <label>Email: <input type="text" name="email" size="34" value="{{ old('email') }}" aria-required="true"></label><br>
            <label>Password: <input type="password" name="password" size="30" aria-required="true"></label><br>
            <label>Confirm Password: <input type="password" name="password_confirmation" size="30" aria-required="true"></label><br>
            <label>Your Secret Question: <input type="text" name="question" value="{{ old('question') }}" aria-required="true"></label><br>
            <label>Your Secret Answer: <input type="text" name="answer" aria-required="true"></label><br>
            <div id="privacyPolicy">
                <p>Privacy Policy</p>
                <ul>
                    <li>Personal information will only be used for the purpose for which it was collected.</li>
                    <li>I will not share any collected information with third parties.</li>
                    <li>I will not use your saved email to send you any emails.  Collected email address is for login purposes only.</li>
                    <li>Passwords are saved in encrypted format.</li>
                    <li>You verify that you are older than 18 years old.</li>
                </ul>
            </div>
            <label><input type="checkbox" id="privacy" name="privacy" value="first_checkbox">I have read and agree with privacy policy.</label><br>
            <button type="submit">Register</button>
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
            <label>Email: <input type="email" name="email" value="{{ old('email') }}" aria-required="true"></label><br>
            <label>Password: <input type="password" name="password" aria-required="true"></label><br>
            <button type="submit">Login</button><br>
            <!--<a href="resetpassword/">Reset Password</a>-->
        </form>
        <a href="/security/">Forgot password?</a>
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
@endsection