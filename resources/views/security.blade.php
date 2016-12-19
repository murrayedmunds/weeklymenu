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
        <h3>Who Are You?</h3>
        <form method="post" action="/security/email-check/">
            {{ csrf_field() }}
            <label>Your Email: <input type="text" name="email" aria-required="true"></label><br>
            <button type="submit">Submit</button>
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
