$(document).ready(function() {
    $('.editar').click(function(){
        var id = $(this).data('id');
        var palabra = $('.nombrePal'+id).html();
        var lenguaje = $('.nombreLeng'+id).html();
        
        
        $('.nombrePal'+id).html('<input name="editarNombrePal' + id + '" class="editarNombrepal'+ id +'" value = "' + palabra +  '" />');
        $('.nombreLeng'+id).html('<input name="editarNombreLeng' + id + '" class= "editarNombreLeng'+ id +'" value = "' + lenguaje + '"/>');

        $('.editar'+id).hide();
        $('.eliminar'+id).hide();

        $('.save'+id).show();
        $('.cancelar'+id).show();

        $('.editar_acciones_'+id).hide();
        $('.editar_acciones_cancelar'+id).removeAttr('style');
    });
    $('.cancelar').click(function(){
        var id = $(this).data('id');
        var nombre = $(this).data('nombre');
        var lenguaje = $(this).data('lenguaje');

        $('.nombrePal'+id).html(nombre);
        $('.nombreLeng'+id).html(lenguaje);

        $('.editar'+id).show();
        $('.eliminar'+id).show();

        $('.save'+id).hide();
        $('.cancelar'+id).hide();

    });
});