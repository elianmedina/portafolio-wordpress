jQuery(function($){
    $('.mpp-cat-btn').on('click', function(){
        $('.mpp-cat-btn').removeClass('active');
        $(this).addClass('active');
        let cat = $(this).data('cat');
        $('#mpp-contenedor-proyectos').fadeTo(180, 0.3);

        $.post(mppFiltro.ajaxurl, {
            action: 'mpp_filtrar_proyectos',
            cat: cat
        }, function(data){
            $('#mpp-contenedor-proyectos').html(data).fadeTo(200, 1);
        });
    });
});
