$(document).ready(function(){
    var obj = {};
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

    $('.save').click(function() {
        event.preventDefault();
        var id = $(this).data('id');
        var nombre = $('.editarNombre' + id).val();
        var estatus = $('.guardarEstatus'+ id).val();

        //alert(id, estatus);

        if(nombre != '') {
            obj.url = '../aps/edit';
            obj.data = {id:id, nombre: nombre, estatus: estatus};
            obj.type = 'POST';
            obj.accion = 'update';
            $(".nombreAps"+id).html(nombre);
            if(estatus==1){
                $(".estatusAps"+id).html("ACTIVO");
                $(".estatusAps"+id).addClass("bg-success");
            }else{
                $(".estatusAps"+id).html("INACTIVO");
                $(".estatusAps"+id).addClass("bg-warning");

            }
            $('.editar_acciones_'+id).show();
            $('.editar_acciones_cancelar_'+id).hide();
            peticionAjax(obj);
        } else {
            $('.mensaje_sistema').html('Favor de llenar el nombre');
            $("#mensajeModal").modal("show");
        }
    });

    $('.eliminar').click(function(){
        var id = $(this).data('id');
        obj.url = '../aps/delete';
            obj.data = {idAps: id};
            obj.type = 'POST';
            obj.accion = 'delete';
            obj.id = id;
        peticionAjax(obj);
    });

    $(".agregarNuevo").click(function(){
        $(".crearModal").modal("show");
    });

    $(".saveModal").click(function(){
        event.preventDefault();
        var nombre = $('#imputNombre').val();
        var datos = $(".frmGuardar").serialize();
        if (nombre != ''){
            obj.url = '../aps/save';
            obj.data = datos;
            obj.type = 'POST';
            obj.accion = 'save';

            peticionAjax(obj);
        } else {
            alert('No hay nombre');
        }
    });

    $('.cerrarModal').click(function(){
        $('.crearModal').modal("hide");
    });
    
});



function peticionAjax(datos) {
    $.ajax({
        url: datos.url,
        data: datos.data,
        type: datos.type,
        dataType: 'json',
        success: function(res) {
            switch (datos.accion) {
                case "update":
                    $('.mensaje_sistema').html(res.res);
                    $('.mensaje').addClass("bg-success");
                    $("#mensajeModal").modal("show");
                    break;
                case "save":
                    $(".frmGuardar")[0].reset();
                    $('.crearModal').modal("hide");
                    $('.mensaje_sistema').html(res.res);
                    $('.mensaje').addClass("bg-success");
                    $("#mensajeModal").modal("show");  
                    console.log(res.res);
                    
                    break;
                case "delete":
                    $('.estatusAps' + datos.id).removeClass("bg-success");
                    $('.estatusAps' + datos.id).addClass("bg-warning");
                    $('.estatusAps' + datos.id).html("INACTIVO");
                   
                break;
            }

        },
        error: function(xhr, estatus) {
        }
    });


}