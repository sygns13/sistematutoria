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
                

                $("#cabeceraTexto").html('Gestión de Tutores <small>Página principal</small>');

      $("#li1").removeClass('active');
      $("#li3").addClass('active');
      $("#tabla1").DataTable();
              }); 


    $(document).ready(function() {


$('#archivo').change(function()
    {   
        var rutaimg="";

     fileExtension = ""; 
     fileName = ""; 
     fileSize ="";
        //obtenemos un array con los datos del archivo
        var file = $("#archivo")[0].files[0];
        //obtenemos el nombre del archivo
        fileName = file.name;
        //obtenemos la extensión del archivo
        fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
        //obtenemos el tamaño del archivo
        fileSize= file.size;
        //obtenemos el tipo de archivo image/png ejemplo
        var fileType = file.type;
        //mensaje con la información del archivo
        //$("#msjHC").html("<span class='info'>Imagen para subir: "+fileName+", peso total: "+fileSize+" bytes.</span>");

        var tamañoMostrar=redondear(parseFloat(fileSize)/1000);


        var formData = new FormData($("#formulario")[0]);

if(isImage(fileExtension)){
    if(fileSize<=2048000){


        $.ajax({
            url: 'tutors/imagen',  
            type: 'POST',
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
                $("#msjFile").html(''+
              '<div class="alert alert-warning alert-dismissable">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Imagen:</strong> Subiendo la imagen, por favor espere...</div></div>');
                        
            },
            //una vez finalizado correctamente
            success: function(data){

              //res=$.parseJSON(data);
              //rutaimg=data;

               /* $("#msjFile").html(''+
              '<div class="alert alert-success alert-dismissible">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Exito:</strong> Documentp subido exitosamente '+rutaimg+'</div></div>');*/

                alertify.success('Imagen subida Exitosamente');

                $("#imgPerfil").attr("src","/img/perfilTutores/"+data+"");



                $("#msjFile").html(''+
'<div class="alert alert-info alert-dismissable">'+
'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
'<strong>Imagen de Perfil:</strong> '+fileName+', peso total: '+parseFloat(tamañoMostrar).toFixed(2)+' Kb.</div></div>');
               
        
                $("#nomImg").val(data);

                
            },
            //si ha ocurrido un error
            error: function(data){
                 $("#msjFile").html(''+
              '<div class="alert alert-danger alert-dismissable">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Error:</strong> del sistema, no se subio el archivo</div></div>'+data);

                 $('#formulario').each (function(){                            
                              this.reset();                            
            });
                    
            }
        });








  }
      else{

        $("#msjFile").html(''+
              '<div class="alert alert-danger alert-dismissable">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Error:</strong> no se subio el archivo. El peso de la imagen '+fileName+' es superior a los 2 mb</div></div>');
        $('#formulario').each (function(){                            
                              this.reset();                            
            });

      }


  }

  else{
      swal({
          title: '',
          text: 'El archivo '+fileName+' no es una imagen',
          type: 'warning',
          confirmButtonText: 'Aceptar'
        });

      $('#formulario').each (function(){                            
                              this.reset();                            
            });
}



        });

      $("#btnNuevo").click(function(){
            limpiarForm1();
            $("#formDatos").toggle( 'slow', function() {
                $("#txtDNI").focus();    
            });
  
        });

      $("#btnCancel").click(function(){
        limpiarForm1();
        $("#formDatos").hide( 'slow', function() {  
            });
      });

      $("#btnGuardar").click(function(){

            var v1=$("#cbutipodoc").val();
            var v2=$("#txtDNI").val();
            var v3=$("#txtnom").val();
            var v4=$("#txtape").val();
            var v5=$("#cbugenero").val();
            var v6=$("#txttelf").val();
            var v7=$("#txtdir").val();
            var v8=$("#txtesp").val();
            var v9=$("#txtVideo").val();

            var v10=$("#txtmail").val();
            var v11=$("#txtuser").val();
            var v12=$("#txtpsw").val();

            var rutaimg="";




                if(v2.length<8){
                    swal({
                      title: '',
                      text: 'Ingrese el número de DNI del Docente',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                $("#txtDNI").focus();
                }

                else{

                    if(v3.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese el nombre del Docente',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                    $("#txtnom").focus();
                    }

                    else{

                      if(v4.length==0){
                        swal({
                      title: '',
                      text: 'Ingrese el apellido del Docente',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                    $("#txtape").focus();

                      }
                        else{
                            if(v5==0){
                        swal({
                          title: '',
                          text: 'Seleccione el género del Docente',
                          type: 'warning',
                          confirmButtonText: 'Aceptar'
                        });
                            $("#cbugenero").focus();
                            }

                            else{

                                        if(v8.length==0){
                                            swal({
                                              title: '',
                                              text: 'Ingrese la Especialidad del Docente',
                                              type: 'warning',
                                              confirmButtonText: 'Aceptar'
                                            });
                                        $("#txtesp").focus();
                                          }
                                          else{

                                     if(v10.length==0){
                                        swal({
                                          title: '',
                                          text: 'Ingrese el correo electrónico del Docente',
                                          type: 'warning',
                                          confirmButtonText: 'Aceptar'
                                        });
                                    $("#txtmail").focus();
                                    }

                                    else{

                                    if(v11.length==0){
                                        swal({
                                          title: '',
                                          text: 'Ingrese el Usuario del sistema del Docente',
                                          type: 'warning',
                                          confirmButtonText: 'Aceptar'
                                        });
                                    $("#txtuser").focus();
                                    }

                                    else{

                                        if(v12.length<6){
                                            swal({
                                              title: '',
                                              text: 'Ingrese el Password del Docente, como mínimo 6 caracteres',
                                              type: 'warning',
                                              confirmButtonText: 'Aceptar'
                                            });
                                        $("#txtpsw").focus();
                                        }

                                        else{

                                          


  rutaimg=$("#nomImg").val();



//alert("eureca");

saveTutor(v1,v2,v3,v4,v5,v6,v7,v8,v9,v10,v11,v12,rutaimg);
                                                    }

                                                }


                                          }
                                        }
                                                                    
                            }


                    }


                }

            }



        });


    });


function saveTutor(v1,v2,v3,v4,v5,v6,v7,v8,v9,v10,v11,v12,v13) {
  
   var datosTutor = [];

   datosTutor[0]=v1;//Tipo Doc
   datosTutor[1]=v2;//DNI o CE
   datosTutor[2]=v3;//nombres
   datosTutor[3]=v4;//apellidos
   datosTutor[4]=v5;//genero
   datosTutor[5]=v6;//telefono
   datosTutor[6]=v7;//direccion
   datosTutor[7]=v8;//especialidad
   datosTutor[8]='';//video
   datosTutor[9]=v10;//email
   datosTutor[10]=v11;//usuario
   datosTutor[11]=v12;//contraseña
   datosTutor[12]=v13;//nombre de imagen



  var array1 = JSON.stringify(datosTutor);
  var token=$("#idToken").val();



  $.post( "tutors/create", {array:array1, v:v9, _token:token}).done(function(data) {



                if(data.html=="0")
                {
                $("#tabla").empty();     
                $("#tabla").html(data.view);
                $("#tabla1").DataTable({responsive: true});
                $("#nomImg").val("");
                limpiarForm1();
        $("#formDatos").hide( 'slow', function() {  
            });
                        swal({
                      title: 'Registrado',
                      text: 'Se registró el Nuevo Docente Satisfactoriamente',
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
    fileExtension = ""; 
     fileName = ""; 
     fileSize ="";


    $("#idPer").val("");
    $("#idTuto").val("");
    $("#idUsu").val("");

   

    $("#msjFile").html('');


            $('#cbutipodoc option[value=1]').prop('selected', 'selected').change();
            $("#txtDNI").val("");
            $("#tituloAgregar").html("Nuevo Docente Tutor");
            $("#txtnom").val("");
            $("#txtape").val("");
            $('#cbugenero option[value=0]').prop('selected', 'selected').change();
            $("#txttelf").val("");
            $("#txtdir").val("");
            $("#txtesp").val("");
            $("#txtVideo").val("");
            $("#imgPerfil").attr("src","{{ asset('/img/av3.png')}}");
            $('#formulario').each (function(){                            
                              this.reset();                            
            });
            
            $("#txtmail").val("");
            $("#txtuser").val("");
            $("#txtpsw").val("");

    var token=$("#idToken").val();
    var nomImg=$("#nomImg").val();

   $.post( "tutors/borrarimagen", {img:nomImg, _token:token}).done(function(data) {
    $("#nomImg").val("");

  });
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


function editar(idPer,idTuto,idUsu,ape,nom,dni)
{
$("#boxTitulo").html('DOCENTE: '+ape+', '+nom);


    var token=$("#idToken").val();


  $.post( "tutors/cargar", {idP:idPer,idT:idTuto, idU:idUsu, _token:token}).done(function(data) {

    $("#idPerEdit").val(idPer);
    $("#idTutEdit").val(idTuto);
    $("#idUsuEdit").val(idUsu);

    $("#FormularioEditar").empty();     
    limpiarForm1();
    $("#formDatos").hide( 'slow', function() {  
        });
    $("#FormularioEditar").html(data.view);

    $('#modalEditar').modal(); 


  
                
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


function guardarEditar1()
{

    var v1=$("#cbutipodocE").val();
    var v2=$("#txtDNIE").val();
    var v3=$("#txtnomE").val();
    var v4=$("#txtapeE").val();
    var v5=$("#cbugeneroE").val();
    var v6=$("#txttelfE").val();
    var v7=$("#txtdirE").val();
    var v8=$("#txtespE").val();
    var v9=$("#txtVideoE").val();


   

    if(v2.length<8){
                    swal({
                      title: '',
                      text: 'Ingrese el número de DNI o CE del Docente',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                $("#txtDNIE").focus();
                }

                else{

                    if(v3.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese el nombre del Docente',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                    $("#txtnomE").focus();
                    }

                    else{

                      if(v4.length=="0"){
                        swal({
                      title: '',
                      text: 'Ingrese el apellido del Docente',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                    $("#txtapeE").focus();

                      }
                        else{
                            if(v5==0){
                        swal({
                          title: '',
                          text: 'Seleccione el género del Docente',
                          type: 'warning',
                          confirmButtonText: 'Aceptar'
                        });
                            $("#cbugeneroE").focus();
                            }

                            else{

                                if(v8.length==0){
                                    swal({
                                      title: '',
                                      text: 'Ingrese la Especialidad del Docente',
                                      type: 'warning',
                                      confirmButtonText: 'Aceptar'
                                    });
                                $("#txtespE").focus();
                                }

                                else{

                                    
                                           
 
//alert("eureca");

saveEdit1(v1,v2,v3,v4,v5,v6,v7,v8,v9);
                                                    

     


                                    }


                                    }


                            }


                    }


                }

      

} 


function saveEdit1(v1,v2,v3,v4,v5,v6,v7,v8,v9) {

  var idPer=$("#idPerEdit").val();
  var idTuto=$("#idTutEdit").val();
  var idUsu=$("#idUsuEdit").val();
  
   var datosPersonal = [];

   datosPersonal[0]=v1;//Tipo de Doc
   datosPersonal[1]=v2;//DNI
   datosPersonal[2]=v3;//nombres
   datosPersonal[3]=v4;//apellidos
   datosPersonal[4]=v5;//genero
   datosPersonal[5]=v6;//telf
   datosPersonal[6]=v7;//dir
   datosPersonal[7]=v8;//esp
   datosPersonal[8]='';//video
   datosPersonal[9]=idPer;//idPersona
   datosPersonal[10]=idTuto;//idTutor
   datosPersonal[11]=idUsu;//iduser



   var array1 = JSON.stringify(datosPersonal);
  var token=$("#idToken").val();
  var buscar=$("#txtBuscar").val();
  var posi=$("#txtposi").val();
  $.post( "tutors/edit1", {array:array1, v:v9, _token:token}).done(function(data) {



                if(data.html=="0")
                {
                $("#tabla").empty();     
                $("#tabla").html(data.view);
                $("#tabla1").DataTable({responsive: true});
                
                swal({
                      title: 'Editado',
                      text: 'Se modificaron los Datos Personales del Docente Satisfactoriamente',
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


function seguroSave2() {
  swal({
  title: '¿Estás seguro?',
  text: "Desea editar este registro: ",
  type: 'info',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, editar'
}).then(function () {

        guardarEditar2();



})
}

function guardarEditar2()
{
    var v1=$("#txtmailE").val();
    var v2=$("#txtuserE").val();
    var v3=$("#txtpswE").val();


     if(v1.length==0){

                swal({
              title: '',
              text: 'Ingrese email del Docente',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#txtmailE").focus();
            }
            else{

                if(v2.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese el nombre de usuario del Docente',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                $("#txtuserE").focus();
                }

                else{

                    if(v3.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese el password del Docente',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                    $("#txtpswE").focus();
                    }

                    else{//aca


  var token=$("#idToken").val();

  var idPer=$("#idPerEdit").val();
  var idTuto=$("#idTutEdit").val();
  var idUsu=$("#idUsuEdit").val();
  

  $.post( "tutors/edit2", {idp:idPer, idt:idTuto,idU:idUsu,mail:v1, user:v2, psw:v3, _token:token}).done(function(data) {



                if(data.html=="0")
                {
                $("#tabla").empty();     
                $("#tabla").html(data.view);
                $("#tabla1").DataTable({responsive: true});
                
                swal({
                      title: 'Editado',
                      text: 'Se modificaron los Datos de usuario del Docente Satisfactoriamente',
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


                }

            }

} 

function cambioImagen()
{
  var rutaimg="";

     fileExtension = ""; 
     fileName = ""; 
     fileSize ="";
        //obtenemos un array con los datos del archivo
        var file = $("#archivoE")[0].files[0];
        //obtenemos el nombre del archivo
        fileName = file.name;
        //obtenemos la extensión del archivo
        fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
        //obtenemos el tamaño del archivo
        fileSize= file.size;
        //obtenemos el tipo de archivo image/png ejemplo
        var fileType = file.type;
        //mensaje con la información del archivo
        //$("#msjHC").html("<span class='info'>Imagen para subir: "+fileName+", peso total: "+fileSize+" bytes.</span>");

        var tamañoMostrar=redondear(parseFloat(fileSize)/1000);


        var formData = new FormData($("#formularioE")[0]);

if(isImage(fileExtension)){
    if(fileSize<=2048000){


        $.ajax({
            url: 'tutors/imagenE',  
            type: 'POST',
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
                $("#msjFileE").html(''+
              '<div class="alert alert-warning alert-dismissable">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Imagen:</strong> Subiendo la imagen, por favor espere...</div></div>');
                        
            },
            //una vez finalizado correctamente
            success: function(data){

              //res=$.parseJSON(data);
              //rutaimg=data;

               /* $("#msjFile").html(''+
              '<div class="alert alert-success alert-dismissible">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Exito:</strong> Documentp subido exitosamente '+rutaimg+'</div></div>');*/

                alertify.success('Imagen subida Exitosamente');

                $("#imgPerfilE").attr("src","/img/perfilTutores/"+data+"");



                $("#msjFileE").html(''+
'<div class="alert alert-info alert-dismissable">'+
'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
'<strong>Imagen de Perfil:</strong> '+fileName+', peso total: '+parseFloat(tamañoMostrar).toFixed(2)+' Kb.</div></div>');
               
        
                $("#nomImgE").val(data);

                
            },
            //si ha ocurrido un error
            error: function(data){
                 $("#msjFileE").html(''+
              '<div class="alert alert-danger alert-dismissable">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Error:</strong> del sistema, no se subio el archivo</div></div>'+data);

                 $('#formularioE').each (function(){                            
                              this.reset();                            
            });
                    
            }
        });








  }
      else{

        $("#msjFileE").html(''+
              '<div class="alert alert-danger alert-dismissable">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Error:</strong> no se subio el archivo. El peso de la imagen '+fileName+' es superior a los 2 mb</div></div>');
        $('#formularioE').each (function(){                            
                              this.reset();                            
            });

      }


  }

  else{
      swal({
          title: '',
          text: 'El archivo '+fileName+' no es una imagen',
          type: 'warning',
          confirmButtonText: 'Aceptar'
        });

      $('#formularioE').each (function(){                            
                              this.reset();                            
            });
}
}


$('#modalEditar').on('hidden.bs.modal', function () {

       // $("body").css({ "overflow-y": "hidden" });
       cancelImg();

        });

function cancelImg()
{
  var fotoe=$("#efoto").val();
  var nomimg=$("#nomImgE").val();


  if(fotoe!=nomimg)
  {
    var token=$("#idToken").val();
    $("#imgPerfilE").attr("src","/img/perfilTutores/"+fotoe+"");
   $.post( "tutors/borrarimagen", {img:nomimg, _token:token}).done(function(data) {
    $("#nomImgE").val(fotoe);

  });
  }
}

function seguroSave3() {
  swal({
  title: '¿Estás seguro?',
  text: "Desea editar la imagen de perfil: ",
  type: 'info',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, editar'
}).then(function () {

        guardarEditar3();



})
}

function guardarEditar3()
{
                
  var fotoe=$("#efoto").val();
  var nomimg=$("#nomImgE").val();

  var token=$("#idToken").val();
  var idPer=$("#idPerEdit").val();
  var idTuto=$("#idTutEdit").val();
  var idUsu=$("#idUsuEdit").val();
  


  $.post( "tutors/edit3", {idp:idPer, idt:idTuto,idU:idUsu,foto:nomimg,  _token:token}).done(function(data) {

       if(fotoe!=nomimg)
          {

            if(fotoe!="av2.jpg" && fotoe!="av3.png"){

   $.post( "tutors/borrarimagen", {img:fotoe, _token:token}).done(function(data) {
    $("#efoto").val(nomimg);

          });

   }
          }

                if(data.html=="0")
                {
                $("#tabla").empty();     
                $("#tabla").html(data.view);
                $("#tabla1").DataTable({responsive: true});

                 $('#formularioE').each (function(){                            
                              this.reset();                            
            });
                
                swal({
                      title: 'Editado',
                      text: 'Se modificó la imagen de perfil correctamente',
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


function eliminar(idP,idT,idU,ape,nom,dni)
{
     swal({
  title: '¿Estás seguro?',
  text: "Desea eliminar al Docente : "+ape+", "+nom+" -- Nota: Solo se podrá eliminar un Docente que no tenga Registros de Tutorías, u otro registro perteneciente a él. A estos Docentes Solo se les podrá dar de baja",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminar'
}).then(function () {

    var token=$("#idToken").val();

    $.post( "tutors/destroy", {idPer:idP,idtut:idT, idUser:idU,  _token:token}).done(function(data) {

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

function imprimir()
{
  $("#FormularioPersona").printArea();
}


function DarBaja(idP,idT,idU,ape,nom,dni) {
  
$('#txtfecEmiBaja').datepicker({
                    autoclose: true,
                    language: 'es',
                    format: 'dd/mm/yyyy',
                    todayHighlight: true
                        });



var f = new Date();
//document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
var mes=(f.getMonth()+1);
if(mes<10)
{
  mes="0"+mes;
}
var dia=f.getDate();
if(dia<10)
{
  dia="0"+dia;
}

$("#boxTituloBaja").html('DNI°: '+dni+'<br><br> DOCENTE: '+ape+', '+nom);
$("#idPerb").val(idP);
$("#idTutob").val(idT);
$("#idusub").val(idU);

$("#dnibaja").val(dni);
$("#bajaDatos").val(ape+', '+nom);




$('#cbuMotivo option[value=1]').prop('selected', 'selected').change();
$('#cbuTipo option[value=1]').prop('selected', 'selected').change();

$("#txtdocBaja").val("");

$("#txtfecEmiBaja").val(dia + "/" + mes + "/" + f.getFullYear());
$("#txtfecApliBaja").val(dia + "/" + mes + "/" + f.getFullYear());
$("#txtfecReincorp").val("");


$("#txtobsBaja").val("");

$("#txtresBaja").focus();
  $('#modalBaja').modal(); 


}

function AceptarBaja() {
  
  var idPer=$("#idPerb").val();
  var idTut=$("#idTutob").val();
  var idUsu=$("#idusub").val();

  var doc=$("#txtdocBaja").val();
  var fecEmi=$("#txtfecEmiBaja").val();

  var motivo=$("#cbuMotivo").val();
  var tipo=$("#cbuTipo").val();

  var obs=$("#txtobsBaja").val();


  var dni=$("#dnibaja").val();
  var docente=$("#bajaDatos").val();





  if(doc.length=="0")
  {
    swal({
          title: '',
          text: 'Ingrese el documento o título de desactivación del Agremiado',
          type: 'warning',
          confirmButtonText: 'Aceptar'
        });
        $("#txtdocBaja").focus();
  }
  else
  {
    if(fecEmi.length=="0")
      {
        swal({
          title: '',
          text: 'Ingrese la fecha de Emisión del documento de desactivación del Docente',
          type: 'warning',
          confirmButtonText: 'Aceptar'
        });
        $("#txtfecEmiBaja").focus();
      }
      else
      {


        swal({
  title: 'Confirmar',
  text: "Confirmar la desactivación del Docente "+docente+". Con DNI Nº: "+dni,
  type: 'warning',

  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Dar de Baja'
}).then(function () {

    var token=$("#idToken").val();
    var idT=$("#idTipoTrab").val();
      var buscar=$("#txtBuscar").val();
      var posi=$("#txtposi").val();

$.post( "tutors/baja", {docu:doc, fece:fecEmi, motiv:motivo, tip:tipo, obsB:obs, idP:idPer, idT:idTut, idU:idUsu, _token:token}).done(function(data) {

        if(data.html=="0")
        {
                $("#tabla").empty();     
                $("#tabla").html(data.view);
                $("#tabla1").DataTable({responsive: true});
                $('#modalBaja').modal('hide');

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
                      title: 'No se dió de baja',
                      text: data.msj,
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });

        }

                


  });


})



      }
  }
}

function darSubida(idP,idT,idU,ape,nom,dni) {

  $('#txtfecEmiRein').datepicker({
                    autoclose: true,
                    language: 'es',
                    format: 'dd/mm/yyyy',
                    todayHighlight: true
                        });


$("#boxTituloRein").html('DNI N°: '+dni+'<br><br> DOCENTE: '+ape+', '+nom);
$("#idPerR").val(idP);
$("#idTutoR").val(idT);
$("#idusuR").val(idU);


$("#dniRec").val(dni);
$("#bajaDatosR").val(ape+', '+nom);

$("#txtresRein").val("");

$("#txtobsRein").val("");

var f = new Date();

var mes=(f.getMonth()+1);
if(mes<10)
{
  mes="0"+mes;
}
var dia=f.getDate();
if(dia<10)
{
  dia="0"+dia;
}

$("#txtfecEmiRein").val(dia + "/" + mes + "/" + f.getFullYear());


$("#txtresRein").focus();
  $('#modalhabilitar').modal(); 
}

function AceptarReinc() {

  var idPer=$("#idPerR").val();
  var idTut=$("#idTutoR").val();
  var idUsu=$("#idusuR").val();

  var doc=$("#txtresRein").val();
  var fecEmi=$("#txtfecEmiRein").val();


  var obs=$("#txtobsRein").val();


  var dni=$("#dniRec").val();
  var docente=$("#bajaDatosR").val();





  if(doc.length=="0")
  {
    swal({
          title: '',
          text: 'Ingrese el documento o título de activación del Docente',
          type: 'warning',
          confirmButtonText: 'Aceptar'
        });
        $("#txtresRein").focus();
  }
  else
  {
    if(fecEmi.length=="0")
      {
        swal({
          title: '',
          text: 'Ingrese la fecha de Emisión del documento de activación del Docente',
          type: 'warning',
          confirmButtonText: 'Aceptar'
        });
        $("#txtfecEmiRein").focus();
      }
      else
      {


        swal({
  title: 'Confirmar',
  text: "Confirmar la reactivación del Docente: "+docente+". Con DNI Nº "+dni,
  type: 'warning',

  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Dar de Alta'
}).then(function () {

    var token=$("#idToken").val();


$.post( "tutors/alta", {docu:doc, fece:fecEmi, obsB:obs, idP:idPer, idT:idTut, idU:idUsu, _token:token}).done(function(data) {

        if(data.html=="0")
        {
                $("#tabla").empty();     
                $("#tabla").html(data.view);
                $("#tabla1").DataTable({responsive: true});
                $('#modalhabilitar').modal('hide');

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
                      title: 'No se dió la reactivación',
                      text: data.msj,
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });

        }

                


  });


})



      }
  }

}




function buscarAgre() {


  var buscar=$("#txtBuscar").val();

  var token=$("#idToken").val();

  $.post( "tutors/buscarAgreFun", {bus:buscar,_token:token}).done(function(data) {


$("#tabla").empty();     
$("#tabla").html(data.view);
 


});
}

function buscaEnter(ele,e) {

       if(e.which == 13) {

        buscarAgre();

       }

    }

function usarPaginate(posi){
  var buscar=$("#txtBuscar").val();
  var token=$("#idToken").val();



  $.post( "tutors/buscarAgreFun", {bus:buscar, pos:posi,_token:token}).done(function(data) {

$("#tabla").empty();     
$("#tabla").html(data.view);

 


});
}

function btnPadronclick(){

    var token=$("#idToken").val();



  $.post( "tutors/padron", {_token:token}).done(function(data) {


    console.log(data);

 


});

}
</script>  
</body>
</html>
