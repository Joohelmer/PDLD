$(document).ready(function(){

    if( window.location.href.indexOf('restaurant/index/edit/') >= 0 || window.location.href.indexOf('restaurant/index/add') >= 0 ){
	  
    	htmlbutton = '<input class="btn btn-large" type="button" onclick="GetLocation()" value="Trouver l\'adresse" />';
	    $('#cp_input_box').after(htmlbutton);
	    
	    html = '<div id="map-canvas" class="form-input-box"></div>';
	    html += '<div class="clear"></div>';
	    $('#cp_field_box .clear').after(html);


	  	GetLocation2();
	}


	$('#field_ville_chzn .chzn-results li').click(function(e) {
		$.ajax({
            type: "GET",
            data: {ville: $(this).text()},
            dataType: 'json',
            url: base_url+'ajaxadmin/getCpbyVille',
            success: function (data) {
                $("#field-cp").val(data.ville.cp);
            }
        });
	});

});

    function GetLocation() {
        var geocoder = new google.maps.Geocoder();
        var adr = $("#field-adresse").val()+' '+$("#field-cp").val()+' '+$("#field-ville").val();
        geocoder.geocode({ 'address': adr }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var latitude = results[0].geometry.location.lat();
                var longitude = results[0].geometry.location.lng();
                
                $('#field-latitude').val(latitude);
                $('#field-longitude').val(longitude);
                markerGoogleMapVerification(latitude, longitude);
            } else {
                alert("Veuillez rentrer une adresse.")
            }
        });
    };


    function GetLocation2() {
        markerGoogleMapVerification($('#field-latitude').val(), $('#field-longitude').val());
    };


	var carte;
	function initialiser() {
		var latlng = new google.maps.LatLng(44.933682, 4.892351);
		//objet contenant des propriétés avec des identificateurs prédéfinis dans Google Maps permettant
		//de définir des options d'affichage de notre carte
		var options = {
			center: latlng,
			zoom: 9,
			mapTypeId: google.maps.MapTypeId.ROADMAP,    
		};
		
		//constructeur de la carte qui prend en paramêtre le conteneur HTML
		//dans lequel la carte doit s'afficher et les options
		carte = new google.maps.Map(document.getElementById("map-canvas"), options);

	}

	function listenerGoogleMap(marker, iw){
	    google.maps.event.addListener(marker,'click',function() {
	      iw.open(carte,marker);
	   });
	}

	function markerGoogleMapVerification(latitude, longitude)
	{
	    
	    initialiser();
	    var marker = new google.maps.Marker(null);

	    if(latitude > 0 && longitude > 0)
	    {
	        var latLng = new google.maps.LatLng(latitude, longitude);
	        var marker = new google.maps.Marker({
	            position : latLng,
	            map      : carte,
	        });
	        carte.setZoom(12);
	        carte.setCenter(latLng);
	    }
	}

