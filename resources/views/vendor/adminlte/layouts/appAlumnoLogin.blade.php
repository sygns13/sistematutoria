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

        @include('adminlte::layouts.partials.contentheader')

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
    //alert("prueba");
@if(accesoUser([4]))

$(document).ready(function() { 
  setInterval(LoadChat, 1000);
});


function enviarEnter(ele,e) {

       if(e.which == 13) {

        enviarMsj();

       }

    }



    function LoadChat() {
      if ( $("#chattxtidta").length > 0 ) {
  var idTA=$("#chattxtidta").val();
  var token=$("#tokenLaravel").val();

   $.post("Chat/cargarMsjs", { v1:idTA, _token:token })
  .done(function(data) {

    var idChat=$("#idLastMsj").val();

    if(idChat!=data.idLastChat){
        $("#PanelChatDirecto").empty();
    $("#PanelChatDirecto").html(data.view);

    var objDiv = document.getElementById("PanelChatDirecto");
    objDiv.scrollTop = objDiv.scrollHeight;

    $("#idLastMsj").val(data.idLastChat);


    }


  });

}
    }


function enviarMsj() {
  
  var idTA=$("#chattxtidta").val();
  var mensaje=$("#txtMsjChat").val();
  var token=$("#tokenLaravel").val();

 $.post("Chat/enviarChat", { v1:idTA, v2:mensaje, _token:token })
  .done(function(data) {



    $("#PanelChatDirecto").empty();
    $("#PanelChatDirecto").html(data.view);

    var objDiv = document.getElementById("PanelChatDirecto");
    objDiv.scrollTop = objDiv.scrollHeight;

    $("#txtMsjChat").val("");
    $("#txtMsjChat").focus();



  });


}


function iniciarChat(v1,v2,v3,v4) {
  var token=$("#tokenLaravel").val();
  $.post("Chat/cargarChat", { idP: v1, idT: v2, idU:v3, idTA:v4, _token:token })
  .done(function(data) {



    $("#divChatAlum").empty();
    $("#divChatAlum").html(data.view);

  var objDiv = document.getElementById("PanelChatDirecto");
    objDiv.scrollTop = objDiv.scrollHeight;

    $("#txtMsjChat").focus();



  });
}

function homePerfil() {
  window.location.href = "home";
}

function impEvaluacion() {
   $("#divEvaluacion").printArea();
}
function impTarea() {
  $("#divImpTarea").printArea();
}
function  impSeSion() {
  $("#divImpSesion").printArea();
}
function homePerfil1Alumno() {
  var token=$("#tokenLaravel").val();

  $.post("Sesion/homePerfil1Alumno", {_token:token })
  .done(function(data) {

    $("#historicos").empty();
    $("#historicos").html(data.view);


  });
}
function verMasSesion(id,Titulo) {
  var token=$("#tokenLaravel").val();

  $.post("Sesion/verMasSesion", {idS:id, _token:token })
  .done(function(data) {

    $("#historicos").empty();
    $("#historicos").html(data.view);


  });
}

function verMasTarea(id,Titulo) {
  var token=$("#tokenLaravel").val();

  $.post("Tarea/verMasTarea", {idT:id, _token:token })
  .done(function(data) {



    $("#historicos").empty();
    $("#historicos").html(data.view);


  });
}

function verMasEvaluacion(id,Titulo) {
  var token=$("#tokenLaravel").val();

  $.post("Evaluacion/verMasEvaluacion", {idE:id, _token:token })
  .done(function(data) {


    $("#historicos").empty();
    $("#historicos").html(data.view);


  });
}

function VerPerfilTutor(idTutor) {
  var token=$("#tokenLaravel").val();

    $.post("Tutor/VerPerfilTutor", {idTutor:idTutor, _token:token })
  .done(function(data) {


    $("#divTama3").empty();
    $("#divTama9").empty();

    $("#divEval").empty();
    $("#divEval").html(data.view);


  });
}

