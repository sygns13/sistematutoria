<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini">
<div id="app">
    <div class="wrapper">

    @include('adminlte::layouts.partials.mainheader')

    @include('adminlte::layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('adminlte::layouts.partials.contentheaderSemestre')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('adminlte::layouts.partials.controlsidebar')

    @include('adminlte::layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('adminlte::layouts.partials.scripts')
@show
<script type="text/javascript">
   
    $(function () {
      $("#tabla1").DataTable();

      $("#li1").removeClass('active');
      $("#li5").addClass('active');

    });

    $(document).ready(function() {

        $('#txtfechaini').datepicker({
      autoclose: true,
      language: 'es',
      format: 'dd/mm/yyyy',
      todayHighlight: true
          });

        $('#txtfechafin').datepicker({
      autoclose: true,
      language: 'es',
      format: 'dd/mm/yyyy',
      todayHighlight: true
          });

    $("#btnGuardarE").click(function(){

        var seme=$("#seme").val();
        var nom= $("#txtnombre").val();
        var feci=$("#txtfechaini").val();
        var fecf=$("#txtfechafin").val();


        $.get("semestres/editar/"+seme+"/"+nom+"/"+feci+"/"+fecf+"",function(response){
                
        //alert(response);         
        var res=$.parseJSON(response);  

        $("#cuerpoTable").html(res.html);   

        $('#modalEditar').modal('hide');  

                                                                                    
        });  

    });

        $("#btnGuardarN").click(function(){

        var seme=$("#seme").val();
        var nom= $("#txtnombre").val();
        var feci=$("#txtfechaini").val();
        var fecf=$("#txtfechafin").val();


        $.get("semestres/nuevo/"+seme+"/"+nom+"/"+feci+"/"+fecf+"",function(response){
                
        //alert(response);         
        var res=$.parseJSON(response);  

        $("#cuerpoTable").html(res.html);   

        $('#modalEditar').modal('hide');  

                                                                                    
        });  

    });

    $("#btnNuevo").click(function(){
        $.get("semestres/verificar/0",function(response){
                
        //alert(response);         
        var res=$.parseJSON(response);  

        if(res.seme=="0"){

        $("#seme").val("0");
        $("#mEditartitulo").html("Nuevo Semestre");
        $("#txtnombre").val("");
        $("#txtfechaini").val("");
        $("#txtfechafin").val("");
        $("#btnGuardarE").hide();
        $("#btnGuardarN").show();
        $('#modalEditar').modal();

        }

        if(res.seme=="1"){
            //alert("No se puede hay semesttres activos");

            swal({
              title: '',
              text: 'No se puede crear nuevos semestres porque existe un semestre activo',
              type: 'info',
              confirmButtonText: 'Aceptar'
            });
        }
                                                                                   
        });
    });



    });

    function editarSem(idSem){

        //alert(idSem);

        $.get("semestres/cargar/"+idSem+"",function(response){
                
        //alert(response);         
        var res=$.parseJSON(response);       
        $("#seme").val(res.seme);
        $("#mEditartitulo").html("Editar Semestre");
        $("#txtnombre").val(res.nom);
        $("#txtfechaini").val(res.fini);
        $("#txtfechafin").val(res.ffin);
        $("#btnGuardarE").show();
        $("#btnGuardarN").hide();
        $('#modalEditar').modal();
                                                                                    
        });  

       
        
    }

    function cerrarSem(idSem){

        swal({
  title: '¿Usted está seguro(a)?',
  text: "Cerrará el semestre seleccionado, este proceso no puede ser revertido",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Cancelar',
  confirmButtonText: 'Confirmar'
}).then(function () {
  
    $.get("semestres/cerrar/"+idSem+"",function(response){
        swal({
              title: '',
              text: 'El Semestre ha sido cerrado',
              type: 'success',
              confirmButtonText: 'Aceptar'
            });
                
        //alert(response);    
        var res=$.parseJSON(response);  

        $("#cuerpoTable").html(res.html);   

                                                                             
        }); 


})


    }

    function deleteSem(idSem) {
       // alert("delete");

               swal({
  title: '¿Usted está seguro(a)?',
  text: "Eliminará el semestre seleccionado, este proceso no puede ser revertido, Nota: Solo pueden ser eliminados semestres que no tengan registros de tutores, alumnos y procesos de la tutoría.",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Cancelar',
  confirmButtonText: 'Confirmar'
}).then(function () {
  
    $.get("semestres/delete/"+idSem+"",function(response){
        swal({
              title: '',
              text: 'El Semestre ha sido borrado',
              type: 'success',
              confirmButtonText: 'Aceptar'
            });
                
        //alert(response);    
        var res=$.parseJSON(response);  

        $("#cuerpoTable").html(res.html);   

                                                                             
        }); 


})
    }

    function noEscribe(e){
        var key = window.Event ? e.which : e.keyCode
        return (key==null);
    }





</script>  
</body>
</html>
