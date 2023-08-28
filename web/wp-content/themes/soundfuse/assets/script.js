$('.list-tracks a').click(function(event){

    $('.on-load').fadeIn(200);

    event.preventDefault();
    var el = $(this);
    var link = el.attr('href');

    $.get( link, function( data ) {

        $('.on-load').fadeOut(200);

        $('.track-add').fadeIn(100);

        setTimeout(function(){
            $('.track-add').fadeOut(100);
        }, 2000);
    });
});