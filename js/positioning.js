function positionVessel(arrayVesselToPosition)
{




}


//icon for cruiseliners
var clIcon = new cruiselinerIcon({iconUrl: 'img/satant-icon_48.png'});

//definition of arrays to hold data for each teleport
const clvCallname   = [];
const clvMMSI       = [];
const clvIMO        = [];
const clvFlag       = [];
const clvYearBuilt  = [];
const clvLength     = [];
const clvBeam       = [];
const clvGWT        = [];
const clvImg        = [];
const clplat        = [];
const clplong       = [];
const clpspeed      = [];
const clpheading    = [];
const clporigin     = [];
const clptimedate   = [];
const clpETA        = [];
const clpdestport   = [];
const clpdraught    = [];
const clpstatus     = [];
const clpcourse     = [];
const clpturn       = [];

//store data from teleport table into arrays
for (var i=0; i<arraytp.length;i++)
  {
    clvCallname[i] = arraycl[i][""];
    clvIMO = arraycl[i][""];
    clvFlag = arraycl[i][""];
    clvYearBuilt = arraycl[i][""];
    clvLength = arraycl[i][""];
    clvBeam = arraycl[i][""];
    clvGWT = arraycl[i][""];
    clvImg = arraycl[i][""];
    clplat = arraycl[i][""];
    clplong = arraycl[i][""];
    clpspeed = arraycl[i][""];
    clpheading     = arraycl[i][""];
    clporigin      = arraycl[i][""];
    clptimedate    = arraycl[i][""];
    clpETA         = arraycl[i][""];
    clpdestport    = arraycl[i][""];
    clpstatus      = arraycl[i][""];
    clpcourse      = arraycl[i][""];
    clpdraught     = arraycl[i][""];
    clpturn        = arraycl[i][""];
  }

//store img path from teleport data into array, create proper script
for (var i=0; i<arraytp.length;i++)
  {
    tpImages[i] = '"<img src="' + tpImg[i] + '" height="50%" width="50%"/>;'
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
    tpMarkerNo[i] = L.marker([tpLat[i], tpLong[i]],{icon:antIcon}).bindPopup(tpName[i]+tpImages[i]).addTo(tpLayerNo[i]);
  }

//-> TODO: Add an array of layers
map.addLayer(tpLayerNo[0],tpLayerNo[1],tpLayerNo[2]);

//dynamically add layers

var overlays = {
    //"CSC Miami": tpMarkerNo[0],
    //'Alpine NJ': tpMarkerNo[1],
    //'Horizons DL': tpMarkerNo[2]
	};

//add overlays for each teleport
for (var i=0; i<arraytp.length;i++)
  {
    overlays[tpName[i]] = tpMarkerNo[i];
  }

//add layer control to map
var layerControlTeleports = L.control.layers(null,overlays).addTo(map);

}
