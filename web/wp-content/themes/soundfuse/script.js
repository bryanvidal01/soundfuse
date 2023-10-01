
$('.container-password img').click(function(){
   var el = $(this);
   var parent = el.parent();
   var inputSeleted = parent.find('input');

   if(inputSeleted.attr('type') == "password"){
       inputSeleted.attr('type', 'text');
   }else{
       inputSeleted.attr('type', 'password');
   }

});

$('.account-modify-cta').click(function(event){
    event.preventDefault();

    if($('.page-account').hasClass('visible')){
        $('.page-account').addClass('hide');
        $('.page-account').removeClass('visible');
        $('.modify-account').addClass('visible');
        $('.modify-account').removeClass('hide');
    }else{
        $('.modify-account').addClass('hide');
        $('.page-account').removeClass('hide');
        $('.page-account').addClass('visible');
    }
});

$('.list-tracks a').click(function(event){

    $('.on-load').fadeIn(200);

    event.preventDefault();
    var el = $(this);
    var link = el.attr('href');
    var title = el.data('title');
    var artists = el.data('artists');



    $.ajax({
        type : "POST",
        dataType : "json",
        url : link,
        data : {
            action: "sync_tracks",
            title: title,
            artists: artists
        },
        success: function(response) {
            //var json = $.parseJSON(response);
            var status = response.status;

            if(status === 201){
                $('.on-load').fadeOut(200);
                $('.track-add.success').fadeIn();
                setTimeout(function(){
                    $('.track-add.success').fadeOut();
                }, 1500);
            }else{
                $('.on-load').fadeOut(200);
                $('.track-add.error').fadeIn();
                setTimeout(function(){
                    $('.track-add.error').fadeOut();
                }, 1500);
            }
        }
    });



    /*$.get( link, function( data ) {

        $('.on-load').fadeOut(200);

        $('.track-add').fadeIn(100);

        setTimeout(function(){
            $('.track-add').fadeOut(100);
        }, 2000);
    });*/



});