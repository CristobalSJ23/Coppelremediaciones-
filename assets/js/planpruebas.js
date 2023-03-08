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
         $('#fecha_pdp').val(fechapdp.trim());

     });
});