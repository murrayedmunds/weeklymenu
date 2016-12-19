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

@section('content')
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
@endsection