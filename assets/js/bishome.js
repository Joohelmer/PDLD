$('.bxslider').bxSlider({
    mode: 'fade',
    hideControlOnEnd: true,
    controls:false,
    pager:false,
    auto: true,
    speed:800,
    options:'fade'
});

/*$(window).load(function(){
    $('.carousel').flexslider({
        animation: "fade",
        animationLoop: true,
        controlNav: false,
        maxItems: 1,
        pausePlay: false,
        mousewheel:false,
        start: function(slider){
            $('body').removeClass('loading');
        }
    });
});*/

//Fonction Recherche et Autocomplétion
$(function() {


    $('.search-panel .dropdown-menu').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        var concept = $(this).text();
        $('.search-panel span#search_concept').text(concept);
        $('.input-group #search_param').val(param);
    });


    $( "#recherche" ).autocomplete({
        minLength: 3,
        source : function(requete, reponse){ // la fonction anonyme permet de maintenir une requête AJAX directement dans le plugin
            $.ajax({
                url : base_url+"elasticriver/autocomplete/", // on appelle le script JSON
                dataType : 'json', // on spécifie bien que le type de données est en JSON
                method: "GET",
                data : {
                    recherche : $('#recherche').val(), // on donne la chaîne de caractère tapée dans le champ de recherche
                    type: $('#search_param').val(),
                },
                success : function(donnee){
                    reponse(donnee.recherche);
                }
            });
        },
        open: function(event, ui) {
            $('.ui-autocomplete').append('<li><a class="more_results" href="'+base_url+'recherche?query='+encodeURIComponent(event.target.value)+'">Voir tous les résultats pour « '+event.target.value+' » </a></li>'); //See all results
        }
    }).autocomplete("instance")._renderItem = function (ul, item) {
        var item = item._source;
        var re = new RegExp( "(" + this.term + ")", "gi" ),
                cls = "is-highlight",
                template = "<span class='" + cls + "'>$1</span>",
                label = item.titre.replace( re, template ),
                $li = $( "<li/>" ).appendTo( ul );
        var html = "<figure class='autocomplete-figure'><img src='"+base_url+"/assets/uploads/"+item.image+"' width='120' /></figure><div class='autocomplete-info'> "+ label + "</div>";

        $( "<a/>" ).attr( "href", item.url )
                   .html(html)
                   .attr("title",item.titre)
                   .attr("class","autocomplete-action")
                   .appendTo( $li ); 
        return $li;
    };

    $('#recherche').bind("keyup keypress", function(e) {
        var code = e.keyCode || e.which; 
        if (code  == 13) {    
            if($(this).val()==''){
                e.preventDefault();
                return false;
            }
        }
    });

    $('.confirmsearch .btn').bind("click", function(e) {
        if($('#recherche').val()==''){
            e.preventDefault();
            return false;
        }
    });

});

