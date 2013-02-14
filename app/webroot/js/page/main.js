
$('.carousel').carousel()

$(document).ready(function(){
    if(!Modernizr.csstransitions){
            $('#main_slider').on('slide', function(){
            $(this).find('.carousel-inner').hide();
        });
        $('#main_slider').on('slide', function(){
            $(this).find('.carousel-inner').slideLeft();
        });
    }
});


