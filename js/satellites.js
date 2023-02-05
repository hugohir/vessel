//*****************************************U
// Filename: satellites.js
//Author: Hugo Hiraoka (c) 2022 January
//Description: Will display the satellite footprint layers
//*********************************************

function satelliteLayers(){


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

var overlays_satellites = {
  //"<img src='images/satellites/eutelsat_logo.png' height= 24> Eutelsat 113W footprint": Eutelsat113W_FP,
  //"Elevation": Eutelsat113W_EV,

  "E113WA Footprint": E113WA_FP,
  "E113WA Elevation": E113WA_EV,
  "AnikF1R Footprint": AnikF1R_FP,
  "AnikF1R Elevation": AnikF1R_EV,
  "ABS3A Footprint": ABS3A_FP,
  "ABS3A Elevation": ABS3A_EV,
};


//var layerControlSatellites = new L.Control.Layers.TogglerIcon(null, overlays_satellites, {position:'topleft',togglerClassName: 'layers-satellite'}).addTo(map);

var layerControlSatellites = L.control.layers(null,overlays_satellites, {position:'topleft'}).addTo(map);

}
