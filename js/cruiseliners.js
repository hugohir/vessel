//*****************************************************************************
// Filename: cruiseliners.js
// Author: Hugo Hiraoka (c) Copyright
// Date: Jan 2022
// Description: function that add cruiseliners
//*****************************************************************************

function cruiselineCompanyLayers(arrayCruiselineCompanies) {

  var numCruiselineCompanies = arrayCruiselineCompanies.length;

  //icon common characteristics
  var cruiselinerIcon = L.Icon.extend({
    options: {
      //shadowUrl: 'img/satant-icon_shadow.png',
      iconSize: [24, 24],
      //shadowSize:   [50, 64],
      iconAnchor: [12, 24],
      //shadowAnchor: [4, 62],
      popupAnchor: [-3, -76]
    }
  });

  //icon for cruiseliners
  var clIcon = new cruiselinerIcon({
    iconUrl: 'images/icons/satant-icon_48.png'
  });

  //definition of arrays to hold data for each teleport
  const clvCallname = [];
  const clvMMSI = [];
  const clvIMO = [];
  const clvFlag = [];
  const clvYearBuilt = [];
  const clvLength = [];
  const clvBeam = [];
  const clvGWT = [];
  const clvImg = [];

  const clplat = [];
  const clplong = [];
  const clpspeed = [];
  const clpheading = [];
  const clporigin = [];
  const clptimedate = [];
  const clpETA = [];
  const clpdestport = [];
  const clpdraught = [];
  const clpstatus = [];
  const clpcourse = [];
  const clpturn = [];

  //store data from teleport table into arrays
  for (var i = 0; i < arraytp.length; i++) {
    tpCallname[i] = arraytp[i]["teleportcallname"];
    tpName[i] = arraytp[i]["teleportname"];
    tpLat[i] = arraytp[i]["teleportlat"];
    tpLong[i] = arraytp[i]["teleportlong"];
    tpImg[i] = arraytp[i]["teleportimg"];
    tpCountry[i] = arraytp[i]["teleportcountry"];
  }

  //store img path from teleport data into array, create proper script
  for (var i = 0; i < arraytp.length; i++) {
    tpImages[i] = '"<img src="' + tpImg[i] + '" height="50%" width="50%"/>;'
  }

  //Create Layer variables
  const tpLayerNo = [];

  //Dynamically create layerGroups for each item
  for (var i = 0; i < arraytp.length; i++) {
    tpLayerNo[i] = L.layerGroup();
  }

  //Create markers variables
  const tpMarkerNo = [];

  //Dynamically create markers, add them to separate layerGroups
  for (var i = 0; i < arraytp.length; i++) {
    tpMarkerNo[i] = L.marker([tpLat[i], tpLong[i]], {
      icon: antIcon
    }).bindPopup(tpName[i] + tpImages[i]).addTo(tpLayerNo[i]);
  }

  //-> TODO: Add an array of layers
  map.addLayer(tpLayerNo[0], tpLayerNo[1], tpLayerNo[2]);

  //dynamically add layers

  var overlays = {
    //"CSC Miami": tpMarkerNo[0],
    //'Alpine NJ': tpMarkerNo[1],
    //'Horizons DL': tpMarkerNo[2]
  };

  //add overlays for each teleport
  for (var i = 0; i < arraytp.length; i++) {
    overlays[tpName[i]] = tpMarkerNo[i];
  }

  //add layer control to map
  var layerControlTeleports = L.control.layers(null, overlays).addTo(map);

}
