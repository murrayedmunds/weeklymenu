var mainsArray = [];
var sidesArray = [];
/*var responseTextData = [];*/
function loadBoardArrays() {
    $(function() {
        event.preventDefault();
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
    $('#'+dish+day+'Url').val(data[num].url);
    $('#'+dish+day+'MetadataLinkTitle').val(null);
    $('#'+dish+day+'MetadataLinkDescription').val(null);
    $('#'+dish+day+'Note').val(data[num].note);
    $('#'+dish+day+'ImageUrl').val(data[num].image.original.url);
    document.getElementById(dish+day).innerHTML = "<p>"+data[num].note+"</p><a href='"+data[num].url+"' target='_blank'><img src='"+data[num].image.original.url+"'></a>";
    console.log(day+" Menu = "+data[num].note);
    /*if (data[num].metadata.link !== undefined) {
        $('#'+dish+day+'MetadataLinkTitle').val(data[num].metadata.link.title);
        $('#'+dish+day+'MetadataLinkDescription').val(data[num].metadata.link.description);
        $('#'+dish+day+'Note').val(null);
        document.getElementById(dish+day).innerHTML = "<h5>"+data[num].metadata.link.title+"</h5><p>"+data[num].metadata.link.description+"</p><a href='"+data[num].url+"' target='_blank'><img src='"+data[num].image.original.url+"'></a>";
        console.log(day+" Menu = "+data[num].metadata.link.title);
    } else {
        $('#'+dish+day+'MetadataLinkTitle').val(null);
        $('#'+dish+day+'MetadataLinkDescription').val(null);
        $('#'+dish+day+'Note').val(data[num].note);
        document.getElementById(dish+day).innerHTML = "<p>"+data[num].note+"</p><a href='"+data[num].url+"' target='_blank'><img src='"+data[num].image.original.url+"'></a>";
        console.log(day+" Menu = "+data[num].note);
    };*/
}

function rndNumber(array) { //get random number
    num=Math.floor(Math.random()*array.length);
    return num;
};

function saveMenu() {
    $(function () {
        event.preventDefault();
        var formData = new FormData();
        formData.append('test', 'test');
        formData.append('mainMondayUrl', 'test')
        formData.append('name', $('#menuName').val());
        //not sure why foreach loop not working
        /*var dishs = ['main', 'side'];
         var days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
         var datas = ['Url', 'MetadataLinkTitle', 'MetadataLinkDescription', 'Note'];
         $.each(dishs, function(i, dish){
         $.each(days, function(x, day){
         $.each(datas, function(y, data) {
         formData.append(dish+day+data, Storages.sessionStorage.get(dish+day+data));
         });
         });
         });*/
        /*formData.append('mainMondayUrl', Storages.sessionStorage.get('mainMondayUrl'));
         formData.append('mainMondayMetadataLinkTitle', Storages.sessionStorage.get('mainMondayMetadataLinkTitle'));
         formData.append('mainMondayMetadataLinkDescription', Storages.sessionStorage.get('mainMondayMetadataLinkDescription'));
         formData.append('mainMondayNote', Storages.sessionStorage.get('mainMondayNote'));
         formData.append('mainTuesdayUrl', Storages.sessionStorage.get('mainTuesdayUrl'));
         formData.append('mainTuesdayMetadataLinkTitle', Storages.sessionStorage.get('mainTuesdayMetadataLinkTitle'));
         formData.append('mainTuesdayMetadataLinkDescription', Storages.sessionStorage.get('mainTuesdayMetadataLinkDescription'));
         formData.append('mainTuesdayNote', Storages.sessionStorage.get('mainTuesdayNote'));
         formData.append('mainWednesdayUrl', Storages.sessionStorage.get('mainWednesdayUrl'));
         formData.append('mainWednesdayMetadataLinkTitle', Storages.sessionStorage.get('mainWednesdayMetadataLinkTitle'));
         formData.append('mainWednesdayMetadataLinkDescription', Storages.sessionStorage.get('mainWednesdayMetadataLinkDescription'));
         formData.append('mainWednesdayNote', Storages.sessionStorage.get('mainWednesdayNote'));
         formData.append('mainThursdayUrl', Storages.sessionStorage.get('mainThursdayUrl'));
         formData.append('mainThursdayMetadataLinkTitle', Storages.sessionStorage.get('mainThursdayMetadataLinkTitle'));
         formData.append('mainThursdayMetadataLinkDescription', Storages.sessionStorage.get('mainThursdayMetadataLinkDescription'));
         formData.append('mainThursdayNote', Storages.sessionStorage.get('mainThursdayNote'));
         formData.append('mainFridayUrl', Storages.sessionStorage.get('mainFridayUrl'));
         formData.append('mainFridayMetadataLinkTitle', Storages.sessionStorage.get('mainFridayMetadataLinkTitle'));
         formData.append('mainFridayMetadataLinkDescription', Storages.sessionStorage.get('mainFridayMetadataLinkDescription'));
         formData.append('mainFridayNote', Storages.sessionStorage.get('mainFridayNote'));
         formData.append('mainSaturdayUrl', Storages.sessionStorage.get('mainSaturdayUrl'));
         formData.append('mainSaturdayMetadataLinkTitle', Storages.sessionStorage.get('mainSaturdayMetadataLinkTitle'));
         formData.append('mainSaturdayMetadataLinkDescription', Storages.sessionStorage.get('mainSaturdayMetadataLinkDescription'));
         formData.append('mainSaturdayNote', Storages.sessionStorage.get('mainSaturdayNote'));
         formData.append('mainSundayUrl', Storages.sessionStorage.get('mainSundayUrl'));
         formData.append('mainSundayMetadataLinkTitle', Storages.sessionStorage.get('mainSundayMetadataLinkTitle'));
         formData.append('mainSundayMetadataLinkDescription', Storages.sessionStorage.get('mainSundayMetadataLinkDescription'));
         formData.append('mainSundayNote', Storages.sessionStorage.get('mainSundayNote'));
         formData.append('sideMondayUrl', Storages.sessionStorage.get('sideMondayUrl'));
         formData.append('sideMondayMetadataLinkTitle', Storages.sessionStorage.get('sideMondayMetadataLinkTitle'));
         formData.append('sideMondayMetadataLinkDescription', Storages.sessionStorage.get('sideMondayMetadataLinkDescription'));
         formData.append('sideMondayNote', Storages.sessionStorage.get('sideMondayNote'));
         formData.append('sideTuesdayUrl', Storages.sessionStorage.get('sideTuesdayUrl'));
         formData.append('sideTuesdayMetadataLinkTitle', Storages.sessionStorage.get('sideTuesdayMetadataLinkTitle'));
         formData.append('sideTuesdayMetadataLinkDescription', Storages.sessionStorage.get('sideTuesdayMetadataLinkDescription'));
         formData.append('sideTuesdayNote', Storages.sessionStorage.get('sideTuesdayNote'));
         formData.append('sideWednesdayUrl', Storages.sessionStorage.get('sideWednesdayUrl'));
         formData.append('sideWednesdayMetadataLinkTitle', Storages.sessionStorage.get('sideWednesdayMetadataLinkTitle'));
         formData.append('sideWednesdayMetadataLinkDescription', Storages.sessionStorage.get('sideWednesdayMetadataLinkDescription'));
         formData.append('sideWednesdayNote', Storages.sessionStorage.get('sideWednesdayNote'));
         formData.append('sideThursdayUrl', Storages.sessionStorage.get('sideThursdayUrl'));
         formData.append('sideThursdayMetadataLinkTitle', Storages.sessionStorage.get('sideThursdayMetadataLinkTitle'));
         formData.append('sideThursdayMetadataLinkDescription', Storages.sessionStorage.get('sideThursdayMetadataLinkDescription'));
         formData.append('sideThursdayNote', Storages.sessionStorage.get('sideThursdayNote'));
         formData.append('sideFridayUrl', Storages.sessionStorage.get('sideFridayUrl'));
         formData.append('sideFridayMetadataLinkTitle', Storages.sessionStorage.get('sideFridayMetadataLinkTitle'));
         formData.append('sideFridayMetadataLinkDescription', Storages.sessionStorage.get('sideFridayMetadataLinkDescription'));
         formData.append('sideFridayNote', Storages.sessionStorage.get('sideFridayNote'));
         formData.append('sideSaturdayUrl', Storages.sessionStorage.get('sideSaturdayUrl'));
         formData.append('sideSaturdayMetadataLinkTitle', Storages.sessionStorage.get('sideSaturdayMetadataLinkTitle'));
         formData.append('sideSaturdayMetadataLinkDescription', Storages.sessionStorage.get('sideSaturdayMetadataLinkDescription'));
         formData.append('sideSaturdayNote', Storages.sessionStorage.get('sideSaturdayNote'));
         formData.append('sideSundayUrl', Storages.sessionStorage.get('sideSundayUrl'));
         formData.append('sideSundayMetadataLinkTitle', Storages.sessionStorage.get('sideSundayMetadataLinkTitle'));
         formData.append('sideSundayMetadataLinkDescription', Storages.sessionStorage.get('sideSundayMetadataLinkDescription'));
         formData.append('sideSundayNote', Storages.sessionStorage.get('sideSundayNote'));
         */
        Storages.sessionStorage.removeAll();
        /*$.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
        });
        $.ajax({
            //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/home/savemenu/',
            data: formData,
            method: 'post',
            dataType: "json",
            cache : false,
            processData: false,
            success: function(){
                alert('win');
                //$(location).attr('href','/home/savemenu/');
            },
            error: function() {
                alert('error');
            }
        });*/
        $.get('/home/savemenu', formData);
    });
};
