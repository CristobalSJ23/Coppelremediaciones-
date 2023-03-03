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
        var nombreLeng = $('.language' + id).val();
        var lenguaje = $('.recuperarNombre' +nombreLeng).data("nombreleng");

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
        $('.nombreLeng' + id).html(lenguaje);
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

    $(".eliminar").click(function(){
        var id = $(this).data('id');
        $(".eliminarFila"+id).hide();
        obj.url = '../puntoscambio/delete';
        obj.data = {
            id: id
        };

        obj.type = 'POST';
        obj.accion = 'delete';

        peticionAjax(obj);
    });

    $(".guardarPalabra").click(function(){
        event.preventDefault();
        var palabra = $("#palabra").val();
        var datos = $("#formPalabra").serialize();
        

        if(palabra == ''){
            $('.mensaje_sistema').html('El campo palabra no puede estar vacio');
            $('.mensaje').addClass("bg-warning");
            $('#mensajeModal').modal('show');
            exit();
        }

        obj.url = '../puntoscambio/savePalabra';
        obj.data = datos;
        obj.type = 'POST';
        obj.accion = 'savePalabra';

        $('#formPalabra')[0].reset();

        peticionAjax(obj);


    });

    $(".guardarLenguaje").click(function(){
        event.preventDefault();
        var lenguaje = $("#lenguaje").val();
        var lenguajeExt = $("#lenguajeExtension").val();
        if(lenguaje == ''){
            $('.mensaje_sistema').html('El campo lenguaje no puede estar vacio');
            $('.mensaje').addClass("bg-warning");
            $('#mensajeModal').modal('show');
            exit();
        }
        if(lenguajeExt == ''){
            $('.mensaje_sistema').html('El campo de extension no puede estar vacio');
            $('.mensaje').addClass("bg-warning");
            $('#mensajeModal').modal('show');
            exit();
        }

        obj.url = '../puntoscambio/saveLanguage';
        obj.data = {
            lenguaje: lenguaje,
            lenguajeExtension: lenguajeExt
        };
        obj.type = 'POST';
        obj.accion = 'saveLanguage';

        peticionAjax(obj);
    });

    $(".agregarNuevo").click(function(){
        $(".crearModal").modal("show");
    });

    $('.cerrarModal').click(function(){
        $('.crearModal').modal("hide");
    });

    $("#formzip").on("submit",function(e){
        e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("#formzip"));
        $.ajax({
            url: "../puntoscambio/leerZip",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

        })
        .done(function(res){
            alert ("hola");
        });
    });
    
});

function peticionAjax(datos) {
    $.ajax({
        url: datos.url,
        data: datos.data,
        cache: false,
        type: datos.type,
        contentType: false,
        processData: false,      
        dataType: 'json',
        success: function(res) {
            switch (datos.accion) {
                case "savePalabra":
                    $('.mensaje_sistema').html(res);
                    $("#mensajeModal").modal("show");
                    
                    
                                      
                    break;    

                case "saveLanguage":
                    $('.mensaje_sistema').html(res);
                    $("#mensajeModal").modal("show");
                    
                break;

                case "update":
                    $('.mensaje_sistema').html(res.res);
                    $("#mensajeModal").modal("show");

                    break;

                case "delete":
                    $('.mensaje_sistema').html(res);
                    $("#mensajeModal").modal("show");
                    break;

                case "crearSelect":
                    var crearSelect = '';
                    crearSelect += '<select class="form-select language'+datos.idtd+'" aria-label="Default select example">';
                    $.each(res.id, function(key,data){
                        if(Number(data) == Number(datos.idLeng)){
                            crearSelect += '<option value="'+data+'" class="recuperarNombre'+data+'" data-nombreleng="'+res.nombre[key]+'" selected>'+res.nombre[key]+'</option>'; 
                        }else{
                            crearSelect += '<option value="'+data+'" class="recuperarNombre'+data+'" data-nombreleng="'+res.nombre[key]+'" >'+res.nombre[key]+'</option>';
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