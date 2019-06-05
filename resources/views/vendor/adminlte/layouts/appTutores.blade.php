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
                

                $("#cabeceraTexto").html('Asignación de Tutores a Alumnos <small>Página principal</small>');

      $("#li1").removeClass('active');
      $("#li4").addClass('active');
      $("#tabla1").DataTable();
              }); 


    $(document).ready(function() {




    });



function asignarTut(idPer, idTut, idUsu){
  var token=$("#idToken").val();

  $.post( "tutores/asignar", {idP:idPer, idT:idTut, idU:idUsu, _token:token}).done(function(data) {
      
      $("#controles").empty();
      $("#tabla").empty();


      $("#controles").html(data.view1);
      $("#tabla").html(data.view2);
      $("#tabla2").DataTable();

  });

}

function agreAlum(idPer,idAlum,idUsu) {

  var token=$("#idToken").val();

  var idPD=$("#idP").val();
  var idTD=$("#idT").val();
  var idUD=$("#idU").val();


  
  var docente=$("#txtdoc").val();
  
  swal({
  title: '¿Estás seguro?',
  text: "¿Desea Asignar este alumno para el Proceso de Tutoría al Docente "+docente+"?",
  type: 'info',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Asignar'
}).then(function () {

      
$.post( "tutores/asignarAlumno", {idP:idPD, idT:idTD, idU:idUD, idPA:idPer, idAA:idAlum, idUA:idUsu, _token:token}).done(function(data) {
      
      $("#controles").empty();
      $("#tabla").empty();


      $("#controles").html(data.view1);
      $("#tabla").html(data.view2);
      $("#tabla2").DataTable();

      alertify.success('Alumno Asignado Exitosamente');

  });


})

}

function quitarAlum(idPer,idAlum,idUsu,id) {
  var token=$("#idToken").val();

  var idPD=$("#idP").val();
  var idTD=$("#idT").val();
  var idUD=$("#idU").val();

  
  var docente=$("#txtdoc").val();
  
  swal({
  title: '¿Estás seguro?',
  text: "¿Desea Quitar la Asignación de este alumno del docente: "+docente+"?",
  type: 'info',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Quitar'
}).then(function () {

      
$.post( "tutores/quitarAlumno", {idP:idPD, idT:idTD, idU:idUD, idPA:idPer, idAA:idAlum, idUA:idUsu, idTA:id, _token:token}).done(function(data) {
      
      $("#controles").empty();
      $("#tabla").empty();


      $("#controles").html(data.view1);
      $("#tabla").html(data.view2);
      $("#tabla2").DataTable();

      alertify.success('Alumno Asignado Exitosamente');

  });


})
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







</script>  
</body>
</html>
