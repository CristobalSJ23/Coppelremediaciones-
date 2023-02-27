$(document).ready(function() {

    $('.editar').click(function() {
        var activo = '',
            inactivo = '';


        var id = $(this).data('id');
        var htmlNombre = $('.editar_nombre_' + id).html();
        var htmlPaterno = $('.apt_pat' + id).html();
        var htmlMat = $('.apt_mat' + id).html();
        var htmltipoUsuario = $('.tipo_usuario' + id).html();
        var htmlCorreo = $('.correo' + id).html();
        var htmlfechaReg = $('.fecha_reg' + id).html();
        var htmleditarEstatus = $('.editar_estatus_' + id).html();

        var color = $('.editar_estatus_' + id).data('color');

        $('.editar_nombre_' + id).html('<input name="editarNombre' + id + '" class="editarNombre' + id + '" value="' + htmlNombre + '"/>');
        $('.apt_pat' + id).html('<input name="aptPat' + id + '" class="aptPat' + id + '" value="' + htmlPaterno + '"/>');
        $('.apt_mat' + id).html('<input name="aptMat' + id + '" class="aptMat' + id + '" value="' + htmlMat + '"/>');
        $('.tipo_usuario' + id).html('<input name="tipoUsuario' + id + '" class="tipoUsuario' + id + '" value="' + htmltipoUsuario + '"/>');
        $('.correo' + id).html('<input name="correo' + id + '" class="correo_editar' + id + '" value="' + htmlCorreo + '"/>');
        $('.editar_estatus_' + id).html('<input name="editarEstatus' + id + '" class="editarEstatus' + id + '" value="' + htmleditarEstatus + '"/>');

        $('.editar_estatus_' + id).removeClass(color);

        if (htmleditarEstatus == 'ACTIVO') {
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
        var htmlNombre = $(this).data('nombre');
        var htmlPaterno = $(this).data('paterno');
        var htmlMat = $(this).data('materno');
        var htmltipoUsuario = $(this).data('tipousuario');

        var htmlCorreo = $(this).data('correo');
        var htmleditarEstatus = $(this).data('estatus');
        var color = $(this).data('color');

        $('.editar_nombre_' + id).html(htmlNombre);
        $('.apt_pat' + id).html(htmlPaterno);
        $('.apt_mat' + id).html(htmlMat);
        $('.tipo_usuario' + id).html(htmltipoUsuario);
        $('.tipo_usuario1').html("Hola");
        $('.correo' + id).html(htmlCorreo);
        $('.editar_estatus_' + id).html(htmleditarEstatus);
        $('.editar_estatus_' + id).addClass(color);
        $('.editar_acciones_' + id).show();
        $('.editar_acciones_cancelar' + id).hide();
    });

    $('.save').click(function() {
        var id = $(this).data('id');
        var html_nombre = $('.editarNombre' + id).val();
        var html_pat = $('.aptPat' + id).val();
        var html_mat = $('.aptMat' + id).val();
        var html_us = $('.tipoUsuario' + id).val();
        var html_correo = $('.correo_editar' + id).val();
        var html_estatus = $('.guarda_estatus_' + id).val();


        $('.correo' + id).blur();

        if (html_nombre == '') {
            $('.mensaje_sistema').html('El campo nombre no puede estar vacio');
            $('.mensaje').addClass("bg-warning");
            $('#mensajeModal').modal('show');
            exit();
        }

        if (html_pat == '') {
            $('.mensaje_sistema').html('El campo apellido paterno no puede estar vacio');
            $('.mensaje').addClass("bg-warning");
            $('#mensajeModal').modal('show');
            exit();
        }

        if (html_mat == '') {
            $('.mensaje_sistema').html('El campo apellido materno no puede estar vacio');
            $('.mensaje').addClass("bg-warning");
            $('#mensajeModal').modal('show');
            exit();
        }

        if (html_us == '') {
            $('.mensaje_sistema').html('El campo usuario no puede estar vacio');
            $('.mensaje').addClass("bg-warning");
            $('#mensajeModal').modal('show');
            exit();
        }

        if (html_correo == '') {
            $('.mensaje_sistema').html('El campo correo no puede estar vacio');
            $('.mensaje').addClass("bg-warning");
            $('#mensajeModal').modal('show');

            exit();
        }

        var obj = {};
        obj.url = '../users/save';
        obj.data = {
            id: id,
            nombre: html_nombre,
            html_pat: html_pat,
            html_mat: html_mat,
            html_us: html_us,
            html_correo: html_correo,
            html_estatus: html_estatus
        };

        obj.type = 'POST';
        obj.accion = 'update';

        peticionAjax(obj);



    })

    function peticionAjax(datos) {
        $.ajax({
            url: datos.url,
            data: datos.data,
            type: datos.type,
            dataType: 'json',
            success: function(res) {
                switch (datos.accion) {
                    case "save":
                        $('.mensaje_sistema').html(res.res);
                        $("#mensajeModal").modal("show");
                        break;

                    case "update":
                        break;

                    case "delete":
                        break;
                }
            },
            error: function(xhr, estatus) {

            }
        });


    }



});