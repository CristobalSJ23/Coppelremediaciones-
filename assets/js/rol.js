$(document).ready(function() {
    var obj = {};
    $('.editar').click(function() {
        var activo = '',
            inactivo = '';
        //$('.editar_rol').modal('show');
        var id = $(this).data('id');
        var color = $('.editar_estatus_' + id).data('color');
        /* alert(id); */
        var textHtml = $('.editar_nombre_' + id).html();
        var selectHtml = $('.editar_estatus_' + id).html();
        /* alert(textHtml); */
        $('.editar_estatus_' + id).removeClass(color);
        $('.editar_nombre_' + id).html('<input name="guardar_nombre_' + id + '" class="guardar_nombre_' + id + '" value="' + textHtml + '" />');
        if (selectHtml == 'ACTIVO') {
            activo = 'selected';
        } else {
            inactivo = 'selected';
        }
        $('.editar_estatus_' + id).html('<select name="guardar_estatus_' + id + '" class="guardar_estatus_' + id + '"> <option value="1" ' + activo + '>ACTIVO</option><option value="0" ' + inactivo + '>INACTIVO</option> </select>');

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
        if (textHtml != '') {
            obj.url = '../rol/edit';
            obj.data = { id: id, nombre: textHtml, estatus: selectHtml };
            obj.type = 'POST';
            obj.accion = 'update';

            peticionAjax(obj);
        } else {
            $('.mensaje_sistema').html('Favor de llenar el nombre del rol');
            $("#mensajeModal").modal("show");
        }
    });

    $('.crear-rol').click(function() {
        $('.crear_rol_modal').modal("show");

    });

    $('.save-rol').click(function() {
        event.preventDefault();
        var nombre = $('#imputNombre').val();
        var idSubmenus = [];
        var menu = $(this).data('menu');
        var datos = $(".frmGuardar").serialize();
            
        $("input[type=checkbox]:checked").each(function(){
            idSubmenus.push([menu,this.value]);
        });
      
        //var id = $(this).data('id');

        //console.log(idSubmenus);
        
        if (nombre != '') {
            obj.url = '../rol/save';
            obj.data = datos;
            obj.type = 'POST';
            obj.accion = 'save';

            peticionAjax(obj);
        } else {
            alert('No hay nombre');
        }
    });

    $('.abrir').click(function(){
        var id = $(this).data('id');        
        if($(this).prop("checked")){
            $('#flexCheckDefault'+id).attr("value", id);
            $('#flexCheckDefault'+id).attr("name", "checkMenu[]");
               
        }else{
            $('#flexCheckDefault'+id).removeAttr("value");
            $('#flexCheckDefault'+id).removeAttr("name");
            $('.menu_'+id).prop("checked", false);
        }

    });

    $('.selectSubMenu').click(function(){
        var id = $(this).data('id');
        if($(this).prop("checked")){
            $(this).attr("value",id);
            $(this).attr("name","checkSubMenu[]");
        }else{
            $(this).removeAttr("value");
            $(this).removeAttr("name");
        }
    });

    $('.cerrarModal').click(function(){
        $('.crear_rol_modal').modal("hide");
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
                    $("#mensajeModal").modal("show");
                    break;
                case "save":
                    $('.crear_rol_modal').modal("hide");
                    $('.mensaje_sistema').html(res.res);
                    $('.mensaje').addClass("bg-success");
                    $("#mensajeModal").modal("show");
                    $('#imputNombre').val('');
                    $('.abrir').click();
                    $('input[type=checkbox]').prop("checked", false);
                    break;
            }

        },
        error: function(xhr, estatus) {
        }
    });
}