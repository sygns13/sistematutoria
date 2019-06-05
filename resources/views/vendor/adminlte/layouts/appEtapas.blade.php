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
   $(function () {
                

                $("#cabeceraTexto").html('Gestión de Etapas <small>Página principal</small>');

      $("#li1").removeClass('active');
      $("#li6").addClass('active');
      $("#tabla1").DataTable();

      
              }); 


    $(document).ready(function() {


      $("#btnNuevo").click(function(){
            limpiarForm1();
            $("#formDatos").toggle( 'slow', function() {
                $("#txtnom").focus();    
            });
  
        });

      $("#btnCancel").click(function(){
        limpiarForm1();
        $("#formDatos").hide( 'slow', function() {  
            });
      });

      $("#btnGuardar").click(function(){

            var v1=$("#txtnom").val();



              if(v1.length==0){
                  swal({
                    title: '',
                    text: 'Ingrese el Nombre de la Etapa',
                    type: 'warning',
                    confirmButtonText: 'Aceptar'
                  });
              $("#txtnom").focus();
              }

              else{


saveFuncion(v1);
       }



        });


    });


function saveFuncion(v1) {
  
  var token=$("#idToken").val();



  $.post( "etapas/create", {nom:v1, _token:token}).done(function(data) {


                if(data.html=="0")
                {
                $("#tabla").empty();     
                $("#tabla").html(data.view);
                $("#tabla1").DataTable({responsive: true});
                limpiarForm1();
        $("#formDatos").hide( 'slow', function() {  
            });
                        swal({
                      title: 'Registrado',
                      text: 'Se registró la Nueva Etapa Satisfactoriamente',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

                }

                if(data.html=="1")  
                {
                    swal({
                      title: '',
                      text: data.msj,
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                    $(data.selector).focus();
                }



       

    });

}



   function limpiarForm1() {
      $("#txtnom").val("");
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


function editar(id,nom)
{
$("#boxTitulo").html('ETAPA: '+nom);


    var token=$("#idToken").val();


  $.post( "etapas/cargar", {idE:id, _token:token}).done(function(data) {

    $("#idEta").val(id);


    $("#FormularioEditar").empty();     
    limpiarForm1();
    $("#formDatos").hide( 'slow', function() {  
        });
    $("#FormularioEditar").html(data.view);


    $('#modalEditar').modal(); 
    $("#txtnomE").focus();

  
                
  });
}


function seguroSave1() {
  swal({
  title: '¿Estás seguro?',
  text: "Desea editar este registro: ",
  type: 'info',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, editar'
}).then(function () {

        guardarEditar1();



})
}


function guardarEditar1(){

    var v1=$("#txtnomE").val();





    if(v1.length==0){
        swal({
          title: '',
          text: 'Ingrese el nombre de la Etapa',
          type: 'warning',
          confirmButtonText: 'Aceptar'
        });
    $("#txtnomE").focus();
    }

    else{



saveEdit1(v1);


                }

      

} 


function saveEdit1(v1) {

  var id=$("#idEta").val();

  var token=$("#idToken").val();


  $.post( "etapas/edit1", {nom:v1, idE:id, _token:token}).done(function(data) {



                if(data.html=="0")
                {
                $("#tabla").empty();     
                $("#tabla").html(data.view);
                $("#tabla1").DataTable({responsive: true});
                
                swal({
                      title: 'Editado',
                      text: 'Se modificaron los Datos de la Etapa seleccionada Satisfactoriamente',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });
                 $('#modalEditar').modal('hide'); 
                }

                if(data.html=="1")  
                {
                    swal({
                      title: '',
                      text: data.msj,
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                    $(data.selector).focus();
                }



       

    });

}






function eliminar(id, nom)
{
     swal({
  title: '¿Estás seguro?',
  text: "Desea eliminar la etapa : "+nom+" -- Nota: Solo se podrá eliminar una etapa que no tenga registro de evalauciones o preguntas asociadas a ella, u otros procesos de Tutoría.",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminar'
}).then(function () {

    var token=$("#idToken").val();

    $.post( "etapas/destroy", {idE:id,  _token:token}).done(function(data) {

        if(data.html=="0")
        {
            
                $("#tabla").empty();     
                $("#tabla").html(data.view);
                $("#tabla1").DataTable({responsive: true});
                swal({
                      title: 'Éxito',
                      text: data.msj,
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

        }

        if(data.html=="1")
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


function verMas(idP,idT,idU)
{

  var token=$("#idToken").val();

  $.post( "tutors/vermas", {idPer:idP,idtuto:idT, idUser:idU, _token:token}).done(function(data) {

       $("#FormularioPersona").empty();
      $('#FormularioPersona').html(data.view);
          $('#modalverMas').modal();       


  });


 
}

</script>  
</body>
</html>
