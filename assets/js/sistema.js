$(document).ready(function() {
    var obj = {};
    $('.editar').click(function() {
        var id = $(this).data('id');
        var estatusCat = $('.estatusCat'+id).val();

        obj.url = '../sistema/updateSistema';
        obj.data = { idSistema: id, idEstatus: estatusCat};
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
                    $('.mensaje_sistema').html(res.res);
                    $("#mensajeModal").modal("show");
                    break;
            }
        },
        error: function(xhr, estatus) {

        }
    });


}
