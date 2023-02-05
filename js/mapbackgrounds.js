//*****************************************************************************
// Filename: mapbackgrounds.js
// Author: Hugo Hiraoka (c) Copyright
// Date: Jan 2022
// Description: function that add map backgrounds
//*****************************************************************************

function setMapBackgrounds()
{
//Attributions
var mbAttr = "";//'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
var mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';


//var regular = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {noWrap:true, maxZoom: 19}).addTo(map);
var bingmap = L.bingLayer('AsnzARqm51UlUieySQ22AXI93tlwTycdoRiz_dgYOIyoomtrV8pmfoM8EefQnzf9');

//Layer variables
var greyscale = L.tileLayer(mbUrl, {id: 'mapbox/light-v9', tileSize: 512, zoomOffset: -1,attribution: mbAttr });
var streets = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});

/*var basemaps = {

Greyscale: L.tileLayer(mbUrl, {id: 'mapbox/light-v9', tileSize: 512, zoomOffset: -1,attribution: mbAttr }),
Streets:L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr})

}

var options = {
  // Make the "Landmarks" group exclusive (use radio inputs)
  exclusiveGroups: ["basemaps"],
  // Show a checkbox next to non-exclusive group labels for toggling all
  groupCheckboxes: true
};
*/


var baseMaps = {
		'Regular': regular,
		'Grayscale': greyscale,
		'Streets': streets,
		'Bing': bingmap
	};


//add layer control to map
var layerControlMapBackgrounds = L.control.layers(null,baseMaps,{position:'topleft'}).addTo(map);
}
