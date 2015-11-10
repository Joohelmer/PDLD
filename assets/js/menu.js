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