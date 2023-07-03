// mylocation.js
// This javascript file contains functions to get the location of the computer.
// This is used to calculate the time of the browser, from there we calculate its UTC
// Then we estimate the local time at each teleport based on its UTC

/*
# curl "http://worldtimeapi.org/api/timezone/America/Argentina/Salta"
{"abbreviation":"-03",
 "client_ip":"45.18.145.120",
 "datetime":"2023-07-02T21:26:46.908706-03:00",
 "day_of_week":0,
 "day_of_year":183,
 "dst":false,"dst_from":null,
 "dst_offset":0,
 "dst_until":null,
 "raw_offset":-10800,
 "timezone":"America/Argentina/Salta",
 "unixtime":1688344006,
 "utc_datetime":"2023-07-03T00:26:46.908706+00:00",
 "utc_offset":"-03:00",
 "week_number":26}



*/

//store all


async function getTimeZone() {
  let url = "http://worldtimeapi.org/api/timezone/America/Argentina/Salta";

  try {
    let response = await fetch(url);
    return await response.json();
  }
  catch (error) {
    console.log(error);
  }
}

async function renderTimeZone() {
  let tz = await getTimeZone();
  let html = '';
  tz.forEach()

}

function locationTime() {

var hour = new Date().getHours();

//var date = new Date();
//var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
console.log(timezone);    // -300
console.log(hour);


//morning 6am - 11am
if ( hour>=7 && hour <=11){
//	for (var i =0; i<arraytp.length; i++ )
//	{
//		var antennaMarkerTp[i] = antennaBlueAM;
//		var antennatp2 =
//	}

//window.alert("It's MORNING!");
return 1;
}
else if (hour >11 && hour <= 14){
//window.alert("It's NOON!");
return 2;
//
}
else if (hour >14 && hour <=18){
//window.alert("It's AFTERNOON!");
return 3;
}
else
{
//window.alert("It's NIGHT!");
return 0;
}




}



function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude +
  "<br>Longitude: " + position.coords.longitude;
}