function GuardarE1(){

  var idPer=$("#idPerE").val();
  var idAlum=$("#idAluE").val();
  var idUser=$("#idUsuE").val();


  var telf=$("#txttelfE").val();
  var dir=$("#txtdirE").val();
  var mail=$("#txtmailE").val();
  var user=$("#txtuserE").val();
  var psw=$("#txtpswE").val();



                  if(mail.length=="0"){
                    swal({
                    title: '',
                    text: 'Ingrese un correo electrónico válido',
                    type: 'warning',
                    confirmButtonText: 'Aceptar'
                    });
                    $("#txtmailE").focus();
                  }
                  else
                  {
                    if(user.length=="0"){
                      swal({
                      title: '',
                      text: 'Ingrese un username válido',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                      });
                      $("#txtuserE").focus();
                    }
                    else
                    {
                      if(psw.length=="0"){
                        swal({
                        title: '',
                        text: 'Ingrese un password válido',
                        type: 'warning',
                        confirmButtonText: 'Aceptar'
                        });
                        $("#txtpswE").focus();
                      }
                      else
                      {
                          //alert("llegamos bien");

                          var token=$("#tokenLaravel").val();
                        $.post("Alumno/editarPerfil", { idP: idPer, idA: idAlum, idU:idUser, _token:token, fono:telf, direc:dir, correo:mail, usu:user, pass:psw }).done(function(data) {


                          if(data.html=="0"){
                                swal({
                                title: 'Error',
                                text: data.msj,
                                type: 'warning',
                                confirmButtonText: 'Aceptar'
                                });
                                }

                        else{

                                swal({
                                title: 'Éxito',
                                text: 'Se editó correctamente los Datos del Perfil',
                                type: 'success',
                                confirmButtonText: 'Aceptar'
                                });

                                $("#divEval").empty();
                                $("#divEval").html(data.view);
                                }



                        });
          }

      }

    }

}
function Myperfil() {
  var token=$("#tokenLaravel").val();

    $.post("Alumno/Myperfil", { _token:token })
  .done(function(data) {


    $("#divTama3").empty();
    $("#divTama9").empty();

    $("#divEval").empty();
    $("#divEval").html(data.view);
    $("#menuBajar3").hide();

  });
}

