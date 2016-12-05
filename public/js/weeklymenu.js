var mainsArray = [];
var sidesArray = [];
/*var responseTextData = [];*/
function loadBoardArrays() {
    $(function() {
        mainsArray = [];
        sidesArray = [];
        var mainUrl = "https://api.pinterest.com/v1/boards/"+document.getElementById('mainInput').value+
            "/pins/?access_token=AUpgaVZklHQN0-KcQMRe6mvikp05FIjkythmvF5DkhJ4b-A4vwAAAAA&fields=link%2Curl%2Cimage%2Cmetadata%2Cnote";
        var sideUrl = 'https://api.pinterest.com/v1/boards/'+document.getElementById('sideInput').value+'/pins/?access_token=AUpgaVZklHQN0-KcQMRe6mvikp05FIjkythmvF5DkhJ4b-A4vwAAAAA&fields=link%2Curl%2Cimage%2Cmetadata%2Cnote';
        console.log('main url = '+mainUrl);
        console.log('side url = '+sideUrl);
        loadPins(mainUrl, 'main');
        console.log('mainsArray =>');
        console.log(mainsArray);
        loadPins(sideUrl, 'side');
        console.log('sidesArray =>');
        console.log(sidesArray);
        /*loadingMessage("<p>Boards Loaded</p>");*/
        $("#loading").css("display", "none");
        $("#loaded").show();
        var btnArray = ['weeklyMenuBtn', 'monMainBtn', 'monSideBtn', 'tueMainBtn', 'tueSideBtn', 'wedMainBtn', 'wedSideBtn', 'thuMainBtn', 'thuSideBtn', 'friMainBtn', 'friSideBtn', 'satMainBtn', 'satSideBtn', 'sunMainBtn', 'sunSideBtn'];
        for (i=0; i<btnArray.length; i++) {
            $('#'+btnArray[i]).prop('disabled', false);
        };
    });
};

function loadPins(url, dish) {
    var xmlhttp = new XMLHttpRequest();

    // set up our ajax request handler
    xmlhttp.onreadystatechange = function() {
        //check the state and status
        if(xmlhttp.readyState==4 && xmlhttp.status==200) {
            if (dish == 'main') {
                mainsArray = mainsArray.concat(JSON.parse(xmlhttp.responseText).data);
            } else if (dish == 'side') {
                sidesArray = sidesArray.concat(JSON.parse(xmlhttp.responseText).data);
            };
            var responeTextPage = JSON.parse(xmlhttp.responseText).page.next;
            console.log('Respone Page = '+responeTextPage);
            if (responeTextPage != null) {
                loadPins(responeTextPage, dish);
            }
        };
    };
    xmlhttp.open("GET",url,false);
    xmlhttp.send();
};

/*function getMainPins(url) {
    var xmlhttp = new XMLHttpRequest();

    // set up our ajax request handler
    xmlhttp.onreadystatechange = function() {
        //check the state and status
        if(xmlhttp.readyState==4 && xmlhttp.status==200) {
            mainsArray = mainsArray.concat(JSON.parse(xmlhttp.responseText).data);
            var responeTextPage = JSON.parse(xmlhttp.responseText).page.next;
            console.log('Respone Page = '+responeTextPage);
            if (responeTextPage != null) {
                getMainPins(responeTextPage, mainsArray);
            }
        };
    };
    xmlhttp.open("GET",url,false);
    xmlhttp.send();
};

function getSidePins(url) {
    var xmlhttp = new XMLHttpRequest();

    // set up our ajax request handler
    xmlhttp.onreadystatechange = function() {
        //check the state and status
        if(xmlhttp.readyState==4 && xmlhttp.status==200) {
            sidesArray = sidesArray.concat(JSON.parse(xmlhttp.responseText).data);
            var responeTextPage = JSON.parse(xmlhttp.responseText).page.next;
            console.log('Respone Page = '+responeTextPage);
            if (responeTextPage != null) {
                getSidePins(responeTextPage);
            }
        };
    };
    xmlhttp.open("GET",url,false);
    xmlhttp.send();
};*/

function getMainMenu() {
    for (i=0; i <= 6; i++) {
        switch(i) {
            case 0:
                getDayMenu('monday', mainsArray, 'main');
                getDayMenu('monday', sidesArray, 'side');
                break;
            case 1:
                getDayMenu('tuesday', mainsArray, 'main');
                getDayMenu('tuesday', sidesArray, 'side');
                break;
            case 2:
                getDayMenu('wednesday', mainsArray, 'main');
                getDayMenu('wednesday', sidesArray, 'side');
                break;
            case 3:
                getDayMenu('thursday', mainsArray, 'main');
                getDayMenu('thursday', sidesArray, 'side');
                break;
            case 4:
                getDayMenu('friday', mainsArray, 'main');
                getDayMenu('friday', sidesArray, 'side');
                break;
            case 5:
                getDayMenu('saturday', mainsArray, 'main');
                getDayMenu('saturday', sidesArray, 'side');
                break;
            case 6:
                getDayMenu('sunday', mainsArray, 'main');
                getDayMenu('sunday', sidesArray, 'side');
                break;
        };
    };
};

function getDayMenu(day, data, dish) {
    var num = rndNumber(data);
    if (data[num].metadata.link != null) {
        document.getElementById(dish+'-'+day).innerHTML = "<h5>"+data[num].metadata.link.title+"</h5><p>"+data[num].metadata.link.description+"</p><a href='"+data[num].link+"' target='_blank'><img src='"+data[num].image.original.url+"'></a>";
        console.log(day+" Menu = "+data[num].metadata.link.title);
    } else {
        document.getElementById(dish+'-'+day).innerHTML = "<p>"+data[num].note+"</p><a href='"+data[num].link+"' target='_blank'><img src='"+data[num].image.original.url+"'></a>";
        console.log(day+" Menu = "+data[num].note);
    };
}

function rndNumber(array) { //get random number
    num=Math.floor(Math.random()*array.length);
    return num;
};

/*function showLoading() {
 $(function() {
 $("#loading").show();
 });
 };*/


$(function() {
    /*$("a[data-popup]").live('click', function(e) {
     window.open($(this)[0].href);
     // Prevent the link from actually being followed
     e.preventDefault();
     });*/

    /*$("#loadBtn").click(function(){
     $("#loading").css({"display": "initial"})
     });*/
});