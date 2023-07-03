//*****************************************U
// Filename: satellites.js
//Author: Hugo Hiraoka (c) 2022 January
//Description: Will display the satellite footprint layers
//*********************************************

function satelliteLayers(arraysat)
{

  var numSatellites = arraysat.length;

  var satMarker = L.Icon.extend({
   options: {
     iconSize: [20,20],
     iconAnchor: [12,24],
     popupAnchor: [-8,0]
   }
 });

  var E113Sat_marker = new satMarker({
    //iconUrl: 'images/icons/sat_blue_40px.png'
    iconUrl: 'images/icons/satellite_icon.png'
  }),
      ANIKF1RSat_marker = new satMarker({
    //iconUrl: 'images/icons/sat_purple_40px.png'
    iconUrl: 'images/icons/satellite_icon.png'
  }),
      ABS3ASat_marker = new satMarker({
    //iconUrl: 'images/icons/sat_black_40px.png'
    iconUrl: 'images/icons/satellite_icon.png'
  });

  const satName = [];
  const satCallName = [];
  const satPrevName = [];
  const satLat = [];
  const satLong = [];
  const satCompany = [];
  const satLogo = [];
  const satImage = [];
  const satApogee = [];
  const satPerigee = [];
  const satLaunch = [];
  const satPeriod = [];
  const satInclination = [];
  const satCtrx =[];
  const satKutrx = [];
  const satLifespan = [];
  const satPathImage=[];
  const satPathLogo=[];
  const satNumberMarker=[];
  const satMarkerNo=[];
  const satLayerNo=[];

  var overlays = {
  };

//store data from satellites into arrays
for (var i=0; i<arraysat.length;i++)
{
  satName[i] = arraysat[i]['satName'];
  satCallName[i] = arraysat[i]['satCallName'];
  satPrevName[i] = arraysat[i]['satExName'];
  satCompany[i] = arraysat[i]['satOwner'];
  satLaunch[i] = arraysat[i]['satLaunchDate'];
  satLat[i] = arraysat[i]['satLat'];
  satLong[i] = arraysat[i]['satLong'];
  satApogee[i] = arraysat[i]['altApogee'];
  satPerigee[i] = arraysat[i]['altPerigee'];
  satPeriod[i] = arraysat[i]['Period'];
  satInclination[i] = arraysat[i]['inclination'];
  satCtrx[i] = arraysat[i]['transponders_C'];
  satKutrx[i] = arraysat[i]['transponders_Ku'];
  satImage[i] = arraysat[i]['satImage'];
  satLogo[i] = arraysat[i]['satOwnerLogo'];
  satLifespan[i] = arraysat[i]['lifeSpan'];
}

//store img path from teleport data into array, create proper script
for (var i=0; i<arraysat.length;i++)
  {
    //tpPathImage[i] = '<img src="' + tpImg[i] + '" height="90%" width="90%"/>';
		 satPathImage[i] = '<img src="' + satImage[i] + '" height="100%" width="100%"/>';
  }

//logos
for (var i=0; i<arraysat.length;i++)
	{
	  satPathLogo[i] = '<img src="' + satLogo[i] + '" height="24"/>';
	}

//Dynamically create layerGroups for each item
for (var i=0;i<arraysat.length;i++)
  {
    satLayerNo[i] = L.layerGroup();
  }

//Dynamically create markers, add them to separate layerGroups
for (var i=0; i<arraysat.length;i++)
  {
   //tpMarkerNo[i] = L.marker([tpLat[i], tpLong[i]],{icon:antIcon, pmIgnore:true}).bindPopup(tpPopUpName[i]+tpPathImage[i]).addTo(tpLayerNo[i]);
   satMarkerNo[i] = L.marker([satLat[i], satLong[i]],{icon:satNumberMarker[i], pmIgnore:true}).bindPopup(satCallName[i]+"/n"+satPathImage[i]).addTo(satLayerNo[i]);
  }

//add overlays for each teleport
for (var i=0; i<arraysat.length;i++)
  {
    overlays[satPathLogo[i]+ " " + satCallName[i]] = satMarkerNo[i];
  }

var E113WA_FP = L.geoJSON(Eutelsat113W_Footprint, {weight: 0.2,
    style: function(feature) {
        switch (feature.properties.footprint) {
          case 'E113WA_Footprint_PanAmerica_Cband3_42dBW_North': return {fillColor: "#b7950b", fillOpacity:0.2,color: "#a93226"};
          case 'E113WA_Footprint_PanAmerica_Cband3_40dBW_South': return {fillColor: "#f9e79f", fillOpacity:0.2,color: "#a93226"};
          case 'E113WA_Footprint_PanAmerica_Cband3_41dBW_North': return {fillColor: "#b7950b", fillOpacity:0.1,color: "#a93226"};
          case 'E113WA_Footprint_PanAmerica_Cband3_40dBW_North': return {fillColor: "#f9e79f", fillOpacity:0.2,color: "#a93226"};
          case 'E113WA_Footprint_PanAmerica_Cband3_38dBW_Americas': return {fillColor: "#fef9e7", fillOpacity:0.1,color: "#a93226"};
          case 'E113WA_Footprint_PanAmerica_Cband3_39dBW_Americas': return {fillColor: "#fef9e7", fillOpacity:0.2,color: "#a93226"};
          case 'E113WA_Footprint_PanAmerica_Cband3_41dBW_South': return {fillColor: "#b7950b", fillOpacity:0.1,color: "#a93226"};
    }}});

var E113WA_EV = L.geoJSON(Eutelsat113W_Elevation, {weight: 0.3,
    style: function(feature){
        switch (feature.properties.elevation){
          case 'Eutelsat113W_Elevation_10': return {fillColor: "#000000",fillOpacity: 0, color: "#000000"};
          case 'Eutelsat113W_Elevation_5': return {fillColor: "#000000", fillOpacity: 0, color: "#000000"};
          case 'Eutelsat113W_Elevation_0': return {fillColor: "#000000",fillOpacity: 0, color: "#000000"};
    }}});

//AnikF1R Footprints
var AnikF1R_FP = L.geoJSON(AnikF1R_Footprint, {weight: 0.2,
    style: function(feature) {
      switch (feature.properties.footprint){
        case 'AnikF1R_Footprint_42dBW': return {fillColor: "#ff33ff", fillOpacity:0.3,color:"#990099"};
        case 'AnikF1R_Footprint_40dBW_South': return {fillColor: "#ff33ff", fillOpacity:0.15,color:"#990099"};
        case 'AnikF1R_Footprint_38dBW': return {fillColor: "#ff33ff", fillOpacity:0.1,color:"990099"};
        case 'AnikF1R_Footprint_Hawaii_36dBW': return {fillColor: "#ff33ff", fillOpacity:0.01,color:"#990099"};
        case 'AnikF1R_Footprint_Hawaii_37dBW': return {fillColor: "#ff33ff", fillOpacity:0.05,color:"#990099"};
        case 'AnikF1R_Footprint_40dBW_North': return {fillColor: "#ff33ff", fillOpacity:0.15,color:"#990099"};
        case 'AnikF1R_Footprint_36dBW': return {fillColor: "#ff33ff", fillOpacity:0.01,color:"#990099"};
    }}});

//AnikF1R Elevation
var AnikF1R_EV = L.geoJSON(AnikF1R_Elevation, {weight:0.3,
    style: function(feature){
        switch (feature.properties.elevation){
          case 'AnikF1R_Elevation_0': return {fillOpacity: 0, color: "#990099",fillColor: '#000000'};
          case 'AnikF1R_Elevation_5': return {fillOpacity: 0, color: "#990099",fillColor: '#000000'};
          case 'AnikF1R_Elevation_10': return {fillOpacity: 0, color: "#990099",fillColor: '#000000'};
    }}});

/*
var groupedOverlay = {
  "Eutelsat":{
  "Footprint": E113WA_FP,
  "Elevation": E113WA_EV
}};
*/

//ABS 3A Satellite
//max margin
var ABS3A_Footprint_38 = L.circle([0.108188, -4.094496], {
  weight: 0.3,
  color: '#4d3d00',
  fillColor: '#d35400',
  fillOpacity: 0.3,
  radius: 3096211.132817426
});

//second largest margin
var ABS3A_Footprint_37 = L.donut([0.108188, -4.094496], {
  weight: 0.3,
  color: "#4d3d00",
  fillColor: '#e59866',
  fillOpacity: 0.3,
  radius: 4292093.8572201235,
  innerRadius: 3096211.132817426,
  innerRadiusAsPercent: false
});

//third largest margin
var ABS3A_Footprint_36 = L.donut([0.108188, -4.094496], {
  weight: 0.3,
  color: "#4d3d00",
  fillColor: '#edbb99',
  fillOpacity: 0.2,
  radius: 5548593.584825242,
  innerRadius: 4292093.8572201235,
  innerRadiusAsPercent: false
});

//fourth largest margin
var ABS3A_Footprint_35 = L.donut([0.108188, -4.094496], {
  weight: 0.3,
  color: "#4d3d00",
  fillColor: '#f6ddcc',
  fillOpacity: 0.2,
  radius: 7098379.204284023,
  innerRadius: 5548593.584825242,
  innerRadiusAsPercent: false
});

var ABS3A_EV = L.geoJSON(ABS3A_Elevation, {weight:0.3,
  style: function(feature){
    switch (feature.properties.elevation){
      case 'ABS3A_Elevation_0': return {fillOpacity: 0, fillColor: "#000000",color: "#4d3d00"};
      case 'ABS3A_Elevation_5': return {fillOpacity: 0, fillColor: "#000000", color: "#4d3d00"};
      case 'ABS3A_Elevation_10': return {fillOpacity: 0, fillColor: "#000000",color: "#4d3d00"};
    }}});

//fifth margin
var ABS3A_FP_345 = L.geoJSON(ABS3A_Footprint_345, {weight: 0.3,
  style: function(feature) {
    switch (feature.properties.footprint){
      case 'ABS3A_Footprint_34.5dBW': return {fillOpacity: 0.2, fillColor: "#fbeee6", color: '#4d3d00'};
    }}});

var ABS3A_FP= L.layerGroup([ABS3A_Footprint_38, ABS3A_Footprint_37, ABS3A_Footprint_36, ABS3A_Footprint_35, ABS3A_FP_345]);


//Dynamically create markers, add them to separate layerGroups
for (var i=0; i<arraysat.length;i++)
  {
   //tpMarkerNo[i] = L.marker([tpLat[i], tpLong[i]],{icon:antIcon, pmIgnore:true}).bindPopup(tpPopUpName[i]+tpPathImage[i]).addTo(tpLayerNo[i]);
	  satMarkerNo[i] = L.marker([satLat[i], satLong[i]],{icon:satNumberMarker[i], pmIgnore:true}).bindPopup(satName[i]+satPathImage[i]).addTo(satLayerNo[i]);
  }

var E113WA_Mkr = L.marker([satLat[0], satLong[0]], {icon:E113Sat_marker}).addTo(map).bindPopup(satName[0]+satPathImage[0]);
var ANIKF1R_Mkr = L.marker([satLat[1], satLong[1]], {icon:ANIKF1RSat_marker}).addTo(map).bindPopup(satName[1]+satPathImage[1]);
var ABS3A_Mkr = L.marker([satLat[2],satLong[2]], {icon:ABS3ASat_marker}).addTo(map).bindPopup(satName[2]+satPathImage[2]);

var overlays_satellites = {
  //"<img src='images/satellites/eutelsat_logo.png' height= 24> Eutelsat 113W footprint": Eutelsat113W_FP,
  //"Elevation": Eutelsat113W_EV,
  "E113WA Satellite":E113WA_Mkr,
  "E113WA Footprint": E113WA_FP,
  "E113WA Elevation": E113WA_EV,
  "AnikF1R Satellite": ANIKF1R_Mkr,
  "AnikF1R Footprint": AnikF1R_FP,
  "AnikF1R Elevation": AnikF1R_EV,
  "ABS3A Satellite": ABS3A_Mkr,
  "ABS3A Footprint": ABS3A_FP,
  "ABS3A Elevation": ABS3A_EV,
};

//var layerControlSatellites = new L.Control.Layers.TogglerIcon(null, overlays_satellites, {position:'topleft',togglerClassName: 'layers-satellite'}).addTo(map);

var layerControlSatellites = L.control.layers(null, overlays_satellites, {position:'topleft'}).addTo(map);

}


function onMapClick(e) {
  var contained = E113WA_Footprint_PanAmerica_Cband3_38dBW_Americas.contains(e.latlng);
  var message = contained ? "This is inside the polygon!" : "This is not inside the polygon";
  popup
    .setLatLng(e.latlng)
    .setContent(mesage)
    .openOn(map)
}

function onMarkerClick(e) {
  var contained = E113WA_Footprint_PanAmerica_Cband3_38dBW_Americas.contains(e.latlng);
  var message = contained ? "This marker is inside the polygon" : "This marker is not inside the polygon";
  popup
    .setLatLng(e.latlng)
    .setContent(message)
    .openOn(map)
}
