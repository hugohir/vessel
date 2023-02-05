//*****************************************************************************
// Filename: cruisemmsicompany.js
// Author: Hugo Hiraoka (c) Copyright
// Date: Aug 2022
// Description:
// Create layers for each cruiseline company and displays on map
// Display markers for vessels according to its latitude and longitued
// Markers have different colors for each company
// Markers rotate according to vessel heading
// --> called from input.php, receives arrayP (positions), arrayV (vessels)
// --> arrayC (companies)
//*****************************************************************************

function cruiselineCompanyLayers(arrayP, arrayV, arrayC)
{

	//create a new array out of the other 2

//const aLPorts = [];

//icon common characteristics

var cruiselinerIcon = L.Icon.extend({
		options: {
			//shadowUrl: 'img/satant-icon_shadow.png',
			iconSize:     [18, 6],
			//shadowSize:   [50, 64],
			iconAnchor:   [12, 24],
			//shadowAnchor: [4, 62],
			popupAnchor:  [12, -3]
		}
	});

//definition of arrays holding companies database
	const cCompanyID			= [];
	const cCompanyName 		= [];
	const cCompanyVesIcon	= [];


//definition of arrays to hold data for each Position
	const posEntriesNo	=	[];
  const posMMSI  			= [];
	const posCallSign		= [];
	const posCompanyID	= [];
	const posTimeDate		= [];
	const posLat 				= [];
	const posLong 			= [];
	const posOriginPort	= [];
	const posDestPort		= [];
	const posDestETA		= [];
	const posNavStatus	= [];
	const posCourse			= [];
	const posSpeed			= [];
	const posTurn				= [];
	const posDraught		= [];
	const posSystem			= [];
	const posVesselName	=	[];
	const posVesselIMO	=	[];
	const posVesselFlag	=	[];
	const posVesselLen	=	[];
	const posVesselBeam	=	[];
	const posVesselWei	=	[];
	const posVesselYear	= [];
	const posVesType		= [];
	const posVesImage		= [];
	const posDestPtname	= [];
	const posOrigPname	= [];

//vessel MMSI info
	const vesEntriesNo	= [];
	const vesCompanyID	= [];
	const vesMMSI				= [];
	const vesName 			= [];
	const vesIMO 				= [];
	const vesCallname 	= [];
	const vesFlag 			= [];
	const vesLen 				= [];
	const vesBeam 			= [];
	const vesWeight			= [];
	const vesImg 				= [];
	const vesYear 			= [];
	const vesType 			= [];
	const vesImages			= [];


	for (var i = 0; i<arrayC.length; i++)
	{
		cCompanyID[i]				= arrayC[i]["company_id"];
		cCompanyName[i]			= arrayC[i]["company_name"];
		cCompanyVesIcon[i]	= arrayC[i]["companyVes_icon"];
		//document.write("cCompanyID["+i+"]="+cCompanyID[i]+" - "+"cCompanyName["+i+"]="+cCompanyName[i]);
	};

	////store data from Position table into arrays
	for (var i=0; i<arrayP.length;i++)
	  {
			posEntriesNo[i]		=	arrayP[i]["location_recno"];
			posMMSI[i] 				= arrayP[i]["vessel_MMSI"];
			posCallSign[i] 		= arrayP[i]["callsign"];
			posTimeDate[i] 		= arrayP[i]["loc_timedate"];
			posLat[i] 				= arrayP[i]["loc_latitude"];
			posLong[i] 				= arrayP[i]["loc_longitude"];
			posNavStatus[i] 	= arrayP[i]["Navigation_status"];
			posOriginPort[i] 	= arrayP[i]["origin_port"];
			posDestPort[i] 		= arrayP[i]["dest_port"];
			posDestETA[i] 		= arrayP[i]["dest_Predicted_ETA"];
			posCourse[i] 			= arrayP[i]["course_overGround"];
			posSpeed[i] 			= arrayP[i]["loc_speedOverGround"];
			posTurn[i] 				= arrayP[i]["rate_of_turn_per_min"];
			posDraught[i] 		= arrayP[i]["draught"];
			posSystem[i] 			= arrayP[i]["type_positioning_system"];
		};


//	cCompanyID.forEach(function(entry){
//		console.log(entry);
//		});

//store data from Vessels table into arrays
for (var i=0; i< arrayV.length; i++)
{
			vesEntriesNo[i]		= arrayV[i]["vessel_id"];
			vesMMSI[i]				= arrayV[i]["vessel_MMSI"];
			vesCompanyID[i]		= arrayV[i]["vessel_company"];
			vesName[i] 				= arrayV[i]["vessel_name"];
			vesIMO[i] 				= arrayV[i]["vessel_IMO"];
			vesCallname[i]		= arrayV[i]["vessel_callname"];
			vesFlag[i] 				= arrayV[i]["vessel_flag"];
			vesLen[i] 				= arrayV[i]["vessel_length"];
			vesBeam[i] 				= arrayV[i]["vessel_lengthBeam"];
			vesWeight[i]			= arrayV[i]["vessel_grossWeight"];
			vesImg[i] 				= arrayV[i]["vessel_image1"];
			vesYear[i] 				= arrayV[i]["vessel_yearBuilt"];
			vesType[i] 				= arrayV[i]["vessel_type"];
			vesImages[i]			= arrayV[i]["vessel_image1"];

		//document.write("arrayV "+vesMMSI[i]+" "+vesName[i]+"<br>");
}

for (var i=0;i<arrayV.length;i++)
{
			vesImages[i]			='<img src="' + vesImages[i] + '" height="70%" width="70%"/>';
};

//aLPorts = ports($arrayAllPorts);


//for (var i=0; i<arrayP.length; i++)
//{
//	for (var j=0; j<aLPorts.length; i++)
//	{
//
//		document.write(aLPorts[i]);
//
//	}
//}

	for (var i=0; i<arrayP.length; i++)
	{
		for (var j=0; j<arrayV.length; j++)
		{
			if (posMMSI[i] == vesMMSI[j])
			{
				posCompanyID[i] 	= vesCompanyID[j];
				posVesselName[i]	=	vesName[j];
				posVesselIMO[i]		=	vesIMO[j];
				posVesselFlag[i]	=	vesFlag[j];
				posVesselLen[i]		=	vesLen[j];
				posVesselBeam[i]	= vesBeam[j];
				posVesselWei[i]		=	vesWeight[j];
				posVesselYear[i]	= vesYear[j];
				posVesType[i]			= vesType[j];
				posVesImage[i]		= vesImages[j];
				//document.write(posVesselName[i]+" "+posVesselIMO+"<br>");
				}
			else {
			//
			}
		}
		};

	//cCompanyID.forEach(function(entry){
	//console.log(entry);
	//});

	//cCompanyName.forEach(function(entry){
	//console.log(entry);
	//});

//	posCompanyID.forEach(function(entry){
//		console.log(entry);
//	});

//	posMMSI.forEach(function(entry) {
//		  console.log(entry);
//		});

//	posLat.forEach(function(entry){
//		console.log(entry);
//	});

//	posLong.forEach(function(entry){
//		console.log(entry);
//	});

  //Create Company Layer variables
	const cLayerNo = [];
	const cIcon = [];
	const cTooltip = [];


  ////Dynamically create layerGroups for each company
  for (var i=0;i < arrayC.length;i++)
    {
      cLayerNo[i] = L.layerGroup();
			//dynamically change icon color depending on cruise-company icon for cruisers
			cIcon[i] = new cruiselinerIcon({iconUrl: cCompanyVesIcon[i]});
    };

		//Create markers variables for the markers
    const vMarkerNo = [];

    //Dynamically create markers, add them to separate layerGroups
    for (var i=0; i<arrayC.length; i++)
      {
				k=0;
				for (var j=0; j< arrayP.length; j++)
				{
					//document.write("cCompanyID["+ i +"]= " + cCompanyID[i]+ " - ");
					//document.write("posCompanyID["+ j +"]"+ "=" + posCompanyID[j]+ " are ");
					if (cCompanyID[i] == posCompanyID[j])
					{
						//document.write("Equal.<br>");
						vMarkerNo[[i],[k]] = L.marker([posLat[j], posLong[j]], {icon: cIcon[i], pmIgnore:true, rotationAngle: posCourse[j]}).bindTooltip(cCompanyName[i]+" "+posVesselName[j]).bindPopup(cCompanyName[i]+" "
						+posVesselName[j]+"<br>"+posLat[j]+","+posLong[j]+"<br>"
						+posVesImage[j]+"<br>"
						+"Status: "+posNavStatus[i]
						+"Going To:   "+posDestPort[i]+"<br>"
						+"Coming From:  "+posOriginPort[i]).openTooltip().addTo(cLayerNo[i]);
						k++;
					}
					else {
						//document.write("Different.<br>");
					}
				}};

  //Set the default teleport
  //map.addLayer(cLayerNo[0]);

//dynamically add layers
  var overlaysC = {
			};

	//document.write("vMarker length is = "+ vMarkerNo.length);

	for (var i=0; i<arrayC.length; i++)
	{
		overlaysC[cCompanyName[i]] = cLayerNo[i];
	}

  //add layer control to map
  var layerControlCompanies = L.control.layers(null,overlaysC, {position: 'topleft'}).addTo(map);

  }
