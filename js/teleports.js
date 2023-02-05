//*****************************************************************************
// Filename: teleports.js
// Author: Hugo Hiraoka (c) Copyright
// Date: Jan 2022
// Description: function that add and remove teleports
//*****************************************************************************



function teleportLayers(arraytp)
{
//L.terminator().addTo(map);


var numTeleports = arraytp.length;

//icon common characteristics
var antennaIcon = L.Icon.extend({
		options: {
			//function dayNight()
//{
//L.terminator().addTo(map);
//}

			//shadowUrl: 'images/markers/teleports/satant_shadow.png',
			iconSize:     [20, 20],
			//shadowSize:   [50, 64],
			iconAnchor:   [12, 24],
			//shadowAnchor: [4, 62],
			popupAnchor:  [-8, 0]
		}
	});


var antennaMarkerMorning = L.Icon.extend({
	options: {
		shadowUrl: 'images/markers/antennas/0.1x/antenna_shadow_30left@0.1x.png',
		iconSize: [26, 30],
		shadowSize: [44, 34],
		iconAnchor: [12, 24],
		shadowAnchor: [24, 28],
		popupAnchor: [-8, 0]
	}
});

var antennaMarkerNoon = L.Icon.extend({
	options: {
		shadowUrl: 'images/markers/antennas/0.1x/antenna_shadow_noon@0.1x.png',
		iconSize: [26, 30],
		shadowSize: [44, 44],
		iconAnchor: [12, 24],
		shadowAnchor: [24, 24],
		popupAnchor: [-8, 0]
	}
});

var antennaMarkerAfternoon = L.Icon.extend({
	options: {
		shadowUrl: 'images/markers/antennas/0.1x/antenna_shadow_150right@0.1x.png',
		iconSize: [26, 30],
		shadowSize: [44, 34],
		iconAnchor: [12, 24],
		shadowAnchor: [26, 28],
		popupAnchor: [-8, 0]
	}
});

var antennaMarkerNight = L.Icon.extend({
	options: {
		iconSize: [26, 30],
		iconAnchor: [12, 24],
		popupAnchor: [-8, 0]
	}
})



//definition of arrays to hold data for each teleport
const tpCallname  = [];
const tpName      = [];
const tpLat       = [];
const tpLong      = [];
const tpImg       = [];
const tpCountry   = [];
const tpPathImage = [];
const tpLogo			= [];
const tpPathLogo	= [];
const tpPopUpName = [];
let tpNumberMarker = [];
const tputc				= [];


//store data from teleport table into arrays
for (var i=0; i<arraytp.length;i++)
  {
    tpCallname[i] = arraytp[i]["teleportcallname"];
    tpName[i] 		= arraytp[i]["teleportname"];
    tpLat[i] 			= arraytp[i]["teleportlat"];
    tpLong[i]	 		= arraytp[i]["teleportlong"];
    tpImg[i] 			= arraytp[i]["teleportimg"];
    tpCountry[i] 	= arraytp[i]["teleportcountry"];
		tpLogo[i]			= arraytp[i]["teleport_logo"];
		tpPopUpName[i]= arraytp[i]["teleportpopupname"];
		tputc[i]			= arraytp[i]["teleportutc"];
  }

var antIcon = new antennaIcon({iconUrl: 'images/markers/teleports/satant_48.png'});

checkColorShadow();

setInterval(checkColorShadow, 5000);




//store img path from teleport data into array, create proper script
for (var i=0; i<arraytp.length;i++)
  {
    //tpPathImage[i] = '<img src="' + tpImg[i] + '" height="90%" width="90%"/>';
		 tpPathImage[i] = '<img src="' + tpImg[i] + '" height="100%" width="100%"/>';
  }

//logos
for (var i=0; i<arraytp.length;i++)
	{
	  tpPathLogo[i] = '<img src="' + tpLogo[i] + '" height="24"/>';
	}

//Create Layer variables
const tpLayerNo = [];

//Dynamically create layerGroups for each item
for (var i=0;i<arraytp.length;i++)
  {
    tpLayerNo[i] = L.layerGroup();
  }

//Create markers variables
const tpMarkerNo = [];

//Dynamically create markers, add them to separate layerGroups
for (var i=0; i<arraytp.length;i++)
  {
   //tpMarkerNo[i] = L.marker([tpLat[i], tpLong[i]],{icon:antIcon, pmIgnore:true}).bindPopup(tpPopUpName[i]+tpPathImage[i]).addTo(tpLayerNo[i]);
	  tpMarkerNo[i] = L.marker([tpLat[i], tpLong[i]],{icon:tpNumberMarker[i], pmIgnore:true}).bindPopup(tpPopUpName[i]+tpPathImage[i]).addTo(tpLayerNo[i]);
  }

//Set the default teleport
map.addLayer(tpLayerNo[0]);


//dynamically add layers
var overlays = {
    //"CSC Miami": tpMarkerNo[0],
    //'Alpine NJ': tpMarkerNo[1],
    //'Horizons DL': tpMarkerNo[2]
	};


	//add overlays for each teleport
	for (var i=0; i<arraytp.length;i++)
	  {
	    overlays[tpPathLogo[i]+ "  " + tpCallname[i]] = tpMarkerNo[i];
	  }

	//add layer control to map
	var layerControlTeleports = L.control.layers(null,overlays, {position: 'topleft'}).addTo(map);





	function checkColorShadow()
	{
		browserTime = locationTime();

		const d = new Date();
		//whats the UTC
		var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
		var timedifference = d.getTimezoneOffset();

		console.log(" Timezone Browser=");
		console.log(timezone);    // -300
		console.log(" BrowserTime=");
		console.log(browserTime);
		console.log(" Time difference=");
		console.log(timedifference);

		//from browser UTC






		for (var tpNum=0; tpNum < arraytp.length; tpNum++)
		{

			if (browserTime == 0)
			{

				if (tpNum == 0)
				{
					tpNumberMarker[tpNum] =  new antennaMarkerNight({iconUrl: 'images/markers/antennas/0.1x/antenna_green_01x.png'});


				}
				if (tpNum == 1)
				{
					tpNumberMarker[tpNum] = new antennaMarkerNight({iconUrl: 'images/markers/antennas/0.1x/antenna_red_01x.png'});



				}
				if (tpNum== 2)
				{
					tpNumberMarker[tpNum] = 	new antennaMarkerNight({iconUrl: 'images/markers/antennas/0.1x/antenna_blue_01x.png'});


				}
				if (tpNum == 3)
				{
					tpNumberMarker[tpNum] =  new antennaMarkerNight({iconUrl: 'images/markers/antennas/0.1x/antenna_turquoise_01x.png'});



				}
				if (tpNum >3)
				{
					tpNumberMarker[tpNum] = new antennaMarkerNight({iconUrl: 'images/markers/antennas/0.1x/antenna_orange_01x.png'});

				}
			}

			if (browserTime == 1)
			{

				if (tpNum == 0)
				{
					tpNumberMarker[0] = new antennaMarkerMorning({iconUrl: 'images/markers/antennas/0.1x/antenna_green_01x.png'});


				}
				if (tpNum == 1)
				{
					tpNumberMarker[1] = 	new antennaMarkerMorning({iconUrl: 'images/markers/antennas/0.1x/antenna_red_01x.png'});

				}

				if (tpNum== 2)
				{
					tpNumberMarker[2] = 	new antennaMarkerMorning({iconUrl: 'images/markers/antennas/0.1x/antenna_blue_01x.png'});


				}
				if (tpNum == 3)
				{
					tpNumberMarker[3] = new antennaMarkerMorning({iconUrl: 'images/markers/antennas/0.1x/antenna_turquoise_01x.png'});


				}
				if (tpNum>3)
				{
					tpNumberMarker[tpNum] = new antennaMarkerMorning({iconUrl: 'images/markers/antennas/0.1x/antenna_orange_01x.png'});

				}
			}

			else if (browserTime == 2)
			{
				if (tpNum == 0)
				{
					tpNumberMarker[tpNum] = new antennaMarkerNoon({iconUrl: 'images/markers/antennas/0.1x/antenna_green_01x.png'});



				}
				if (tpNum == 1)
				{
					tpNumberMarker[tpNum] = 	new antennaMarkerNoon({iconUrl: 'images/markers/antennas/0.1x/antenna_red_01x.png'});

					//console.log(tpNumberMarker[tpNum]);

				}
				if (tpNum== 2)
				{
					tpNumberMarker[tpNum] = 	new antennaMarkerNoon({iconUrl: 'images/markers/antennas/0.1x/antenna_blue_01x.png'});

					//console.log(tpNumberMarker[tpNum]);

				}
				if (tpNum == 3)
				{
					tpNumberMarker[tpNum] = new antennaMarkerNoon({iconUrl: 'images/markers/antennas/0.1x/antenna_turquoise_01x.png'});

					//console.log(tpNumberMarker[tpNum]);

				}
				if (tpNum > 3) {
					tpNumberMarker[tpNum] = new antennaMarkerNoon({iconUrl: 'images/markers/antennas/0.1x/antenna_orange_01x.png'});
					//console.log(tpNumberMarker[tpNum]);

				}
			}

			else if (browserTime == 3)
			{
				if (tpNum == 0)
				{
					tpNumberMarker[tpNum] = new antennaMarkerAfternoon({iconUrl: 'images/markers/antennas/0.1x/antenna_green_01x.png'});

					//console.log(tpNumberMarker[tpNum]);
				}
				if (tpNum == 1)
				{
					tpNumberMarker[tpNum] = new antennaMarkerAfternoon({iconUrl: 'images/markers/antennas/0.1x/antenna_red_01x.png'});

					//console.log(tpNumberMarker[tpNum]);
				}
				if (tpNum== 2)
				{
					tpNumberMarker[tpNum] = 	new antennaMarkerAfternoon({iconUrl: 'images/markers/antennas/0.1x/antenna_blue_01x.png'});

					//console.log(tpNumberMarker[tpNum]);
				}
				if (tpNum == 3)
				{
					tpNumberMarker[tpNum] = new antennaMarkerAfternoon({iconUrl: 'images/markers/antennas/0.1x/antenna_turquoise_01x.png'});

					//console.log(tpNumberMarker[tpNum]);
				}
				if (tpNum > 3) {
					tpNumberMarker[tpNum] = new antennaMarkerAfternoon({iconUrl: 'images/markers/antennas/0.1x/antenna_orange_01x.png'});
					//console.log(tpNumberMarker[tpNum]);
				}

			}

			else {
			}

		}


	}


	}
