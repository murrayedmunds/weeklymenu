<?php
/*Author: Murray Edmunds
Created: 04 Dec 2016*/
?>
@extends('layouts.main')

@section('javascript')
    <script type="text/javascript" src="{{ URL::asset('js/settings.js') }}"></script>
@endsection

@section('content')
    <h1>So {{ session('name') }} what do you want to change?</h1>
    <main id="main" role ="main">
        <div>
            <h3>User Settings</h3>
            <form method="post" action="/settings/update/">
                {{ csrf_field() }}
                <label>Name: <input type="text" name="name" size="34"></label><br>
                <label>Email: <input type="text" name="email" size="34"></label><br>
                <label>Password: <input type="password" name="password" size="30"></label><br>
                <label>Confirm Password: <input type="password" name="password_confirmation" size="30"></label><br>
                <label>Your Secret Question: <input type="text" name="question"></label><br>
                <label>Your Secret Answer: <input type="text" name="answer"></label><br>
                <button type="submit">Update</button>
            </form>
        </div>
        <div id="userErrors">
            @if ($errors->all() >0 && session('form') == 'userError')
            <ul class="errors list-unstyled">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <hr>
        <div>
            <h3>Boards</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Board Name</th>
                        <th>Board ID</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody class=".table-striped">
                    @foreach ($boards as $board)
                        <tr>
                            <td> {{ $board->name }} </td>
                            <td> {{ $board->board_id }} </td>
                            <td><a href="/settings/delete-board.php?id={{ $board->id }}">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
