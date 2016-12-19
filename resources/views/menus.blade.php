<?php
/*Author: Murray Edmunds
Created: 12 Dec 2016*/
?>
@extends('layouts.main')

@section('javascript')
    <script type="text/javascript" src="{{ URL::asset('js/menus.js') }}"></script>
@endsection

@section('content')
<h1>Hey {{ session('name') }} have a look at your saved menus.</h1>
    <main id="main" role ="main">
        <div id="tabs">
            <ul>
                @foreach($menus as $menu)
                    <li><a href="#tabs-{{ $menu->id }}">{{ $menu->name }}</a></li>
                @endforeach
            </ul>
            @foreach($menus as $menu)
                <div id="tabs-{{ $menu->id }}">
                    <div class="menuDay">
                        <h4>Monday</h4>
                        <div id="main">
                            <h5>Main Dish</h5>
                            <p>{{ $menu->mainMondayNote }}</p>
                            <a href="{{ $menu->mainMondayUrl }}"><img src="{{ $menu->mainMondayImageUrl }}" alt="Image of {{ $menu->mainMondayNote }}"></a>
                        </div>
                        <div id="side">
                            <h5>Side Dish</h5>
                            <p>{{ $menu->sideMondayNote }}</p>
                            <a href="{{ $menu->sideMondayUrl }}"><img src="{{ $menu->sideMondayImageUrl }}" alt="Image of {{ $menu->sideMondayNote }}"></a>
                        </div>
                    </div>
                    <div class="menuDay">
                        <h4>Tuesday</h4>
                        <div id="main">
                            <h5>Main Dish</h5>
                            <p>{{ $menu->mainTuesdayNote }}</p>
                            <a href="{{ $menu->mainTuesdayUrl }}"><img src="{{ $menu->mainTuesdayImageUrl }}" alt="Image of {{ $menu->mainTuesdayNote }}"></a>
                        </div>
                        <div id="side">
                            <h5>Side Dish</h5>
                            <p>{{ $menu->sideTuesdayNote }}</p>
                            <a href="{{ $menu->sideTuesdayUrl }}"><img src="{{ $menu->sideTuesdayImageUrl }}" alt="Image of {{ $menu->sideTuesdayNote }}"></a>
                        </div>
                    </div>
                    <div class="menuDay">
                        <h4>Wednesday</h4>
                        <div id="main">
                            <h5>Main Dish</h5>
                            <p>{{ $menu->mainWednesdayNote }}</p>
                            <a href="{{ $menu->mainWednesdayUrl }}"><img src="{{ $menu->mainWednesdayImageUrl }}" alt="Image of {{ $menu->mainWednesdayNote }}"></a>
                        </div>
                        <div id="side">
                            <h5>Side Dish</h5>
                            <p>{{ $menu->sideWednesdayNote }}</p>
                            <a href="{{ $menu->sideWednesdayUrl }}"><img src="{{ $menu->sideWednesdayImageUrl }}" alt="Image of {{ $menu->sideWednesdayNote }}"></a>
                        </div>
                    </div>
                    <div class="menuDay">
                        <h4>Thursday</h4>
                        <div id="main">
                            <h5>Main Dish</h5>
                            <p>{{ $menu->mainThursdayNote }}</p>
                            <a href="{{ $menu->mainThursdayUrl }}"><img src="{{ $menu->mainThursdayImageUrl }}" alt="Image of {{ $menu->mainThursdayNote }}"></a>
                        </div>
                        <div id="side">
                            <h5>Side Dish</h5>
                            <p>{{ $menu->sideThursdayNote }}</p>
                            <a href="{{ $menu->sideThursdayUrl }}"><img src="{{ $menu->sideThursdayImageUrl }}" alt="Image of {{ $menu->sideThursdayNote }}"></a>
                        </div>
                    </div>
                    <div class="menuDay">
                        <h4>Friday</h4>
                        <div id="main">
                            <h5>Main Dish</h5>
                            <p>{{ $menu->mainFridayNote }}</p>
                            <a href="{{ $menu->mainFridayUrl }}"><img src="{{ $menu->mainFridayImageUrl }}" alt="Image of {{ $menu->mainFridayNote }}"></a>
                        </div>
                        <div id="side">
                            <h5>Side Dish</h5>
                            <p>{{ $menu->sideFridayNote }}</p>
                            <a href="{{ $menu->sideFridayUrl }}"><img src="{{ $menu->sideFridayImageUrl }}" alt="Image of {{ $menu->sideFridayNote }}"></a>
                        </div>
                    </div>
                    <div class="menuDay">
                        <h4>Saturday</h4>
                        <div id="main">
                            <h5>Main Dish</h5>
                            <p>{{ $menu->mainSaturdayNote }}</p>
                            <a href="{{ $menu->mainSaturdayUrl }}"><img src="{{ $menu->mainSaturdayImageUrl }}" alt="Image of {{ $menu->mainSaturdayNote }}"></a>
                        </div>
                        <div id="side">
                            <h5>Side Dish</h5>
                            <p>{{ $menu->sideSaturdayNote }}</p>
                            <a href="{{ $menu->sideSaturdayUrl }}"><img src="{{ $menu->sideSaturdayImageUrl }}" alt="Image of {{ $menu->sideSaturdayNote }}"></a>
                        </div>
                    </div>
                    <div class="menuDay">
                        <h4>Sunday</h4>
                        <div id="main">
                            <h5>Main Dish</h5>
                            <p>{{ $menu->mainSundayNote }}</p>
                            <a href="{{ $menu->mainSundayUrl }}"><img src="{{ $menu->mainSundayImageUrl }}" alt="Image of {{ $menu->mainSundayNote }}"></a>
                        </div>
                        <div id="side">
                            <h5>Side Dish</h5>
                            <p>{{ $menu->sideSundayNote }}</p>
                            <a href="{{ $menu->sideSundayUrl }}"><img src="{{ $menu->sideSundayImageUrl }}" alt="Image of {{ $menu->sideSundayNote }}"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

@endsection
