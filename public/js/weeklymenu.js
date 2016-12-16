var mainsArray = [];
var sidesArray = [];
/*var responseTextData = [];*/
function loadBoardArrays() {
    $(function() {
        mainsArray = [];
        sidesArray = [];
        var mainUrl = "https://api.pinterest.com/v1/boards/"+$("#mainInput").val()+
            "/pins/?access_token=AUpgaVZklHQN0-KcQMRe6mvikp05FIjkythmvF5DkhJ4b-A4vwAAAAA&fields=link%2Curl%2Cimage%2Cmetadata%2Cnote";
        console.log('main url = '+mainUrl);
        loadPins(mainUrl, 'main');
        console.log('mainsArray =>');
        console.log(mainsArray);
        if ($('#sideInput').prop('selectedIndex') == 0) {
            console.log('no sides');
        } else {
            var sideUrl = 'https://api.pinterest.com/v1/boards/'+$('#sideInput').val()+'/pins/?access_token=AUpgaVZklHQN0-KcQMRe6mvikp05FIjkythmvF5DkhJ4b-A4vwAAAAA&fields=link%2Curl%2Cimage%2Cmetadata%2Cnote';
            console.log('side url = '+sideUrl);
            loadPins(sideUrl, 'side');
            console.log('sidesArray =>');
            console.log(sidesArray);
        }
        /*loadingMessage("<p>Boards Loaded</p>");*/
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

function getMainMenu() {
    for (i=0; i <= 6; i++) {
        switch(i) {
            case 0:
                getDayMenu('Monday', mainsArray, 'main');
                getDayMenu('Monday', sidesArray, 'side');
                break;
            case 1:
                getDayMenu('Tuesday', mainsArray, 'main');
                getDayMenu('Tuesday', sidesArray, 'side');
                break;
            case 2:
                getDayMenu('Wednesday', mainsArray, 'main');
                getDayMenu('Wednesday', sidesArray, 'side');
                break;
            case 3:
                getDayMenu('Thursday', mainsArray, 'main');
                getDayMenu('Thursday', sidesArray, 'side');
                break;
            case 4:
                getDayMenu('Friday', mainsArray, 'main');
                getDayMenu('Friday', sidesArray, 'side');
                break;
            case 5:
                getDayMenu('Saturday', mainsArray, 'main');
                getDayMenu('Saturday', sidesArray, 'side');
                break;
            case 6:
                getDayMenu('Sunday', mainsArray, 'main');
                getDayMenu('Sunday', sidesArray, 'side');
                break;
        };
    };
};

function getDayMenu(day, data, dish) {
    var num = rndNumber(data);
    console.log(day + ' ' + dish + 'number = ' + num);
    $.get("/home/", {"dish+day+'Url'": "data[num].url)"});
    /*Storages.sessionStorage.set(dish+day+'Url', data[num].url);*/
    Storages.sessionStorage.set(dish+day+'ImageUrl', data[num].image.original.url);
    if (data[num].metadata.link != null) {
        Storages.sessionStorage.set(dish+day+'MetadataLinkTitle', data[num].metadata.link.title);
        Storages.sessionStorage.set(dish+day+'MetadataLinkDescription', data[num].metadata.link.description);
        Storages.sessionStorage.set(dish+day+'Note', null);
        document.getElementById(dish+day).innerHTML = "<h5>"+data[num].metadata.link.title+"</h5><p>"+data[num].metadata.link.description+"</p><a href='"+data[num].url+"' target='_blank'><img src='"+data[num].image.original.url+"'></a>";
        console.log(day+" Menu = "+data[num].metadata.link.title);
    } else {
        Storages.sessionStorage.set(dish+day+'MetadataLinkTitle', null);
        Storages.sessionStorage.set(dish+day+'MetadataLinkDescription', null);
        Storages.sessionStorage.set(dish+day+'Note', data[num].note);
        document.getElementById(dish+day).innerHTML = "<p>"+data[num].note+"</p><a href='"+data[num].url+"' target='_blank'><img src='"+data[num].image.original.url+"'></a>";
        console.log(day+" Menu = "+data[num].note);
    };
}

function rndNumber(array) { //get random number
    num=Math.floor(Math.random()*array.length);
    return num;
};

function saveMenu() {
    $(location).attr('href', '/home/savemenu/')
}
