$(document).ready(function() {
    var obj = {};
    $('.editar').click(function() {
        var activo = '', inactivo = '';
        //$('.editar_rol').modal('show');
       var id = $(this).data('id');
       var color = $('.editar_estatus_' + id).data('color');
        /* alert(id); */
        var textHtml = $('.editar_nombre_' + id).html();
        var selectHtml = $('.editar_estatus_' + id).html();
        /* alert(textHtml); */
        $('.editar_estatus_' + id).removeClass(color);
        $('.editar_nombre_' + id).html('<input name="guardar_nombre_'+id+'" class="guardar_nombre_'+id+'" value="'+textHtml+'" />');
        if(selectHtml == 'ACTIVO') {
            activo = 'selected';
        } else {
            inactivo = 'selected';
        }
        $('.editar_estatus_' + id).html('<select name="guardar_estatus_'+id+'" class="guardar_estatus_'+id+'"> <option value="1" '+activo+'>ACTIVO</option><option value="0" '+inactivo+'>INACTIVO</option> </select>');
    
        $('.editar_acciones_' + id).hide();
        $('.editar_acciones_cancelar' + id).removeAttr('style');
    });

    $('.cancelar').click(function() {
        var id = $(this).data('id');
        var nombre = $(this).data('nombre');
        var estatus = $(this).data('estatus');
        var color = $(this).data('color');

        $('.editar_nombre_' + id).html(nombre);
        $('.editar_estatus_' + id).html(estatus);
        $('.editar_estatus_' + id).addClass(color);
        $('.editar_acciones_' + id).show();
        $('.editar_acciones_cancelar' + id).hide();
    });
    
    $('.save').click(function() {
        event.preventDefault();
        var id = $(this).data('id');
        var textHtml = $('.guardar_nombre_' + id).val();
        var selectHtml = $('.guardar_estatus_' + id).val();
      
        obj.url = '../rol/edit';
        obj.data = {id:id,nombre:textHtml,estatus:selectHtml};
        obj.type = 'POST';

        peticionAjax(obj);
    });

});

function peticionAjax(datos) {
    $.ajax({
        url:datos.url,
        data:datos.data,
        type:datos.type,
        dataType:'json',
        success:function(res) {

        },
        error:function(xhr, estatus) {

        }
    });
}