function SaveCancelacion() {
  swal({
  title: '¿Estás seguro?',
  text: "Confirma la solicitud de cancelación a la Sesión",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Confirmar'
}).then(function () {

      SaveCancelacionC();
})
}
function SaveCancelacionC() {
  var token=$("#tokenLaravel").val();
  var idSe=$("#txtidSesion").val();
  var contenido=$("#txtContenido").val();

  if(contenido.length==0)
  {
     swal({
              title: '',
              text: 'Ingrese una justificación válida para solicitar la cancelación de la sesión',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#txtContenido").focus();
  }
  else{

    $.post("Sesion/soliCancelacion", { idS:idSe, v1:contenido, _token:token })
  .done(function(data) {


    $("#divEval").empty();
    $("#divEval").html(data.view);

  });
  }
}

function SaveParticipacionC(){

  var token=$("#tokenLaravel").val();
  var idSe=$("#txtidSesion").val();

    $.post("Sesion/saveParticipacion", { idS:idSe, _token:token })
  .done(function(data) {


    $("#divEval").empty();
    $("#divEval").html(data.view);

  });

}

function SaveParticipacion() {
  swal({
  title: '¿Estás seguro?',
  text: "Confirma su participación a la Sesión",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Confirmar'
}).then(function () {

      SaveParticipacionC();
})
}

function revisarSesion(idSesion) {

   var token=$("#tokenLaravel").val();

    $.post("Sesion/verSesion", { idS:idSesion, _token:token })
  .done(function(data) {


    $("#divTama3").empty();
    $("#divTama9").empty();

    $("#divEval").empty();
    $("#divEval").html(data.view);

  });

 }



function SaveTarea() {
   swal({
  title: '¿Estás seguro?',
  text: "Confirma enviar su desarrollo de la Tarea",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Confirmar'
}).then(function () {

      SaveTareaC();
})
 
}


function SaveTareaC() {
  var contenido=CKEDITOR.instances['txtContenido'].getData();
  var archivo=$("#nomImg").val();

  if(contenido.length==0 && archivo.length==0)
  {
    swal({
          title: '',
          text: 'No se pudo enviar el desarrollo de su tarea, puesto que no ha consignado un contenido válido en la caja de texto, ni un archivo en el Upload: ',
          type: 'warning',
          confirmButtonText: 'Aceptar'
        });
  }
  else
  {
     var token=$("#tokenLaravel").val();
     var idTarea=$("#txtidTarea").val();

     $("#btnRespTarea").attr('disabled', true);
     $("#btnLimpiarTarea").attr('disabled', true);
     $('#dcarga0').show();

     var idEvaluacion=$("#txtidEval").val();

     $.post("Tarea/responderTarea", {v1:idTarea, v2:contenido, v3:archivo,    _token:token}).done(function(data) {

      $("#btnRespTarea").removeAttr("disabled");
      $("#btnLimpiarTarea").removeAttr("disabled");
      $('#dcarga0').hide();

      if(data.html=="0"){

    homeAlumno();


      swal({
                      title: '',
                      text: 'Se Registró correctamente el desarrollo de su tarea.',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

                  }
      else{
          swal({
          title: 'Error',
          text: 'No se pudieron registrar sus respuestas, error',
          type: 'danger',
          confirmButtonText: 'Aceptar'
        });
      }







        });
  }
}

 function revisarTarea(idTarea) {

   var token=$("#tokenLaravel").val();

    $.post("Tarea/verTarea", { idT:idTarea, _token:token })
  .done(function(data) {


    $("#divTama3").empty();
    $("#divTama9").empty();

    $("#divEval").empty();
    $("#divEval").html(data.view);

  });

 }


function revisarEval(idEval)
{
  
  var token=$("#tokenLaravel").val();

    $.post("Evaluacion/verEval", { idE:idEval, _token:token })
  .done(function(data) {


    $("#divTama3").empty();
    $("#divTama9").empty();

    $("#divEval").empty();
    $("#divEval").html(data.view);

  });


}

function homeAlumno(){

  var token=$("#tokenLaravel").val();

   $.post("Evaluacion/homeAlumno", {_token:token })
  .done(function(data) {


    $("#divTama3").empty();
    $("#divTama9").empty();

    $("#divEval").empty();
    
    $("#divTama3").html(data.view1);
    $("#divTama9").html(data.view2);

  });

}

function limpiarEval() {
  $(".txtRespuesta:first").focus();
}


function SaveEval() {
   swal({
  title: '¿Estás seguro?',
  text: "Confirma enviar sus respuestas a la evaluación",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Confirmar'
}).then(function () {

      SaveEvalC();
})
 
}


function SaveEvalC() {


  var aux="0";
  var resp="0";

var auxResp = [];
var idPregs = [];
var auxcont=0;
var cadena="";
var idDetPreg="";
var cantD="";
var finCadD="";

  $(".txtRespuesta").each(function(index, el) {
    resp= $(this).val();

    idDetPreg = $(this).attr("id");
    cantD=idDetPreg.length;
    finCadD=idDetPreg.substring(11,cantD);

    idPregs[auxcont]=finCadD;

    //console.log(finCadD);

    auxResp[auxcont]=resp;
    console.log(resp);
    auxcont++;

    if(resp.length==0){
      aux="1";
      cadena=cadena+", "+(index+1);
    }

  //console.log(aux);
  //console.log(aux.length);

  });

  if(aux=="1"){
     swal({
          title: '',
          text: 'No se enviaron sus respuestas, debe completar todas las preguntas, Complete la(s) pregunta(s): '+cadena,
          type: 'warning',
          confirmButtonText: 'Aceptar'
        });
  }
  else{
    var array1 = JSON.stringify(idPregs);
     var array2 = JSON.stringify(auxResp);

     var token=$("#tokenLaravel").val();
     $("#btnResponderEval").attr('disabled', true);
     $("#btnLimRespEval").attr('disabled', true);
     $('#dcarga0').show();

     var idEvaluacion=$("#txtidEval").val();

     $.post("Evaluacion/responderEval", {v1:idEvaluacion, v2:array1, v3:array2,    _token:token}).done(function(data) {

      $("#btnResponderEval").removeAttr("disabled");
      $("#btnLimRespEval").removeAttr("disabled");
      $('#dcarga0').hide();

      if(data.html=="0"){

    homeAlumno();


      swal({
                      title: '',
                      text: 'Se Registraron Correctamente sus Respuestas, la evaluación fue resuelta',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

                  }
      else{
          swal({
          title: 'Error',
          text: 'No se pudieron registrar sus respuestas, error',
          type: 'danger',
          confirmButtonText: 'Aceptar'
        });
      }







        });



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

function isPDF(extension)
{
    switch(extension.toLowerCase()) 
    {
        case 'pdf': case 'PDF':
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



@endif


</script>  
</body>
</html>
