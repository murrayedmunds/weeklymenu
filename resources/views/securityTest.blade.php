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
        <h3>Please Answer Your Security Question</h3>
        <p>Question: {{ session('question') }}</p>
        <form method="post" action="/security/test-check/">
            {{ csrf_field() }}
            <label>Answer: <input type="text" name="answer" aria-required="true"></label><br>
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