/**** PARTIE POUR UN SEUL POINT *******/
function showMap(type,id){
    $.ajax({
        type: "POST",
        data: {
            type: type,
            id:id,
        },
        dataType: 'json',
        url: base_url+'home/showMap',
        success: function (data) {

            $('footer').after('<div class="overlayBG"></div>')   

            html = '<div class="fullMap">';
                html += '<div class="containerFullMap">';
                    html += '<div id="map-show"></div>';
                    html += '<ul class="infomapcontainer">';
                        html += '<li>';
                            html += '<p>'+data.infomap.nom+'</p>';
                        html += '</li>';
                        html += '<li>';
                            html += '<p data-filter="hotels" class="filter">Hôtel</p>';
                        html += '</li>';
                        html += '<li>';
                            html += '<p data-filter="activites" class="filter">Activités</p>';
                        html += '</li>';
                    html += '</ul>';
                html += '</div>';
                html += '<div class="close_FullMap"></div>';
            html += '</div>';


            $('.overlayBG').after(html);

            $("#map-show").height($(window).height()-40).width($(window).width());

            initializeMap(data.infomap, data.allinfos);
        }
    });
}
var infowindow = new google.maps.InfoWindow({});
var markersMap = [];
function initializeMap(infomap,allinfos) {
    var center = new google.maps.LatLng(infomap.latitude,infomap.longitude);
    var mapOptions = {
        center: center,
        zoom: 14,
        disableDefaultUI: true,
    };
    var map = new google.maps.Map(document.getElementById("map-show"), mapOptions);

    var marker = new google.maps.Marker({
        position: center,
        map: map,
        title: infomap.nom,
        category: "infomap",
    });

    markersMap.push(marker);
    
    marker['infowindow'] = infomap.nom;

    for (var i = 0; i < allinfos.length; i++) {

        var latLng = new google.maps.LatLng(allinfos[i].latitude,allinfos[i].longitude);

        var marker = new google.maps.Marker({
            position: latLng,
            map: map,
            title: allinfos[i].nom,
            category: "hotels",
        });

        markersMap.push(marker);
        marker['infowindow'] = allinfos[i].nom;

        google.maps.event.addListener(markersMap[i], 'click', function() {
            infowindow.setContent(this['infowindow']);
            infowindow.open(map, this);
        });
    }

    filterMarkers(markersMap,'infomap');

    $(window).on("resize", function() {
        $("#map-show").height($(window).height()-40).width($(window).width());
        map.setCenter(center);
    }).trigger("resize");

    $('.fullMap').on('click', '.close_FullMap', function (){
        $('.overlayBG').remove();
        $('.fullMap').remove();
    });

    $('.fullMap').on('click', '.filter', function (){
        $( this ).toggleClass( "clickedTag" );
        if ($(this).hasClass('clickedTag')){
            filterMarkers(markersMap,$( this ).data('filter'));
        }
        else {
            filterMarkers(markersMap,'infomap');
        }
        
    });
}

//Permet de filtrer les options sur la carte
function filterMarkers (markers,category) {
    for (i = 0; i < markers.length; i++) {
        marker = markersMap[i];
        if(marker.category == 'infomap'){
            marker.setVisible(true);
        }else{
           if (marker.category == category || category.length === 0) {
                marker.setVisible(true);
            }
            else {
                marker.setVisible(false);
            } 
        }       
    }
}