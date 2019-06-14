$(function() {

    function onClickHandler(date, obj) {
        
        var text = '';

        if(date[0] !== null) {
            text += date[0].format('YYYY-MM-DD 12:01');
        }

        if(date[0] !== null && date[1] !== null) {
            text += ' - ';
        } else if(date[0] === null && date[1] == null) {
            text = '';
        }

        if(date[1] !== null) {
            text += date[1].format('YYYY-MM-DD 12:00');
        }

        document.getElementById("dates").value = text; 
    }

    var fillArray = [];
    var scheduleArray = [];
    var colorObject = {};

    function getRandomColor() {
        var letters = '3456789ABC';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 10)];
        }
        return color;
    }

    $.get("/lillagrytsholmen/assets/includes/book.inc.php", function( data ) {
        response = JSON.parse(data);
        
        /* formatting response */
        for (i=0; i < response.length; i++){
            response[i][3] = response[i][3].substring(0,10);
            response[i][4] = response[i][4].substring(0,10);
            colorObject[response[i][1]] = getRandomColor();
        }

        //console.log(colorObject);

        for (i=0; response.length > i; i++) {
            function getDates(startDate, stopDate) {
                var dateArray = [];
                var currentDate = moment(startDate);
                var stopDate = moment(stopDate);
                while (currentDate <= stopDate) {
                    dateArray.push( moment(currentDate).format('YYYY-MM-DD') )
                    currentDate = moment(currentDate).add(1, 'days');
                }
                dateArray.push(response[i][1])
                return dateArray;
            }
            fillArray.push(getDates(response[i][3], response[i][4]))
        }

        //	FORMATTING DATES TO FIT CALENDAR
        for(i = 0; i < fillArray.length; i++) {
            for(y = 0; y < fillArray[i].length-1; y++) {
                scheduleArray.push({
                    name: fillArray[i][fillArray[i].length -1],
                    date: fillArray[i][y]
                })

            }																	
        }

        //	FORMATTING ARRAY FOR COLORS TO CALENDAR

        //console.log("Schedule Array");
        //console.log(scheduleArray);

    });

    setTimeout(function(){
        $('.calendar').pignoseCalendar({
            theme: 'dark',
            lang: 'sv',
            week: 1,
            multiple: true,
            select: onClickHandler,
            scheduleOptions: {
                colors: colorObject
            },
            schedules: scheduleArray
        })	
    }, 250);
});