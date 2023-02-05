//*****************************************************************************
// Filename: ports.js
// Author: Hugo Hiraoka (c) Copyright
// Date: Aug 2022
// Description: Save port information into an js script
//*****************************************************************************

function portLayers(arrayp)
{

  var numPorts = arrayp.length;

  //icon common characteristics
  var portIcon = L.Icon.extend({
    options: {
      //shadowUrl: 'img/satant-icon_shadow.png',
      iconSize: [24, 24],
      //shadowSize:   [50, 64]zzzzxxxz  ,
      iconAnchor: [12, 24],
      //shadowAnchor: [4, 62],
      popupAnchor: [-3, -76]
    }
  });

  //icon for cruiseliners
  var pIcon = new portIcon({
    iconUrl: 'images/icons/ports-icon.png'
  });

const portID        = [];
const portRegion    = [];
const portCountry   = [];
const portLatitude  = [];
const portLongitude = [];
const portName      = [];
const portImage     = [];
const portCallName  = [];
const portPathImage = [];
let portLayer       = [];
let portMarker      = [];


for (var i = 0; i<arrayp.length; i++)
{
portID[i]         = arrayp[i]["World_Port_id"];
portRegion[i]     = arrayp[i]["Region_Index"];
portCountry[i]    = arrayp[i]["Port_country_code"];
portName[i]       = arrayp[i]["Port_name"];
portLatitude[i]   = arrayp[i]["Port_latitude"];
portLongitude[i]  = arrayp[i]["Port_longitude"];
portImage[i]      = arrayp[i]["Port_image"];
portCallName[i]   = arrayp[i]["Port_callName"];
}

//store img path from port data into array, create proper script
for (var i = 0; i < arrayp.length; i++) {
  portPathImage[i] = '"<img src="' + portImage[i] + '" height="50%" width="50%"/>;'
}


//Create Layer variables
const pLayerNo = [];


for (var i=0; i<arrayp.length; i++)
{
pLayerNo[i] = L.layerGroup();
}

const pMarkerNo = [];


for (var i = 0; i<arrayp.length; i++){
  pMarkerNo[i] = L.marker([portLatitude[i], portLongitude[i]], {
    icon: pIcon, pmIgnore:true}).bindPopup(portName[i] + portPathImage[i]).addTo(pLayerNo[i]);
}

//map.addLayer(pLayerNo[0]);

var overlays = {};


for (var i = 0; i < arrayp.length; i++) {
  overlays[portCallName[i] + " " + portCountry[i] + " " + portName[i]] =  pMarkerNo[i];
};




//};

var layerControlPorts = L.control.layers(null, overlays, {position:'topleft'}).addTo(map);

}
