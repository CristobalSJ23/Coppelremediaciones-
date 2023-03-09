$(document).ready(function() {
    var obj = {};
    $('.editar').click(function(){
        var id = $(this).data('id');
        var estatus = $('.estatus' + id).html();
        var nombre = $('.nombre' + id).html();
        var descripcion = $('.descripcion' + id).html();
        var url = $('.url' + id).html();
        var arquitecto = $('.arquitecto' + id).html();
        var programador = $('.programador' + id).html();
        var tester = $('.tester' + id).html();
        var gerente = $('.gerente' + id).html();
        var usuario = $('.usuario' + id).html();
        var jefeArea = $('.jefeArea' + id).html();
        var fechapdp = $('.fechapdp' + id).html();
        $(".editar_pdp_modal").modal("show");
        $('#estatus_sis').attr('value',estatus.trim());
        $('#nombre_aps').attr('value',nombre.trim());
        $('#descripcion_pdc').attr('value',descripcion.trim());
        $('#url_sis').attr('value',url.trim());
        $('#nombre_per_arq').attr('value',arquitecto.trim());
        $('#nombre_per_prog').attr('value',programador.trim());
        $('#nombre_per_tester').attr('value',tester.trim());
        $('#nombre_per_gerente').attr('value',gerente.trim());
        $('#nombre_per_usuario').attr('value',usuario.trim());
        $('#nombre_per_jefe_area').attr('value',jefeArea.trim());
        $('#fecha_pdp').val(fechapdp.trim().substring(0, 19));

        $.ajax({
            url: "../planpruebas/getEstatusNotas",
            type: "post",
            dataType: 'json',
            data: { idpdp: id }
        })
        .done(function(res){
            if(res.fecha_realizacion != null){
                $('#fecha_pruebas_pdp').val(res.fecha_realizacion.trim().substring(0, 19));
            }
            if(res.fecha_aprobacion != null){
                $('#fecha_aprobacion_pdp').val(res.fecha_aprobacion.trim().substring(0, 19));
            }
            $('#nueva_version_pdp').attr('value',res.nueva_version);
            $('#version_anterior_pdp').attr('value',res.version_anterior);
            $('#notas_asignacion_pdp').attr('value',res.notas);
            $('#resutado_pdp').val(res.resultado);
            $('#bitacora_pdp').val(res.bitacora);
            $('#version_historial_pdp').attr('value',res.version);
            $('.save_pdp').attr('data-id',id);
        });
    });

    $('.save_pdp').click(function(){
        var id = $(this).data('id');
        var datos = $('#formulario').serialize();
        datos+= "&id="+id;
        obj.url = '../planpruebas/update';
        obj.data = datos;
        obj.type = 'POST';
        obj.accion = 'update';

        peticionAjax(obj);
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
                    $("#formulario")[0].reset();
                    $('.editar_pdp_modal').modal("hide");
                    $('.mensaje_sistema').html(res);
                    $('.mensaje').addClass("bg-success");
                    $("#mensajeModal").modal("show");
                    break;
            }
        },
        error: function(xhr, estatus) {
            alert("error:"+estatus);
        }
    });


}