/**** PARTIE POUR TOUS LES POINTS *******/

// Définition de la zone
var tableauPointsPolygone = [];
for (var i = 0; i < area.length; i++) {
	tableauPointsPolygone.push(new google.maps.LatLng(area[i].long,area[i].lat));
};


var infowindow = new google.maps.InfoWindow({});
var center = new google.maps.LatLng(44.758998, 5.144902);
var options = {
	'zoom': 9,
	'center': center,
	'mapTypeId': google.maps.MapTypeId.ROADMAP,
	disableDefaultUI: true,
};

var map = new google.maps.Map(document.getElementById("map-canvas"), options);

var markersMap = [];

//Création des markers
for (var i = 0; i < markers.length; i++) {
  	var latLng = new google.maps.LatLng(markers[i].latitude,markers[i].longitude);

  	var marker = new google.maps.Marker({
  		'position': latLng,
  		'icon':base_url+"assets/images/map-icon.png",
  		'title': markers[i].titre
  	});
  	markersMap.push(marker);

  	var html = "";
  	html += "<h5>"+markers[i].titre+"</h5>";
  	html += "<img width='150px' src='"+base_url+"assets/uploads/"+markers[i].image1+"' alt='"+markers[i].titre+"'>";
  	html += "<p></p><p>"+markers[i].adresse+","+markers[i].cp+" "+markers[i].ville+"</p>";
  	html += '<span class="btn-right"><a class="btn btn-primary text-upper" href="'+base_url+"restaurant/"+markers[i].id+'/'+encodeURI(escape(markers[i].titre.replace(/ /gi,"-")))+'" title="En savoir plus">En savoir plus</a></span>';
  	marker['infowindow'] = html;
	google.maps.event.addListener(markersMap[i], 'click', function() {
		infowindow.setContent(this['infowindow']);
		infowindow.open(map, this);
	});
}

//Ajout de la zone de délimitation à la carte
var monPolygone = new google.maps.Polygon({
	paths: tableauPointsPolygone,
	strokeColor: '#EE2588',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#696969',
    fillOpacity: 0.35
});

monPolygone.setMap(map);

var clusterStyles = [
	{
		textColor: 'white',
		anchor:[6,0],
		textSize: 18,
		url: base_url+"assets/images/cluster-map-icon.png",
		height: 50,
		width: 48
	},
	{
		textColor: 'white',
		anchor:[6,0],
		textSize: 18,
		url: base_url+"assets/images/cluster-map-icon.png",
		height: 50,
		width: 48
	},
	{
		textColor: 'white',
		anchor:[6,0],
		textSize: 18,
		url: base_url+"assets/images/cluster-map-icon.png",
		height: 50,
		width: 48
	}
];


var mcOptions = {gridSize: 50, maxZoom: 11,styles: clusterStyles};
var markerCluster = new MarkerClusterer(map, markersMap,mcOptions);


