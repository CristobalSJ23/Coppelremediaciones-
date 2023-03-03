$(document).ready(function() {

    var obj ={};

    $('.editar').click(function(){
        var id = $(this).data('id');
        var idLeng = $(this).data('idlenguaje');
        var palabra = $('.nombrePal'+id).html();
        var lenguaje = $('.nombreLeng'+id).html();
        
        
        $('.nombrePal'+id).html('<input name="editarNombrePal' + id + '" class="editarNombrepal'+ id +'" value = "' + palabra +  '" />');
        //$('.nombreLeng'+id).html('<input name="editarNombreLeng' + id + '" class= "editarNombreLeng'+ id +'" value = "' + lenguaje + '"/>');

        $('.editar'+id).hide();
        $('.eliminar'+id).hide();

        $('.save'+id).show();
        $('.cancelar'+id).show();

        $('.editar_acciones_'+id).hide();
        $('.editar_acciones_cancelar'+id).removeAttr('style');

        obj.idLeng = idLeng;
        obj.idtd = id;
        obj.url = '../puntoscambio/crearSelect';
        obj.data = {
        };

        obj.type = 'POST';
        obj.accion = 'crearSelect';

        peticionAjax(obj);
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

    $('.save').click(function(){
        var id = $(this).data('id');
        var nombrePal = $('.editarNombrepal' + id).val();
        var nombreLeng = $('.editarNombreLeng' + id).val();

        if(nombrePal == ''){
            $('.mensaje_sistema').html('El campo palabra no puede estar vacio');
            $('.mensaje').addClass("bg-warning");
            $('#mensajeModal').modal('show');
            exit();
        }
        if(nombreLeng == ''){
            $('.mensaje_sistema').html('El campo lenguaje no puede estar vacio');
            $('.mensaje').addClass("bg-warning");
            $('#mensajeModal').modal('show');
            exit();
        }

        $('.nombrePal' + id).html(nombrePal);
        $('.nombreLeng' + id).html(nombreLeng);
        $('.save' + id).hide();
        $('.cancelar' + id).hide();
        $('.editar' + id).show();
        $('.eliminar' + id).show();

        obj.url = '../puntoscambio/update';
        obj.data = {
            id: id,
            nombre_pal: nombrePal,
            nombre_leng: nombreLeng
        };

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
                case "save":
                                      
                    break;

                case "update":
                    $('.mensaje_sistema').html(res.res);
                    $("#mensajeModal").modal("show");

                    break;

                case "delete":
                    break;

                case "crearSelect":
                    var crearSelect = '';
                    crearSelect += '<select class="form-select" aria-label="Default select example">';
                    $.each(res.id, function(key,data){
                        if(Number(data) == Number(datos.idLeng)){
                            crearSelect += '<option value="'+data+'" selected>'+res.nombre[key]+'</option>'; 
                        }else{
                            crearSelect += '<option value="'+data+'">'+res.nombre[key]+'</option>';
                        }
                    });
                    crearSelect += '</select>';
                    $('.nombreLeng'+datos.idtd).html(crearSelect);
                    break;
            }
        },
        error: function(xhr, estatus) {

        }
    });


}