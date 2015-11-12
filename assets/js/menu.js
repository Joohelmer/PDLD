(function($, document, window){

    $(document).ready(function(){

        $(".menu-toggle").click(function(){
            $(".menu").slideToggle();
        });

        $("[data-bg-color]").each(function(){
            var color = $(this).data("bg-color");
            $(this).css("background-color",color);
        });
    });
})(jQuery, document, window);

$(document).ready(function(){

    $("#main-menu .dropdown").hover(
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');
        }
    );

});