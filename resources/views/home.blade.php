<?php
/*Author: Murray Edmunds
Created: 04 Dec 2016*/
?>
@extends('layouts.main')

@section('content')
    <main id="main" role ="main">
        <h3>Save Boards</h3>
        <form action="POST">
            {{ csrf_field() }}
            Mains Board ID: <input type="number" name="mainInput" id="mainInput" value= "335096097213492205"/>
            Sides Board ID: <input type="number" name="sideInput" id="sideInput" value= "335096097213492206"/>
            <button id="loadBtn" onclick="loadBoardArrays(); showLoading()">Load Boards</button>
        </form>
        <hr>
        <form action="POST">

        </form>
        <a href="https://www.nutt.net/how-do-i-get-pinterest-board-id/" target="_blank">Click Here to Get Your Own Board ID's</a>
        <div class="loadingStatus">
            <p id="loading">Boards loading</p>
            <p id="loaded">Boards loaded </p>
        </div>
        <button id="weeklyMenuBtn" onclick="getMainMenu(mainsArray)" disabled="true">Get Random Weekly Menu</button>
        <p>You must be signed into Pinterest to jump to pin link</p>
        <div class="menu">
            <h3>Monday</h3>
            <div id="main">
                <h5>Main Dish</h5>
                <button id="monMainBtn" onclick="getDayMenu('monday', mainsArray, 'main')" disabled="true">Get Main Dish</button>
                <div id="mainMonday"></div>
            </div>
            <div id="side">
                <h5>Side Dish</h5>
                <button id="monSideBtn" onclick="getDayMenu('monday', sidesArray, 'side')" disabled="true">Get Side Dish</button>
                <div id="sideMonday"></div>
            </div>
        </div>
        <div class="menu">
            <h3>Tuesday</h3>
            <div id="main">
                <h5>Main Dish</h5>
                <button id="tueMainBtn" onclick="getDayMenu('tuesday', mainsArray, 'main')" disabled="true">Get Main Dish</button>
                <div id="mainTuesday"></div>
            </div>
            <div id="side">
                <h5>Side Dish</h5>
                <button id="tueSideBtn" onclick="getDayMenu('tuesday', sidesArray, 'side')" disabled="true">Get Side Dish</button>
                <div id="sideTuesday"></div>
            </div>
        </div>
        <div class="menu">
            <h3>Wednesday</h3>
            <div id="main">
                <h5>Main Dish</h5>
                <button id="wedMainBtn" onclick="getDayMenu('wednesday', mainsArray, 'main')" disabled="true">Get Main Dish</button>
                <div id="mainWednesday"></div>
            </div>
            <div id="side">
                <h5>Side Dish</h5>
                <button id="wedSideBtn" onclick="getDayMenu('wednesday', sidesArray, 'side')" disabled="true">Get Side Dish</button>
                <div id="sideWednesday"></div>
            </div>
        </div>
        <div class="menu">
            <h3>Thursday</h3>
            <div id="main">
                <h5>Main Dish</h5>
                <button id="thuMainBtn" onclick="getDayMenu('thursday', mainsArray, 'main')" disabled="true">Get Main Dish</button>
                <div id="mainThursday"></div>
            </div>
            <div id="side">
                <h5>Side Dish</h5>
                <button id="thuSideBtn" onclick="getDayMenu('thursday', sidesArray, 'side')" disabled="true">Get Side Dish</button>
                <div id="sideThursday"></div>
            </div>
        </div>
        <div class="menu">
            <h3>Friday</h3>
            <div id="main">
                <h5>Main Dish</h5>
                <button id="friMainBtn" onclick="getDayMenu('friday', mainsArray, 'main')" disabled="true">Get Main Dish</button>
                <div id="mainFriday"></div>
            </div>
            <div id="side">
                <h5>Side Dish</h5>
                <button id="friSideBtn" onclick="getDayMenu('friday', sidesArray, 'side')" disabled="true">Get Side Dish</button>
                <div id="sideFriday"></div>
            </div>
        </div>
        <div class="menu">
            <h3>Saturday</h3>
            <div id="main">
                <h5>Main Dish</h5>
                <button id="satMainBtn" onclick="getDayMenu('saturday', mainsArray, 'main')" disabled="true">Get Main Dish</button>
                <div id="mainSaturday"></div>
            </div>
            <div id="side">
                <h5>Side Dish</h5>
                <button id="satSideBtn" onclick="getDayMenu('saturday', sidesArray, 'side')" disabled="true">Get Side Dish</button>
                <div id="sideSaturday"></div>
            </div>
        </div>
        <div class="menu">
            <h3>Sunday</h3>
            <div id="main">
                <h5>Main Dish</h5>
                <button id="sunMainBtn" onclick="getDayMenu('sunday', mainsArray, 'main')" disabled="true">Get Main Dish</button>
                <div id="mainSunday"></div>
            </div>
            <div id="side">
                <h5>Side Dish</h5>
                <button id="sunSideBtn" onclick="getDayMenu('sunday', sidesArray, 'side')" disabled="true">Get Side Dish</button>
                <div id="sideSunday"></div>
            </div>
        </div>
    </main>


@endsection