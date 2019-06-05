<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">

<?php $__env->startSection('htmlheader'); ?>
    <?php echo $__env->make('adminlte::layouts.partials.htmlheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldSection(); ?>

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

    <?php echo $__env->make('adminlte::layouts.partials.mainheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('adminlte::layouts.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <?php echo $__env->make('adminlte::layouts.partials.contentheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            <?php echo $__env->yieldContent('main-content'); ?>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <?php echo $__env->make('adminlte::layouts.partials.controlsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('adminlte::layouts.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div><!-- ./wrapper -->
</div>
<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('adminlte::layouts.partials.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldSection(); ?>
<script type="text/javascript">
    //alert("prueba");

<?php if(accesoUser([3])): ?>

function homePerfil() {
  window.location.href = "home";
}

function Myperfil() {
  var token=$("#tokenLaravel").val();

  var token=$("#tokenLaravel").val();
  $.post("tutors/Myperfil", {  _token:token })
  .done(function(data) {


    $("#panelPrincipal").empty();
    $("#panelPrincipal").html(data.view);
    $("#menuBajar3").hide();


  });

}


function SaveCalifSesion() {
   swal({
  title: '¿Estás seguro?',
  text: "Confirma registrar la calificación de esta sesión",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Confirmar'
}).then(function () {

      SaveCalifSesionC();
})
}

function SaveCalifSesionC() {
  var calif=$("#cbuCalifSesion").val();
  var motivo=$("#txtContenidoCalif").val();

  if(calif=="0")
  {
            swal({
              title: '',
              text: 'Ingrese una Calificación válida para la sesión',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#cbuCalifSesion").focus();
        }else{
           if(motivo.length==0)
              {
            swal({
              title: '',
              text: 'Ingrese una descripción válida como sustento de la calificación',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#txtContenidoCalif").focus();
        }else{

          var token=$("#tokenLaravel").val();

          var idS=$("#txtidSesion").val();
          var idTA=$("#txtidTA").val();


     $("#btnCalifSesion").attr('disabled', true);
     $("#btnLimCalifSesion").attr('disabled', true);
     $('#dcarga0').show();


     $.post("HomeController/saveCalifSesion", {v1:idS, v2:idTA, v3:calif, v4:motivo,   _token:token}).done(function(data) {

      $("#btnCalifSesion").removeAttr("disabled");
      $("#btnLimCalifSesion").removeAttr("disabled");
      $('#dcarga0').hide();

      if(data.html=="0"){

   
        $("#divEval01").show('slow');
        $("#divEval02").empty();
                $("#divtablaEval").empty();
                 $("#divtablaEval").html(data.view);
        $("#divtablaEval").show('slow');


      swal({
                      title: '',
                      text: 'Se Registró correctamente su calificación de la tarea',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

                  }
      else{
          swal({
          title: 'Error',
          text: 'No se pudo registrar su calificación, error',
          type: 'error',
          confirmButtonText: 'Aceptar'
        });
      }







        });
        
        }

        }
}






function califSesion(idSesion, titulo) {
     var token=$("#tokenLaravel").val();

    $.post("HomeController/califSesion", { idS:idSesion, _token:token })
  .done(function(data) {


    $("#divEval01").hide('slow');
    $("#divtablaEval").hide('slow');

    $("#divEval02").html(data.view);

    });
}

function SaveParticipacionC() {
  
  var motivo=$("#txtContenidoC").val();


           if(motivo.length==0)
              {
            swal({
              title: '',
              text: 'Ingrese una descripción válida del motivo de la cancelación de la sesión',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#txtContenidoC").focus();
        }else{

          var token=$("#tokenLaravel").val();

          var idTA=$("#txtidTA").val();
          var idS=$("#txtidSesion").val();


     $("#btnCancelSesion").attr('disabled', true);
     $("#btnLimCancelSesion").attr('disabled', true);
     $('#dcarga0').show();


     $.post("HomeController/saveCancelSesion", {v1:idS, v2:idTA, v3:motivo,   _token:token}).done(function(data) {

      $("#btnCancelSesion").removeAttr("disabled");
      $("#btnLimCancelSesion").removeAttr("disabled");
      $('#dcarga0').hide();

      if(data.html=="0"){

   
        $("#divEval01").show('slow');
        $("#divEval02").empty();
                $("#divtablaEval").empty();
                 $("#divtablaEval").html(data.view);
        $("#divtablaEval").show('slow');


      swal({
                      title: '',
                      text: 'Se Registró correctamente la cancelación de la Sesión',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

                  }
      else{
          swal({
          title: 'Error',
          text: 'No se pudo registrar la cancelación de la sesión, error',
          type: 'error',
          confirmButtonText: 'Aceptar'
        });
      }







        });
        
        }
}


function SaveParticipacion() {
   swal({
  title: '¿Estás seguro?',
  text: "Confirma cancelar esta Sesión",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Confirmar'
}).then(function () {

      SaveParticipacionC();
})
}


function limpiarCancelSesion() {

  $("#txtContenidoC").val("");

  

  $("#btnCancelSesion").removeAttr("disabled");
  $("#btnLimCancelSesion").removeAttr("disabled");

  $("#txtContenidoC").focus();
}

function cancelarSesion(idSesion, titulo) {
  var token=$("#tokenLaravel").val();

    $.post("HomeController/cancelSesion", { idS:idSesion, _token:token })
  .done(function(data) {


    $("#divEval01").hide('slow');
    $("#divtablaEval").hide('slow');

    $("#divEval02").html(data.view);

    /*$("#tabla2").DataTable();
    $("#tituloEval").empty();
    $("#tituloEval").html("Editar Evaluación: "+titulo);*/

  });
}
function SaveCalifTarea() {
   swal({
  title: '¿Estás seguro?',
  text: "Confirma registrar la calificación de esta tarea",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Confirmar'
}).then(function () {

      SaveCalifTareaC();
})
}

function SaveCalifTareaC() {
  var calif=$("#cbuCalifTarea").val();
  var motivo=$("#txtContenidoCalif").val();

  if(calif=="0")
  {
            swal({
              title: '',
              text: 'Ingrese una Calificación válida para la tarea',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#cbuCalifTarea").focus();
        }else{
           if(motivo.length==0)
              {
            swal({
              title: '',
              text: 'Ingrese una descripción válida como sustento de la calificación',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#txtContenidoCalif").focus();
        }else{

          var token=$("#tokenLaravel").val();

          var idT=$("#txtidTarea").val();
          var idTA=$("#txtidTA").val();


     $("#btnCalifTarea").attr('disabled', true);
     $("#btnLimTarea").attr('disabled', true);
     $('#dcarga0').show();


     $.post("HomeController/saveCalifTarea", {v1:idT, v2:idTA, v3:calif, v4:motivo,   _token:token}).done(function(data) {

      $("#btnCalifTarea").removeAttr("disabled");
      $("#btnLimTarea").removeAttr("disabled");
      $('#dcarga0').hide();

      if(data.html=="0"){

   
        $("#divEval01").show('slow');
        $("#divEval02").empty();
                $("#divtablaEval").empty();
                 $("#divtablaEval").html(data.view);
        $("#divtablaEval").show('slow');


      swal({
                      title: '',
                      text: 'Se Registró correctamente su calificación de la tarea',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

                  }
      else{
          swal({
          title: 'Error',
          text: 'No se pudo registrar su calificación, error',
          type: 'error',
          confirmButtonText: 'Aceptar'
        });
      }







        });
        
        }

        }
}

function limpiarcalifTarea() {
  $("#cbuCalifTarea").val(0);
  $("#txtContenidoCalif").val("");

  

  $("#btnCalifTarea").removeAttr("disabled");
  $("#btnLimTarea").removeAttr("disabled");

  $("#cbuCalifTarea").focus();
}

function califTarea(idTarea, titulo) {
  var token=$("#tokenLaravel").val();

    $.post("HomeController/califTarea", { idT:idTarea, _token:token })
  .done(function(data) {


    $("#divEval01").hide('slow');
    $("#divtablaEval").hide('slow');

    $("#divEval02").html(data.view);

    /*$("#tabla2").DataTable();
    $("#tituloEval").empty();
    $("#tituloEval").html("Editar Evaluación: "+titulo);*/

  });
}
function registrarSesionEditC() {
    var idTA=$("#txtidTA").val();
    var idS=$("#txtidSesion").val();
    var idDiag=$("#cbsEvalDiagE").val();

    var titulo=$("#txtAsuntoE").val();
    var fechaSesion=$("#txtFechaSesionE").val();
    var tipoSesion=$("#cbsTipoSesionE").val();
    var horaSesion=$("#txthoraSesionE").val();

    var contenido=CKEDITOR.instances['txtContenidoE'].getData();

 
        if(titulo.length==0){
            swal({
              title: '',
              text: 'Ingrese un Título válido para el Comunicado de la Sesión',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#txtAsuntoE").focus();
        }else{
            if(fechaSesion.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese la fecha de la sesión',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#txtFechaSesionE").focus();
            }else{
              if(horaSesion.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese la hora de la sesión',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#txthoraSesionE").focus();
            }else{

              if(contenido.length==0){
                swal({
                      title: '',
                      text: 'Ingrese los Detalles de la Sesión',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#txtContenidoE").focus();
              }
                else{
                  if(idDiag=="0"){
                swal({
                      title: '',
                      text: 'No cuenta con una Evaluación con Diagnóstico para ser base de la sesión, seleccione una evaluación válida',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#cbsEvalDiagE").focus();
              }
                else{

              $('#dcarga2').show();
                
                $("#btnEditSesion").attr('disabled', true);
                var token=$("#tokenLaravel").val();

                $.post("HomeController/saveSesionEdit", { titulo:titulo, fechaSesion:fechaSesion, tipoSesion:tipoSesion, horaSesion:horaSesion, contenido:contenido, idTA:idTA, idDiag:idDiag, idS:idS,  _token:token })
                .done(function(data) {

                  $("#btnEditSesion").removeAttr("disabled");
                  $('#dcarga2').hide();

                  if(data.aux=="1"){
                      homeSesion();
                        $("#divTable").empty();
                        $("#divTable").html(data.view);


                    swal({
                      title: '',
                      text: 'Se modificó correctamente el comunicado de sesión',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });
                    limpiarSesion();
                  }
                  else{
                      swal({
                      title: 'error',
                      text: 'No se pudo modificar la sesión, '+data.html,
                      type: 'error',
                      confirmButtonText: 'Aceptar'
                    });
                      $("#"+data.selector).focus();
                  }

                  
                  


                });
              }
              }
            }
          }
        }
}


function registrarSesionEdit() {
   swal({
  title: '¿Estás seguro?',
  text: "Confirma modificar esta Sesión",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Confirmar'
}).then(function () {

      registrarSesionEditC();
})
 
}


function limpiarSesionEdit() {
 
  $("#btnEditSesion").removeAttr("disabled");
  $('#dcarga2').hide();
   $("#txtAsuntoE").focus();
   changeEtaLim();
}
function homeSesion() {
  $("#divEval02").empty();
  $("#divEval01").show('slow');
    $("#divtablaEval").show('slow');
}

function editarSesion(id,titulo) {

  
    var token=$("#tokenLaravel").val();

    $.post("HomeController/editarSesion", { idS:id, _token:token })
  .done(function(data) {


    $("#divEval01").hide('slow');
    $("#divtablaEval").hide('slow');

    $("#divEval02").html(data.view);

    $("#tituloEval").empty();
    $("#tituloEval").html("Editar Sesión: "+titulo);

  });




  }


function editarTareaSave() {
   swal({
  title: '¿Estás seguro?',
  text: "Confirma modificar esta tarea",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Confirmar'
}).then(function () {

      editarTareaSaveC();
})
 
}

function editarTareaSaveC() {
    var idTA=$("#txtidTA").val();
    var idT=$("#txtidTarea").val();

    var idDiag=$("#cbsEvalDiagE").val();

    var titulo=$("#txtAsuntoE").val();
    var fechaEntrega=$("#txtfechEntregaE").val();

    var contenido=CKEDITOR.instances['txtContenidoE'].getData();

 
        if(titulo.length==0){
            swal({
              title: '',
              text: 'Ingrese un Título válido para la tarea',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#txtAsuntoE").focus();
        }else{
            if(fechaEntrega.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese la fecha de entrega de la tarea',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#txtfechEntregaE").focus();
            }else{

              if(contenido.length==0){
                swal({
                      title: '',
                      text: 'Ingrese la descripción de la tarea',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#txtContenidoE").focus();
              }
                else{
                  if(idDiag=="0"){
                swal({
                      title: '',
                      text: 'No cuenta con una Evaluación con Diagnóstico para ser base de la tarea, seleccione una evaluación válida',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#cbsEvalDiagE").focus();
              }
                else{

              $('#dcarga2').show();
                
                $("#btnEditTarea").attr('disabled', true);
                var token=$("#tokenLaravel").val();

                $.post("HomeController/saveTareaEdit", { titulo:titulo, fechaEntrega:fechaEntrega, contenido:contenido, idTA:idTA, idDiag:idDiag,idT:idT,  _token:token })
                .done(function(data) {

                  $("#btnEditTarea").removeAttr("disabled");
                  $('#dcarga0').hide();

                  if(data.aux=="1"){
                        homeTarea();
                        $("#divTable").empty();
                        $("#divTable").html(data.view);


                    swal({
                      title: '',
                      text: 'Se registró y envió al alumno correctamente la tarea',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

                  }
                  else{
                      swal({
                      title: 'error',
                      text: 'No se pudo modificar la tarea, error',
                      type: 'error',
                      confirmButtonText: 'Aceptar'
                    });
                  }

                  
                  


                });
              }
              }
            }
        }
}


function changeEta2()
{
    var idEta=$("#cbsEtapaE").val();
    var idTA=$("#txtidTA").val();
     var token=$("#tokenLaravel").val();
     $.post("HomeController/cargarEvalsTarea", { v1:idEta, v2:idTA, _token:token })
  .done(function(data) {


    $("#cbsEvalDiagE").empty();
    $("#cbsEvalDiagE").html(data.view);


  });


}

function changeEtaLim()
{
    var idEta=$("#txtidEta").val();
    $("#cbsEtapaE").val(idEta);
    var idTA=$("#txtidTA").val();
     var token=$("#tokenLaravel").val();
     $.post("HomeController/cargarEvalsTarea", { v1:idEta, v2:idTA, _token:token })
  .done(function(data) {


    $("#cbsEvalDiagE").empty();
    $("#cbsEvalDiagE").html(data.view);
     $("#cbsEvalDiagE").val();


  });


}
function limpiarEditTarea() {
 
  $("#btnEditTarea").removeAttr("disabled");
  $('#dcarga2').hide();
   $("#txtAsuntoE").focus();
   changeEtaLim();
}
function homeTarea() {
  $("#divEval02").empty();
  $("#divEval01").show('slow');
    $("#divtablaEval").show('slow');
}
function editarTarea(id,titulo) {

  
    var token=$("#tokenLaravel").val();

    $.post("HomeController/editarTarea", { idT:id, _token:token })
  .done(function(data) {


    $("#divEval01").hide('slow');
    $("#divtablaEval").hide('slow');

    $("#divEval02").html(data.view);

    $("#tituloEval").empty();
    $("#tituloEval").html("Editar Tarea: "+titulo);

  });




  }
  


function eliminarSesion(idS,titulo)
{
     swal({
  title: '¿Estás seguro?',
  text: "Desea eliminar la Sesión: "+titulo+".",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminar'
}).then(function () {

    var token=$("#tokenLaravel").val();
    var idTA=$("#txtidTA").val();


    $.post( "HomeController/destroySesion", {idS:idS,idTA:idTA , _token:token}).done(function(data) {

        if(data.aux=="1")
        {
            
                $("#divTable").empty();
                 $("#divTable").html(data.view);
                swal({
                      title: 'Éxito',
                      text: data.msj,
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

        }

        if(data.aux=="0")
        {
            swal({
                      title: 'No se eliminó',
                      text: data.msj,
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });

        }

                


  });


})
}

function eliminarTarea(idT,titulo)
{
     swal({
  title: '¿Estás seguro?',
  text: "Desea eliminar la Tarea: "+titulo+".",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminar'
}).then(function () {

    var token=$("#tokenLaravel").val();
    var idTA=$("#txtidTA").val();


    $.post( "HomeController/destroyTarea", {idT:idT,idTA:idTA , _token:token}).done(function(data) {

        if(data.aux=="1")
        {
            
                $("#divTable").empty();
                 $("#divTable").html(data.view);
                swal({
                      title: 'Éxito',
                      text: data.msj,
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

        }

        if(data.aux=="0")
        {
            swal({
                      title: 'No se eliminó',
                      text: data.msj,
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });

        }

                


  });


})
}


function verMasSesion(idS,titulo)
{

  var token=$("#tokenLaravel").val();


 $.post("HomeController/verMasSesion", {idS:idS, titulo:titulo, _token:token}).done(function(data) {

      var titulo=data.titulo;
      var alumno=data.alumno;
      var etapa=data.etapa;
      var fecha=data.fecha;

      $("#desEvalTitulo").empty();
      $("#desEvalTitulo").html('SESIÓN COMUNICADA AL ALUMNO');
      $("#divtituloEvalImp").empty();
      $('#divtituloEvalImp').html(titulo);

      $("#divalumnoEvalImp").empty();
      $('#divalumnoEvalImp').html('Alumno: '+alumno);

      $("#divFecImp").empty();
      $('#divFecImp').html(fecha);

      $("#divEtapaImp").empty();
      $('#divEtapaImp').html('Etapa: '+etapa);

      $("#divCuerpoEvalImp").empty();
      $("#divCuerpoEvalImp").html(data.view);



   $('#modalImpEvaluacions').modal();     


  });


 
}

function verMasTarea(idT,titulo)
{

  var token=$("#tokenLaravel").val();


 $.post("HomeController/vermasTarea", {idT:idT, titulo:titulo, _token:token}).done(function(data) {

      var titulo=data.titulo;
      var alumno=data.alumno;
      var etapa=data.etapa;
      var fecha=data.fecha;

      $("#desEvalTitulo").empty();
      $("#desEvalTitulo").html('TAREA ENVIADA AL ALUMNO');
      $("#divtituloEvalImp").empty();
      $('#divtituloEvalImp').html(titulo);

      $("#divalumnoEvalImp").empty();
      $('#divalumnoEvalImp').html('Alumno: '+alumno);

      $("#divFecImp").empty();
      $('#divFecImp').html(fecha);

      $("#divEtapaImp").empty();
      $('#divEtapaImp').html('Etapa: '+etapa);

      $("#divCuerpoEvalImp").empty();
      $("#divCuerpoEvalImp").html(data.view);



   $('#modalImpEvaluacions').modal();     


  });


 
}


function registrarSesion() {
   swal({
  title: '¿Estás seguro?',
  text: "Confirma registrar y enviar el comunicado de esta Sesión al Alumno",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Confirmar'
}).then(function () {

      registrarSesionC();
})
 
}

function registrarSesionC() {
    var idTA=$("#txtidTA").val();
    var idDiag=$("#cbsEvalDiag").val();

    var titulo=$("#txtAsunto").val();
    var fechaSesion=$("#txtFechaSesion").val();
    var tipoSesion=$("#cbsTipoSesion").val();
    var horaSesion=$("#txthoraSesion").val();

    var contenido=CKEDITOR.instances['txtContenido'].getData();

 
        if(titulo.length==0){
            swal({
              title: '',
              text: 'Ingrese un Título válido para el Comunicado de la Sesión',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#txtAsunto").focus();
        }else{
            if(fechaSesion.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese la fecha de la sesión',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#txtFechaSesion").focus();
            }else{
              if(horaSesion.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese la hora de la sesión',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#txthoraSesion").focus();
            }else{

              if(contenido.length==0){
                swal({
                      title: '',
                      text: 'Ingrese los Detalles de la Sesión',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#txtContenido").focus();
              }
                else{
                  if(idDiag=="0"){
                swal({
                      title: '',
                      text: 'No cuenta con una Evaluación con Diagnóstico para ser base de la sesión, seleccione una evaluación válida',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#cbsEvalDiag").focus();
              }
                else{

              $('#dcarga0').show();
                
                $("#btnSaveSesion").attr('disabled', true);
                var token=$("#tokenLaravel").val();

                $.post("HomeController/saveSesion", { titulo:titulo, fechaSesion:fechaSesion, tipoSesion:tipoSesion, horaSesion:horaSesion, contenido:contenido, idTA:idTA, idDiag:idDiag,  _token:token })
                .done(function(data) {

                  $("#btnSaveSesion").removeAttr("disabled");
                  $('#dcarga0').hide();

                  if(data.aux=="1"){

                        $("#divTable").empty();
                        $("#divTable").html(data.view);


                    swal({
                      title: '',
                      text: 'Se registró y envió al alumno correctamente el comunicado de sesión',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });
                    limpiarSesion();
                  }
                  else{
                      swal({
                      title: 'error',
                      text: 'No se pudo registrar la sesión, '+data.html,
                      type: 'error',
                      confirmButtonText: 'Aceptar'
                    });
                      $("#"+data.selector).focus();
                  }

                  
                  


                });
              }
              }
            }
          }
        }
}


function registrartarea() {
   swal({
  title: '¿Estás seguro?',
  text: "Confirma registrar y enviar esta tarea al alumno",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Confirmar'
}).then(function () {

      registrartareaC();
})
 
}

function registrartareaC() {
    var idTA=$("#txtidTA").val();
    var idDiag=$("#cbsEvalDiag").val();

    var titulo=$("#txtAsunto").val();
    var fechaEntrega=$("#txtfechEntrega").val();

    var contenido=CKEDITOR.instances['txtContenido'].getData();

 
        if(titulo.length==0){
            swal({
              title: '',
              text: 'Ingrese un Título válido para la tarea',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#txtAsunto").focus();
        }else{
            if(fechaEntrega.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese la fecha de entrega de la tarea',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#txtfechEntrega").focus();
            }else{

              if(contenido.length==0){
                swal({
                      title: '',
                      text: 'Ingrese la descripción de la tarea',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#txtContenido").focus();
              }
                else{
                  if(idDiag=="0"){
                swal({
                      title: '',
                      text: 'No cuenta con una Evaluación con Diagnóstico para ser base de la tarea, seleccione una evaluación válida',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#cbsEvalDiag").focus();
              }
                else{

              $('#dcarga0').show();
                
                $("#btnSaveTarea").attr('disabled', true);
                var token=$("#tokenLaravel").val();

                $.post("HomeController/saveTarea", { titulo:titulo, fechaEntrega:fechaEntrega, contenido:contenido, idTA:idTA, idDiag:idDiag,  _token:token })
                .done(function(data) {

                  $("#btnSaveTarea").removeAttr("disabled");
                  $('#dcarga0').hide();

                  if(data.aux=="1"){

                        $("#divTable").empty();
                        $("#divTable").html(data.view);


                    swal({
                      title: '',
                      text: 'Se registró y envió al alumno correctamente la tarea',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

                  }
                  else{
                      swal({
                      title: 'error',
                      text: 'No se pudo registrar la tarea, error',
                      type: 'error',
                      confirmButtonText: 'Aceptar'
                    });
                  }

                  limpiartarea();
                  


                });
              }
              }
            }
        }
}

function limpiarSesion() {
  $("#txtAsunto").val("");
  $("#txtFechaSesion").val("");
  $("#cbsTipoSesion").val(1);
  $("#txthoraSesion").val("");

  CKEDITOR.instances['txtContenido'].setData("");

 
  $("#btnSaveSesion").removeAttr("disabled");
  $('#dcarga0').hide();
   $("#txtAsunto").focus();
   $('#cbsEtapa option[value=1]').prop('selected', 'selected').change();
}

function limpiartarea() {
  $("#txtAsunto").val("");
  $("#txtfechEntrega").val("");


  CKEDITOR.instances['txtContenido'].setData("");

 
  $("#btnSaveTarea").removeAttr("disabled");
  $('#dcarga0').hide();
   $("#txtAsunto").focus();
   $('#cbsEtapa option[value=1]').prop('selected', 'selected').change();
}

function changeEta()
{
    var idEta=$("#cbsEtapa").val();
    var idTA=$("#txtidTA").val();
     var token=$("#tokenLaravel").val();
     $.post("HomeController/cargarEvalsTarea", { v1:idEta, v2:idTA, _token:token })
  .done(function(data) {


    $("#cbsEvalDiag").empty();
    $("#cbsEvalDiag").html(data.view);


  });


}

function nuevaSesion(v1,v2,v3,v4) {
    var token=$("#tokenLaravel").val();
  $.post("HomeController/cargarSesion", { idP: v1, idA: v2, idU:v3, idTA:v4, _token:token })
  .done(function(data) {


    $("#panelPrincipal").empty();
    $("#panelPrincipal").html(data.view);

    $("#divTable").empty();
    $("#divTable").html(data.view1);


    $("#txtAsunto").focus();

  });
}

function nuevaTarea(v1,v2,v3,v4) {
    var token=$("#tokenLaravel").val();
  $.post("HomeController/cargarTarea", { idP: v1, idA: v2, idU:v3, idTA:v4, _token:token })
  .done(function(data) {


    $("#panelPrincipal").empty();
    $("#panelPrincipal").html(data.view);

    $("#divTable").empty();
    $("#divTable").html(data.view1);


    $("#txtAsunto").focus();

  });
}

function SaveEditDiagnost() {
   swal({
  title: '¿Estás seguro?',
  text: "Confirma modificar el Diagnóstico del Alumno",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Confirmar'
}).then(function () {

      SaveEditDiagnostC();
})
 
}

function SaveEditDiagnostC() {
    //alert('dale');

    var txtTitulo=$("#txtAsuntoD").val();
    var idTA=$("#txtidTA").val();
    var idDiag=$("#txtidDiag").val();
    var txtContenido=CKEDITOR.instances['txtContenido'].getData();

    var idE=$("#txtidEval").val();


        if(txtTitulo.length==0){
            swal({
              title: '',
              text: 'Ingrese un Título o Asunto válido para el Diagnóstico',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#txtAsuntoD").focus();
        }else{
            if(txtContenido.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese el contenido del diagnóstico',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#txtContenido").focus();
            }else{

              $('#dcarga0').show();
                
                $("#btnRegDiag").attr('disabled', true);
                var token=$("#tokenLaravel").val();

                $.post("HomeController/saveDiagEdit", { txtTitulo:txtTitulo, txtContenido:txtContenido, idE:idE, idTA:idTA, idDiag:idDiag,   _token:token })
                .done(function(data) {

                  $("#btnRegDiag").removeAttr("disabled");
                  $('#dcarga0').hide();

                  if(data.html=="0"){

   
                  $("#divEval01").show('slow');
                  $("#divEval02").empty();
                  $("#divtablaEval").empty();
                  $("#divtablaEval").html(data.view);
                  $("#divtablaEval").show('slow');


                swal({
                                title: '',
                                text: 'Se Modificó el Diagnóstico exitosamente',
                                type: 'success',
                                confirmButtonText: 'Aceptar'
                              });

                            }
                else{
                    swal({
                    title: 'Error',
                    text: 'No se pudo registrar su diagnóstico, error',
                    type: 'error',
                    confirmButtonText: 'Aceptar'
                  });
                }


                });

            }
        }
}


function editDiagnosticoEval(id, titulo) {
  var token=$("#tokenLaravel").val();

    $.post("HomeController/editdiagnosticarEval", { idE:id, _token:token })
  .done(function(data) {


    $("#divEval01").hide('slow');
    $("#divtablaEval").hide('slow');

    $("#divEval02").html(data.view);

    /*$("#tabla2").DataTable();
    $("#tituloEval").empty();
    $("#tituloEval").html("Editar Evaluación: "+titulo);*/

  });
}
function SaveDiagnost() {
   swal({
  title: '¿Estás seguro?',
  text: "Confirma registrar el Diagnóstico del Alumno",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Confirmar'
}).then(function () {

      SaveDiagnostC();
})
 
}


function SaveDiagnostC() {
    //alert('dale');

    var txtTitulo=$("#txtAsuntoD").val();
    var idTA=$("#txtidTA").val();
    var txtContenido=CKEDITOR.instances['txtContenido'].getData();

    var idE=$("#txtidEval").val();


        if(txtTitulo.length==0){
            swal({
              title: '',
              text: 'Ingrese un Título o Asunto válido para el Diagnóstico',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#txtAsuntoD").focus();
        }else{
            if(txtContenido.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese el contenido del diagnóstico',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#txtContenido").focus();
            }else{

              $('#dcarga0').show();
                
                $("#btnRegDiag").attr('disabled', true);
                var token=$("#tokenLaravel").val();

                $.post("HomeController/saveDiag", { txtTitulo:txtTitulo, txtContenido:txtContenido, idE:idE, idTA:idTA,  _token:token })
                .done(function(data) {

                  $("#btnRegDiag").removeAttr("disabled");
                  $('#dcarga0').hide();

                  if(data.html=="0"){

   
                  $("#divEval01").show('slow');
                  $("#divEval02").empty();
                  $("#divtablaEval").empty();
                  $("#divtablaEval").html(data.view);
                  $("#divtablaEval").show('slow');


                swal({
                                title: '',
                                text: 'Se Registró su Diagnóstico exitosamente',
                                type: 'success',
                                confirmButtonText: 'Aceptar'
                              });

                            }
                else{
                    swal({
                    title: 'Error',
                    text: 'No se pudo registrar su diagnóstico, error',
                    type: 'error',
                    confirmButtonText: 'Aceptar'
                  });
                }


                });

            }
        }
}
function LimpiarDiagnost() {
  $("#txtAsuntoD").val("");
  CKEDITOR.instances['txtContenido'].setData("");

 
  $("#btnRegDiag").removeAttr("disabled");
  $('#dcarga0').hide();
   $("#txtAsuntoD").focus();
}

function verPregs() {
  $( "#divContentPregs" ).toggle('slow');
  var aux=$("#ctrolBtnPregs").val();

  if(aux=="0")
  {
    $("#ctrolBtnPregs").val("1");
    $("#btnVerPregs").empty();
    $("#btnVerPregs").html('<i class="fa fa-eye-slash" aria-hidden="true" ></i> Ocultar las Preguntas y Respuestas de la Evaluación');
    $("#btnVerPregs").removeClass("btn btn-success");
    $("#btnVerPregs").addClass( "btn bg-navy color-palette" );
  }
 else
  {
    $("#ctrolBtnPregs").val("0");
    $("#btnVerPregs").empty();
    $("#btnVerPregs").html('<i class="fa fa-eye" aria-hidden="true" ></i> Ver las Preguntas y Respuestas de la Evaluación');
    $("#btnVerPregs").removeClass( "btn bg-navy color-palette" );
    $("#btnVerPregs").addClass("btn btn-success");
  }
}

function diagnosticarEval(id, titulo) {
    var token=$("#tokenLaravel").val();

    $.post("HomeController/diagnosticarEval", { idE:id, _token:token })
  .done(function(data) {


    $("#divEval01").hide('slow');
    $("#divtablaEval").hide('slow');

    $("#divEval02").html(data.view);

    /*$("#tabla2").DataTable();
    $("#tituloEval").empty();
    $("#tituloEval").html("Editar Evaluación: "+titulo);*/

  });

}

function SaveCalif() {
   swal({
  title: '¿Estás seguro?',
  text: "Confirma Registrar la Calificación a la Evaluación",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Confirmar'
}).then(function () {

      SaveCalifC();
})
 
}


function SaveCalifC() {


  var aux="0";
  var calif="0";

  var idRespCalif="0";

var auxCalif = [];
var idResp = [];
var auxcont=0;
var cadena="";
var cantD="";
var finCadD="";

  $(".cbsResp").each(function(index, el) {
    calif= $(this).val();

    idRespCalif = $(this).attr("id");
    cantD=idRespCalif.length;
    finCadD=idRespCalif.substring(9,cantD);

    idResp[auxcont]=finCadD;

    //console.log(finCadD);

    auxCalif[auxcont]=calif;
    //console.log(resp);
    auxcont++;

    if(calif=="0"){
      aux="1";
      cadena=cadena+", "+(index+1);
    }

  //console.log(aux);
  //console.log(aux.length);

  });

  if(aux=="1"){
     swal({
          title: '',
          text: 'No se enviaron sus respeustas, debe calificar todas las respuestas, Complete la(s) calificación(es) de la(s) pregunta(s): '+cadena,
          type: 'warning',
          confirmButtonText: 'Aceptar'
        });
  }
  else{

    var array1 = JSON.stringify(idResp);
     var array2 = JSON.stringify(auxCalif);

     var token=$("#tokenLaravel").val();
     $("#btnResponderEval").attr('disabled', true);
     $("#btnLimRespEval").attr('disabled', true);
     $('#dcarga0').show();

     var idEvaluacion=$("#txtidEval").val();

     $.post("HomeController/savecalifEval", {v1:idEvaluacion, v2:array1, v3:array2,    _token:token}).done(function(data) {

      $("#btnResponderEval").removeAttr("disabled");
      $("#btnLimRespEval").removeAttr("disabled");
      $('#dcarga0').hide();

      if(data.html=="0"){

   
        $("#divEval01").show('slow');
        $("#divEval02").empty();
                $("#divtablaEval").empty();
                 $("#divtablaEval").html(data.view);
        $("#divtablaEval").show('slow');


      swal({
                      title: '',
                      text: 'Se Registraron Correctamente sus Calificaciones de las Respuestas',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

                  }
      else{
          swal({
          title: 'Error',
          text: 'No se pudieron registrar sus Calificaciones de las respuestas, error',
          type: 'error',
          confirmButtonText: 'Aceptar'
        });
      }







        });



  }

}



function limpiarEval() {
  $(".cbsResp:first").focus();
}

function homeEvaluacion() {
  $("#divEval01").show('slow');
    $("#divtablaEval").show('slow');

    $("#divEval02").empty();
}


function califEval(id, titulo) {
    var token=$("#tokenLaravel").val();

    $.post("HomeController/califEval", { idE:id, _token:token })
  .done(function(data) {


    $("#divEval01").hide('slow');
    $("#divtablaEval").hide('slow');

    $("#divEval02").html(data.view);

    /*$("#tabla2").DataTable();
    $("#tituloEval").empty();
    $("#tituloEval").html("Editar Evaluación: "+titulo);*/

  });

}


function Paso2EvalE() {
  var nFilas = $("#cuerpoTable2 tr").length;

            if(nFilas==0){

              swal({
              title: '',
              text: 'No se puede registrar ni enviar la evaluación al alumno debido a que no se ha consignado preguntas',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
  
}
else{

      swal({
  title: '¿Estás seguro?',
  text: "Confirma modificar esta evaluación al alumno",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Confirmar'
}).then(function () {

      modificarEval();
})
 
}
}

function modificarEval() {
    var idta=$("#txtidTA").val();
    var ideta=$("#cbsEtapaE").val();
    var titulo=$("#txtAsuntoE").val();

    var idEval=$("#txtidEval").val();

    var idPregs = [];
    var idDimNewPreg = [];
    var newpreg = [];
     var cont=0;
     var cont2=0;

    $(".filaPregs").each(function(index, el) {
      var idFila = $(this).attr("id");
      var cantD=idFila.length;
      var finCadD=idFila.substring(7,cantD);
      

      idPregs[cont]=finCadD;

      if(finCadD=='0'){
        var idDim = $(this).attr("data-id");
        var preg = $(this).attr("data-preg");

        idDimNewPreg[cont2]=idDim;
        newpreg[cont2]=preg;

        //console.log(preg);
        cont2++;
      }
      

      cont++;
      
    })

     var array1 = JSON.stringify(idPregs);
     var array2 = JSON.stringify(idDimNewPreg);
     var array3 = JSON.stringify(newpreg);
     var token=$("#tokenLaravel").val();
     $("#btnmodificarEval").attr('disabled', true);
     $('#dcarga2').show();

     $.post("HomeController/editEval", {v1:idta, v2:ideta, v3:titulo,  v4:array1, v5:array2, v6:array3, v7:idEval,    _token:token}).done(function(data) {

      $("#btnmodificarEval").removeAttr("disabled");
      $('#dcarga2').hide();

      if(data.html=="0"){

    $("#divtablaEval").empty();
    $("#divEval02").empty();
    $("#divEval01").show('slow');
    $("#divtablaEval").html(data.view1);
    $("#divtablaEval").show('slow');

    

    $("#txtAsunto").val("");
    $("#txtAsunto").focus();


      swal({
                      title: '',
                      text: 'Se Modificó Correctamente la Evaluación',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

                  }
      else{
          swal({
          title: 'error',
          text: 'No se pudo editar el informe, error',
          type: 'error',
          confirmButtonText: 'Aceptar'
        });
      }




        // alertify.success('Datos de Configuración de Renta de Quinta categoría Actualizados exitosamente');




        });



}



function imprimirEval02E()
{

  var titulo=$("#txtAsuntoE").val();
  var alumno=$("#txtAlum").val();
  var etapa=$("#cbsEtapaE option:selected").text();
  var fecha=$("#txtfechaEval").val();


      $("#divtituloEvalImp").empty();
      $('#divtituloEvalImp').html(titulo);

      $("#divalumnoEvalImp").empty();
      $('#divalumnoEvalImp').html('Alumno: '+alumno);

      $("#divFecImp").empty();
      $('#divFecImp').html(fecha);

      $("#divEtapaImp").empty();
      $('#divEtapaImp').html('Etapa: '+etapa);

      imprimirPreguntas("tabla3");

          $('#modalImpEvaluacions').modal(); 

       // imprimirEval();      





 
}


function editarEval(id,titulo) {

  
    var token=$("#tokenLaravel").val();

    $.post("HomeController/editarEval", { idE:id, _token:token })
  .done(function(data) {


    $("#divEval01").hide('slow');
    $("#divtablaEval").hide('slow');

    $("#divEval02").html(data.view);

    $("#tabla2").DataTable();
    $("#tituloEval").empty();
    $("#tituloEval").html("Editar Evaluación: "+titulo);

  });




  }
  







function eliminarEvaluacion(idE,titulo)
{
     swal({
  title: '¿Estás seguro?',
  text: "Desea eliminar la Evaluación: "+titulo+".",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminar'
}).then(function () {

    var token=$("#tokenLaravel").val();
    var idTA=$("#txtidTA").val();


    $.post( "HomeController/destroyEval", {idE:idE,idTA:idTA , _token:token}).done(function(data) {

        if(data.aux=="1")
        {
            
                $("#divtablaEval").empty();
                 $("#divtablaEval").html(data.view1);
                swal({
                      title: 'Éxito',
                      text: data.msj,
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

        }

        if(data.aux=="0")
        {
            swal({
                      title: 'No se eliminó',
                      text: data.msj,
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });

        }

                


  });


})
}




function Paso2Eval() {
  var nFilas = $("#cuerpoTable2 tr").length;

            if(nFilas==0){

              swal({
              title: '',
              text: 'No se puede registrar ni enviar la evaluación al alumno debido a que no se ha consignado preguntas',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
  
}
else{

      swal({
  title: '¿Estás seguro?',
  text: "Confirma registrar y enviar esta evaluación al alumno",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Confirmar'
}).then(function () {

      registrarEval();
})
 
}
}

function vermasEval(idE,titulo)
{

  var token=$("#tokenLaravel").val();


 $.post("HomeController/vermasEval", {idE:idE, titulo:titulo, _token:token}).done(function(data) {

      var titulo=data.titulo;
      var alumno=data.alumno;
      var etapa=data.etapa;
      var fecha=data.fecha;

      $("#desEvalTitulo").empty();
      $("#desEvalTitulo").html('EVALUACIÓN AL ALUMNO');
      $("#divtituloEvalImp").empty();
      $('#divtituloEvalImp').html(titulo);

      $("#divalumnoEvalImp").empty();
      $('#divalumnoEvalImp').html('Alumno: '+alumno);

      $("#divFecImp").empty();
      $('#divFecImp').html(fecha);

      $("#divEtapaImp").empty();
      $('#divEtapaImp').html('Etapa: '+etapa);

      $("#divCuerpoEvalImp").empty();
      $("#divCuerpoEvalImp").html(data.view);



   $('#modalImpEvaluacions').modal();     


  });


 
}



function imprimirEval()
{
  $("#divEval").printArea();
}


function imprimirEval02()
{

  var titulo=$("#txtAsunto").val();
  var alumno=$("#txtAlum").val();
  var etapa=$("#txtetapanom").val();
  var fecha=$("#txtfechaEval").val();


      $("#divtituloEvalImp").empty();
      $('#divtituloEvalImp').html(titulo);

      $("#divalumnoEvalImp").empty();
      $('#divalumnoEvalImp').html('Alumno: '+alumno);

      $("#divFecImp").empty();
      $('#divFecImp').html(fecha);

      $("#divEtapaImp").empty();
      $('#divEtapaImp').html('Etapa: '+etapa);

      imprimirPreguntas("tabla3");

          $('#modalImpEvaluacions').modal(); 

       // imprimirEval();      





 
}

function imprimirPreguntas(idtb){

    $("#divCuerpoEvalImp").empty();

    var num="";
    var preg="";
    var dimen="";
    var nFilas ="";    

        $("#"+idtb+" tbody tr").each(function (index)
        {

            $(this).children("td").each(function (index2)
            {
               if(index2==0){
                   num=$(this).text();
               }
               if(index2==1){
                   preg=$(this).text();
               }
               if(index2==2){
                   dimen=$(this).text();
               }


            })
            nFilas = $("#divCuerpoEvalImp p").length;

            if(nFilas==0){
  $('#divCuerpoEvalImp').html('<p>'+num+'.- '+preg+'</p>');
}
else{
  $('#divCuerpoEvalImp p:last').after('<p>'+num+'.- '+preg+'</p>');
}


        })
        
  }



function goEval01() {
  $("#divEval01").show('slow');
    $("#divtablaEval").show('slow');

    $("#divEval02").empty();
}

function agreNewpregunta() {
  var preg=$("#txtnewPreg").val();

  if(preg.length==0){
    swal({
              title: '',
              text: 'Ingrese el contenido de la pregunta',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
    $("#txtnewPreg").focus();
  }
  else{
    var verificar=verifPreguntaNueva("tabla3",String(preg));
    var dimen=$("#cbsDimension option:selected").text();
    var iddimen=$("#cbsDimension").val();
    var nFilas = $("#cuerpoTable2 tr").length;

    if(verificar==0)
{
  if(nFilas==0){
  $('#cuerpoTable2').html('<tr class="filaPregs" id="idPreg-0" data-id="'+iddimen+'" data-preg="'+preg+'"><td>Num</td><td>'+preg+'</td><td>'+dimen+'</td><td class="colPlanilla"><center><buttton class="btn btn-sm btn-danger" onclick="quitarPreg(this,0)"><i class="fa fa-times" aria-hidden="true"></i></buttton></center></td></tr>');
}
else{
  $('#cuerpoTable2 tr:last').after('<tr class="filaPregs" id="idPreg-0" data-id="'+iddimen+'" data-preg="'+preg+'"><td>Num</td><td>'+preg+'</td><td>'+dimen+'</td><td class="colPlanilla"><center><buttton class="btn btn-sm btn-danger" onclick="quitarPreg(this,0)"><i class="fa fa-times" aria-hidden="true"></i></buttton></center></td></tr>');
}


 recorrertb("tabla3");
 $("#txtnewPreg").val("");
 $("#txtnewPreg").focus();
}
else{
  swal({
              title: '',
              text: 'Esta pregunta ya ha sido añadida a la evaluación',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });

  $("#txtnewPreg").focus();
}

  }
}

function registrarEval() {
    var idta=$("#txtidTA").val();
    var ideta=$("#cbsEtapa").val();
    var titulo=$("#txtAsunto").val();

    var idPregs = [];
    var idDimNewPreg = [];
    var newpreg = [];
     var cont=0;
     var cont2=0;

    $(".filaPregs").each(function(index, el) {
      var idFila = $(this).attr("id");
      var cantD=idFila.length;
      var finCadD=idFila.substring(7,cantD);
      

      idPregs[cont]=finCadD;

      if(finCadD=='0'){
        var idDim = $(this).attr("data-id");
        var preg = $(this).attr("data-preg");

        idDimNewPreg[cont2]=idDim;
        newpreg[cont2]=preg;

        //console.log(preg);
        cont2++;
      }
      

      cont++;
      
    })

     var array1 = JSON.stringify(idPregs);
     var array2 = JSON.stringify(idDimNewPreg);
     var array3 = JSON.stringify(newpreg);
     var token=$("#tokenLaravel").val();
     $("#btnRegistrarEval").attr('disabled', true);
     $('#divCarga2').show();

     $.post("HomeController/saveEval", {v1:idta, v2:ideta, v3:titulo,  v4:array1, v5:array2, v6:array3,    _token:token}).done(function(data) {

      $("#btnRegistrarEval").removeAttr("disabled");
      $('#divCarga2').hide();

      if(data.html=="0"){

    $("#divtablaEval").empty();
    $("#divEval02").empty();
    $("#divEval01").show('slow');
    $("#divtablaEval").html(data.view1);
    $("#divtablaEval").show('slow');

    

    $("#txtAsunto").val("");
    $("#txtAsunto").focus();


      swal({
                      title: '',
                      text: 'Se Registró y Envió al alumno Correctamente la Evaluación',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

                  }
      else{
          swal({
          title: 'error',
          text: 'No se pudo editar el informe, error',
          type: 'error',
          confirmButtonText: 'Aceptar'
        });
      }




        // alertify.success('Datos de Configuración de Renta de Quinta categoría Actualizados exitosamente');




        });



}


function quitarPreg(ele,idPreg) {

  $(ele).closest('tr').remove();
  recorrertb("tabla3");
} 


function AgregarPreg(idPreg,nom,dimen) {

var verificar=verifPregunta("tabla3",String(idPreg));
var nFilas = $("#cuerpoTable2 tr").length;

if(verificar==0)
{
  if(nFilas==0){
  $('#cuerpoTable2').html('<tr class="filaPregs" id="idPreg-'+idPreg+'"><td>Num</td><td>'+nom+'</td><td>'+dimen+'</td><td class="colPlanilla"><center><buttton class="btn btn-sm btn-danger" onclick="quitarPreg(this,'+idPreg+')"><i class="fa fa-times" aria-hidden="true"></i></buttton></center></td></tr>');
}
else{
  $('#cuerpoTable2 tr:last').after('<tr class="filaPregs" id="idPreg-'+idPreg+'"><td>Num</td><td>'+nom+'</td><td>'+dimen+'</td><td class="colPlanilla"><center><buttton class="btn btn-sm btn-danger" onclick="quitarPreg(this,'+idPreg+')"><i class="fa fa-times" aria-hidden="true"></i></buttton></center></td></tr>');
}


 recorrertb("tabla3");
}
else{
  swal({
              title: '',
              text: 'Esta pregunta ya ha sido añadida a la evaluación',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
}


}

function verifPreguntaNueva(idtb,preg){

    var respuesta=0;
        $("#"+idtb+" tbody tr").each(function (index)
        {

            $(this).children("td").each(function (index2)
            {
               //alert(index+'-'+index2);

               if(index2==1){
                  var oldpreg=$(this).text();
                    if(oldpreg==preg){
                      respuesta=1;
                      return respuesta;
                    }
               }


            })

        })
        return respuesta;
  }


function verifPregunta(idtb,idPreg){

    var respuesta=0;
        $("#"+idtb+" tbody tr").each(function (index)
        {

        var id=$(this).attr("id");

        if(("idPreg-"+String(idPreg))==id){
          respuesta=1;
          return respuesta;
        }

        })
        return respuesta;
  }

function cambiarDimen() {
  var iddim=$("#cbsDimension").val();
  var token=$("#tokenLaravel").val();
  var ideta=$("#cbsEtapa").val();

  $.post("HomeController/cambiarDimen", { v1:iddim,v2:ideta, _token:token })
  .done(function(data) {

    $("#divBancoPreguntas").empty();
    $("#divBancoPreguntas").html(data.view);


  });

}


function Paso1Eval() {
  var titulo=$("#txtAsunto").val();

  if(titulo.length==0)
  {
    swal({
              title: '',
              text: 'Ingrese un Título válido para la Evaluación',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#txtAsunto").focus();
               // console.log(txtTitulo.length);
        }

  else{
    var v1=$("#txtidP").val();
    var v2=$("#txtidA").val();
    var v3=$("#cbsEtapa").val();
    var v4=$("#txtidTA").val();
    var token=$("#tokenLaravel").val();

    $.post("HomeController/cargarPreguntasEval", { idP: v1, idA: v2, idEta:v3, idTA:v4, _token:token })
  .done(function(data) {


    $("#divEval01").hide('slow');
    $("#divtablaEval").hide('slow');

    $("#divEval02").html(data.view);
    var titulo= $("#txtAsunto").val();
    $("#tabla2").DataTable();
    $("#tituloEval").empty();
    $("#tituloEval").html("Evaluación: "+titulo);

  });




  }
  




}


function limpiar1Eval(){
  $("#txtAsunto").val("");
  $("#txtAsunto").focus();


}

function nuevaEval(v1,v2,v3,v4) {
    var token=$("#tokenLaravel").val();
  $.post("HomeController/cargarEval", { idP: v1, idA: v2, idU:v3, idTA:v4, _token:token })
  .done(function(data) {


    $("#panelPrincipal").empty();
    $("#panelPrincipal").html(data.view);

    $("#divTable").empty();
    $("#divTable").html(data.view1);


    $("#txtAsunto").focus();

  });
}


function eliminarInforme(idI,titulo)
{
     swal({
  title: '¿Estás seguro?',
  text: "Desea eliminar el Informe: "+titulo+".",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminar'
}).then(function () {

    var token=$("#tokenLaravel").val();
    var idTA=$("#txtidTA").val();


    $.post( "HomeController/destroy", {idI:idI,idTA:idTA , _token:token}).done(function(data) {

        if(data.aux=="1")
        {
            
                $("#divTable").empty();
                $("#divTable").html(data.view1);
                swal({
                      title: 'Éxito',
                      text: data.msj,
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

        }

        if(data.aux=="0")
        {
            swal({
                      title: 'No se eliminó',
                      text: data.msj,
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });

        }

                


  });


})
}



function editInf() {
  //alert('dale');
    var txtIdInfE=$("#txtIdInfE").val();
    var txtTitulo=$("#txtAsuntoE").val();
    var txtContenido=CKEDITOR.instances['txtContenidoE'].getData();




        if(txtTitulo.length==0){
            swal({
              title: '',
              text: 'Ingrese un Título válido para el informe',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#txtAsuntoE").focus();
               // console.log(txtTitulo.length);
        }else{
            if(txtContenido.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese el contenido del informe',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#txtAsuntoE").focus();
            }else{

              $('#dcarga1').show();
                
                $("#btnEditInf").attr('disabled', true);
                var token=$("#tokenLaravel").val();

                $.post("HomeController/editInf", { txtTitulo:txtTitulo, txtContenido:txtContenido, idI:txtIdInfE,  _token:token })
                .done(function(data) {

                  $("#btnEditInf").removeAttr("disabled");
                  $('#dcarga1').hide();

                  if(data.aux=="1"){

                        $("#divTable").empty();
                        $("#divTable").html(data.view1);


                    swal({
                      title: '',
                      text: 'Se editó Correctamente el Informe',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

                  }
                  else{
                      swal({
                      title: 'error',
                      text: 'No se pudo editar el informe, error',
                      type: 'error',
                      confirmButtonText: 'Aceptar'
                    });
                  }

  
                  


                });

            }
        }
    
}



function editarInforme(idI,titulo)
{
    $("#boxTitulo").html('INFORME:  '+titulo);

    $("#txtIdInfE").val(idI);
    var token=$("#tokenLaravel").val();
    var txtidP=$("#txtidP").val();

  $.post( "HomeController/cargar", {idI:idI,titulo:titulo, txtidP:txtidP, _token:token}).done(function(data) {



    $("#FormularioEditar").empty();     
    $("#FormularioEditar").html(data.view);

     CKEDITOR.replace( 'txtContenidoE' );
     CKEDITOR.instances['txtContenidoE'].setData(data.informe.contenido);


    $('#modalEditar').modal(); 

    $("#txtAsuntoE").focus();





                
  });
}


function imprimirInforme()
{
  $("#divInforme").printArea();
}


function verMasInforme(idI,titulo)
{

  var token=$("#tokenLaravel").val();
  var txtidP=$("#txtidP").val();

  $.post( "HomeController/verMasInforme", {idI:idI,titulo:titulo, txtidP:txtidP, _token:token}).done(function(data) {

      $("#divTituloInf").empty();
      $('#divTituloInf').html(titulo);

      $("#divalumno").empty();
      $('#divalumno').html('Alumno: '+data.persona.apellidos+' '+data.persona.nombres); 

      $("#divFecImpInf").empty();
      $('#divFecImpInf').html(data.fecnow);

      $("#divCuerpoInf").empty();
      $('#divCuerpoInf').html(data.informe.contenido);



      //console.log(data);
     // console.log(data.informe.titulo);
    //  console.log(data.persona);
          $('#modalverMas').modal();       


  });


 
}



function cargarInf(v1,v2,v3,v4) {
    var token=$("#tokenLaravel").val();
  $.post("HomeController/cargarInf", { idP: v1, idA: v2, idU:v3, idTA:v4, _token:token })
  .done(function(data) {


    $("#panelPrincipal").empty();
    $("#panelPrincipal").html(data.view);

    $("#divTable").empty();
    $("#divTable").html(data.view1);


    $("#txtAsunto").focus();

  });
}

function limpiarInf(){
  $("#txtAsunto").val("");
  CKEDITOR.instances['txtContenido'].setData("");

  $("#txtAsunto").focus();
  $("#btnsaveInf").removeAttr("disabled");
  $('#dcarga0').hide();

}

function saveInf() {
  //alert('dale');
    var idPer=$("#idPerMsj").val();

    var txtTitulo=$("#txtAsunto").val();
    var txtContenido=CKEDITOR.instances['txtContenido'].getData();

    var idTA=$("#txtidTA").val();


        if(txtTitulo.length==0){
            swal({
              title: '',
              text: 'Ingrese un Título válido para el informe',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#txtAsunto").focus();
        }else{
            if(txtContenido.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese el contenido del informe',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#txtContenido").focus();
            }else{

              $('#dcarga0').show();
                
                $("#btnsaveInf").attr('disabled', true);
                var token=$("#tokenLaravel").val();

                $.post("HomeController/saveInf", { txtTitulo:txtTitulo, txtContenido:txtContenido, idTA:idTA,  _token:token })
                .done(function(data) {

                  $("#btnsaveInf").removeAttr("disabled");
                  $('#dcarga0').hide();

                  if(data.aux=="1"){

                        $("#divTable").empty();
                        $("#divTable").html(data.view1);


                    swal({
                      title: '',
                      text: 'Se registró Correctamente el Informe',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

                  }
                  else{
                      swal({
                      title: 'error',
                      text: 'No se pudo registrar el informe, error',
                      type: 'error',
                      confirmButtonText: 'Aceptar'
                    });
                  }

                  limpiarInf();
                  


                });

            }
        }
    
}



function envMail(v1,v2,v3,v4) {
    var token=$("#tokenLaravel").val();
  $.post("HomeController/mensaje", { idP: v1, idA: v2, idU:v3, _token:token })
  .done(function(data) {


    $("#panelPrincipal").empty();
    $("#panelPrincipal").html(data.view);
    $("#txtAsunto").focus();

  });
}

function home(){
    var token=$("#tokenLaravel").val();

    $.post("HomeController/home", { _token:token })
  .done(function(data) {

    $("#panelPrincipal").empty();
    $("#panelPrincipal").html(data.view);

    $("#divTable").empty();

  });
}

function enviarMSj() {
  //alert('dale');
    var idPer=$("#idPerMsj").val();

    var txtAsunto=$("#txtAsunto").val();
    var txtemail=$("#emailMsj").val();
    var txtmsj=$("#txtmsj").val();

    if(txtemail.length==0){
        swal({
              title: '',
              text: 'No se configuró un email para el alumno, Comuníquese con el Administrador del Sistema',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                //$("#txtAsunto").focus();
    }else{
        if(txtAsunto.length==0){
            swal({
              title: '',
              text: 'Ingrese un Asunto válido para el mensaje',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#txtAsunto").focus();
        }else{
            if(txtmsj.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese el contenido del mensaje',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                        $("#txtmsj").focus();
            }else{

              $('#dcarga0').show();
                
                $("#btnEnviarMsj").attr('disabled', true);
                var token=$("#tokenLaravel").val();
                $.post("send", { txtAsunto:txtAsunto, txtemail:txtemail, txtmsj:txtmsj,  _token:token })
                .done(function(data) {

                  $("#btnEnviarMsj").removeAttr("disabled");
                  $('#dcarga0').hide();
                  swal({
                      title: '',
                      text: 'El mensaje se ha enviado correctamente',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });


                });

            }
        }
    }
}















































function redondear(num) {
    return +(Math.round(num + "e+2")  + "e-2");
}

function recorrertb(idtb){

    var cont=1;
        $("#"+idtb+" tbody tr").each(function (index)
        {

            $(this).children("td").each(function (index2)
            {
               //alert(index+'-'+index2);

               if(index2==0){
                  $(this).text(cont);
                  cont++;
               }


            })

        })
  }

  function isImage(extension)
{
    switch(extension.toLowerCase()) 
    {
        case 'jpg': case 'gif': case 'png': case 'jpeg': case 'JPG': case 'GIF': case 'PNG': case 'JPEG': case 'jpe': case 'JPE':
            return true;
        break;
        default:
            return false;
        break;
    }
}

function soloNumeros(e){
  var key = window.Event ? e.which : e.keyCode
  return ((key >= 48 && key <= 57) || (key==8) || (key==35) || (key==34) || (key==46));
}

function noEscribe(e){
  var key = window.Event ? e.which : e.keyCode
  return (key==null);
}

function EscribeLetras(e,ele){
  var text=$(ele).val();
  text=text.toUpperCase();
   var pos=posicionCursor(ele);
  $(ele).val(text);

  ponCursorEnPos(pos,ele);
}


function ponCursorEnPos(pos,laCaja){  
    if(typeof document.selection != 'undefined' && document.selection){        //método IE 
        var tex=laCaja.value; 
        laCaja.value='';  
        laCaja.focus(); 
        var str = document.selection.createRange();  
        laCaja.value=tex; 
        str.move("character", pos);  
        str.moveEnd("character", 0);  
        str.select(); 
    } 
    else if(typeof laCaja.selectionStart != 'undefined'){                    //método estándar 
        laCaja.setSelectionRange(pos,pos);  
        //forzar_focus();            //debería ser focus(), pero nos salta el evento y no queremos 
    } 
}  

function posicionCursor(element)
{
       var tb = element;
        var cursor = -1;

        // IE
        if (document.selection && (document.selection != 'undefined'))
        {
            var _range = document.selection.createRange();
            var contador = 0;
            while (_range.move('character', -1))
                contador++;
            cursor = contador;
        }
       // FF
        else if (tb.selectionStart >= 0)
            cursor = tb.selectionStart;

       return cursor;
}

function pad (n, length) {
    var  n = n.toString();
    while(n.length < length)
         n = "0" + n;
    return n;
}



<?php endif; ?>


</script>  
</body>
</html>
