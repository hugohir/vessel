// mylocation.js
// This javascript file contains functions to get the location of the computer.
// This is used to calculate the time of the browser, from there we calculate its UTC
// Then we estimate the local time at each teleport based on its UTC

function locationTime() {

var hour = new Date().getHours();

//var date = new Date();
//var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
//console.log(timezone);    // -300
//console.log(hour);

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
