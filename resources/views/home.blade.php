<?php
/*Author: Murray Edmunds
Created: 04 Dec 2016*/
?>
@extends('layouts.main')

@section('content')
    <h1>Welcome {{ session('name') }}</h1>
    <main id="main" role ="main">
        <div class="boardsave">
            <h3>Save Boards</h3>
            <p><a href="https://www.nutt.net/how-do-i-get-pinterest-board-id/" target="_blank">Click Here to Get Your Own Board ID's</a></p>
            @if (sizeof($boards) == 0)
                <div>
                    <p>I see you have no boards saved.  If you want you can use some of Stacey Edmunds boards.</p>
                    <p>Main dishes board ID: 335096097213492205</p>
                    <p>Side dishes board ID: 335096097213492206</p>
                </div>
            @endif
            @if (sizeof($boards) == 1)
                <div>
                    <p>I see you only have one board saved.  If you want you can use some of Stacey Edmunds boards.</p>
                    <p>Main dishes board ID: 335096097213492205</p>
                    <p>Side dishes board ID: 335096097213492206</p>
                </div>
            @endif
            <form method="POST" action="home/saveboards/">
                {{ csrf_field() }}
                <label>Board Name: <input type="text" name="boardName" id="boardName"></label>
                <label>Board ID: <input type="number" name="boardId" id="BoardId"/></label>
                <button id="saveBtn">Save Boards</button>
            </form>
            <div id="regErrors">
                @if ($errors->all() >0 && session('form') == 'boardError')
                    <ul class="errors list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <hr>
        <div class="load">
            <h3>Load Boards</h3>
            <p>You must load your boards before you can create your menu.</p>
            <form>
                {{ csrf_field() }}
                <label>Main Dishes: <select id="mainInput">
                    <option value="">-Select Board- </option>
                        @foreach ($boards as $board)
                            <option name="mainInput" value="{{ $board->board_id }}">{{ $board->name }}</option>
                        @endforeach
                </select></label>
                <label>Side Dishes: <select id="sideInput">
                        <option value="">-Select Board-</option>
                        @foreach ($boards as $board)
                            <option name="sideInput" value="{{ $board->board_id }}">{{ $board->name }}</option>
                        @endforeach
                    </select></label>
            </form>
            <button id="loadBtn" onclick="loadBoardArrays()">Load Boards</button>

            <div class="loadingStatus">
                <!--<p id="loading">Boards loading</p>-->
                <p id="loaded" style="display: none;">Boards loaded </p>
            </div>
        </div>
        <hr>
        <div class="menusave">
            <h3>Save Menu</h3>
            <form method="GET">
                {{ csrf_field() }}
                <label>Menu Name: <input type="text" name="menuName" id="menuName"></label>
                <button id="saveBtn" onclick="saveMenu()">Save Menu</button>
            </form>
            <div id="regErrors">
                @if ($errors->all() >0 && session('form') == 'menuError')
                    <ul class="errors list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <hr>
        <div class="menu">
            <h3>Your Menu</h3>
            <button id="weeklyMenuBtn" onclick="getMainMenu()" disabled="true">Get Random Weekly Menu</button>
            <p>You must be signed into Pinterest to jump to pin link</p>
            <div class="menuDay">
                <h4>Monday</h4>
                <div id="main">
                    <h5>Main Dish</h5>
                    <button id="monMainBtn" onclick="getDayMenu('Monday', mainsArray, 'main')" disabled="true">Get Main Dish</button>
                    <div id="mainMonday"></div>
                </div>
                <div id="side">
                    <h5>Side Dish</h5>
                    <button id="monSideBtn" onclick="getDayMenu('Monday', sidesArray, 'side')" disabled="true">Get Side Dish</button>
                    <div id="sideMonday"></div>
                </div>
            </div>
            <div class="menuDay">
                <h4>Tuesday</h4>
                <div id="main">
                    <h5>Main Dish</h5>
                    <button id="tueMainBtn" onclick="getDayMenu('Tuesday', mainsArray, 'main')" disabled="true">Get Main Dish</button>
                    <div id="mainTuesday"></div>
                </div>
                <div id="side">
                    <h5>Side Dish</h5>
                    <button id="tueSideBtn" onclick="getDayMenu('Tuesday', sidesArray, 'side')" disabled="true">Get Side Dish</button>
                    <div id="sideTuesday"></div>
                </div>
            </div>
            <div class="menuDay">
                <h4>Wednesday</h4>
                <div id="main">
                    <h5>Main Dish</h5>
                    <button id="wedMainBtn" onclick="getDayMenu('Wednesday', mainsArray, 'main')" disabled="true">Get Main Dish</button>
                    <div id="mainWednesday"></div>
                </div>
                <div id="side">
                    <h5>Side Dish</h5>
                    <button id="wedSideBtn" onclick="getDayMenu('Wednesday', sidesArray, 'side')" disabled="true">Get Side Dish</button>
                    <div id="sideWednesday"></div>
                </div>
            </div>
            <div class="menuDay">
                <h4>Thursday</h4>
                <div id="main">
                    <h5>Main Dish</h5>
                    <button id="thuMainBtn" onclick="getDayMenu('Thursday', mainsArray, 'main')" disabled="true">Get Main Dish</button>
                    <div id="mainThursday"></div>
                </div>
                <div id="side">
                    <h5>Side Dish</h5>
                    <button id="thuSideBtn" onclick="getDayMenu('Thursday', sidesArray, 'side')" disabled="true">Get Side Dish</button>
                    <div id="sideThursday"></div>
                </div>
            </div>
            <div class="menuDay">
                <h4>Friday</h4>
                <div id="main">
                    <h5>Main Dish</h5>
                    <button id="friMainBtn" onclick="getDayMenu('Friday', mainsArray, 'main')" disabled="true">Get Main Dish</button>
                    <div id="mainFriday"></div>
                </div>
                <div id="side">
                    <h5>Side Dish</h5>
                    <button id="friSideBtn" onclick="getDayMenu('Friday', sidesArray, 'side')" disabled="true">Get Side Dish</button>
                    <div id="sideFriday"></div>
                </div>
            </div>
            <div class="menuDay">
                <h4>Saturday</h4>
                <div id="main">
                    <h5>Main Dish</h5>
                    <button id="satMainBtn" onclick="getDayMenu('Saturday', mainsArray, 'main')" disabled="true">Get Main Dish</button>
                    <div id="mainSaturday"></div>
                </div>
                <div id="side">
                    <h5>Side Dish</h5>
                    <button id="satSideBtn" onclick="getDayMenu('Saturday', sidesArray, 'side')" disabled="true">Get Side Dish</button>
                    <div id="sideSaturday"></div>
                </div>
            </div>
            <div class="menuDay">
                <h4>Sunday</h4>
                <div id="main">
                    <h5>Main Dish</h5>
                    <button id="sunMainBtn" onclick="getDayMenu('Sunday', mainsArray, 'main')" disabled="true">Get Main Dish</button>
                    <div id="mainSunday"></div>
                </div>
                <div id="side">
                    <h5>Side Dish</h5>
                    <button id="sunSideBtn" onclick="getDayMenu('Sunday', sidesArray, 'side')" disabled="true">Get Side Dish</button>
                    <div id="sideSunday"></div>
                </div>
            </div>
        </div>
    </main>

@endsection
