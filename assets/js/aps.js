$(document).ready(function(){
    $('.editar').click(function(){
        var activo = '', inactivo = '';
        var id = $(this).data('id');
        var htmlNombre = $(".nombreAps" + id).html();
        var htmlEstatus = $(".estatusAps" + id).html();
        var color = $(".estatusAps" + id).data('color');

        $('.nombreAps'+id).html('<input name="editarNombre' + id + '" class="editarNombre' + id + '" value ="' + htmlNombre + '"/>');
        $('.estatusAps'+id).html('<input name="editarEstatus' + id + '" class= "editarEstatus' + id + '" value = "' + htmlEstatus + '"/>');
        $('.estatusAps'+id).removeClass(color);
        
        if(htmlEstatus == 'ACTIVO'){
            activo = 'selected';
        }else{
            inactivo = 'selected';
        }

        $('.estatusAps'+id).html('<select name="guardarEstatus' + id + '" class="guardarEstatus' + id + '"> <option value="1" ' + activo + '>ACTIVO</option><option value="0" ' + inactivo + '>INACTIVO</option></select>');
        $('.editar_acciones_'+id).hide();
        $('.editar_acciones_cancelar_'+id).removeAttr('style');
    });
    $('.cancelar').click(function(){
        var id = $(this).data('id');
        var htmlNombre = $(this).data('nombre');
        //var htmlEstatus = $(".estatusAps"+id).html();
        var htmlEstatus = $(this).data('estatus');
        var color = $(this).data('color');

        $('.nombreAps'+id).html(htmlNombre);
        $('.estatusAps'+id).html(htmlEstatus);
        $('.estatusAps'+id).addClass(color);
        $('.editar_acciones_'+id).show();
        $('.editar_acciones_cancelar_'+id).hide();
    });
    
});