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

        @include('adminlte::layouts.partials.contentheaderAlumno')

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
      $("#li2").addClass('active');

              }); 


    $(document).ready(function() {

     var fileExtension = ""; 
     var fileName = ""; 
     var fileSize ="";
        $('#archivo').change(function()
    {   
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

        $("#msjFile").html(''+
'<div class="alert alert-info alert-dismissable">'+
  '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
  '<strong>Historia Digital:</strong> Documento para subir: '+fileName+', peso total: '+fileSize+' bytes.</div></div>');
    });

     



        $("#btnNuevo").click(function(){

     fileExtension = ""; 
     fileName = ""; 
     fileSize ="";

            $("#idalum").val("0");
            $("#ocudni").val("");
            $("#mTitulo").html("Nuevo Alumno");
            $("#txtcod").val("");$("#txtdni").val("");
            $("#txtnom").val("");
            $("#txtape").val("");
            $("#txtseme").val("");
            $("#txtfono").val("");
            $("#txtdir").val("");
            $("#txtmail").val("");
            $("#txtuser").val("");
            $("#txtpsw").val("");
            $("#cbugenero").val(0);

            $('#formulario').each (function(){                            
                                  this.reset();                            
            });

            $('#modalAlumno').modal();
  
        });

        $("#btnGuardarN").click(function(){

            var v1=$("#txtcod").val();
            var v2=$("#txtdni").val();
            var v3=$("#txtnom").val();
            var v4=$("#txtape").val();
            var v5=$("#txtseme").val();
            var v6=$("#txtfono").val();
            var v7=$("#txtdir").val();
            var v8=$("#txtmail").val();
            var v9=$("#txtuser").val();
            var v10=$("#txtpsw").val();
            var v11=$("#cbugenero").val();
            var rutaimg="";

            $("#ocudni").val(v2);

            if(v1.length==0){

                swal({
              title: '',
              text: 'Ingrese el código del alumno',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#txtcod").focus();
            }
            else{

                if(v3.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese el nombre del alumno',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                $("#txtnom").focus();
                }

                else{

                    if(v4.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese los apellidos del alumno',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                    $("#txtape").focus();
                    }

                    else{

                      if(v11=="0"){
                        swal({
                      title: '',
                      text: 'Seleccione el género del alumno',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                    $("#cbugenero").focus();

                      }
                        else{
                            if(v5.length==0){
                        swal({
                          title: '',
                          text: 'Ingrese el semestre que cursa el alumno',
                          type: 'warning',
                          confirmButtonText: 'Aceptar'
                        });
                            $("#txtseme").focus();
                            }

                            else{

                                if(v8.length==0){
                                    swal({
                                      title: '',
                                      text: 'Ingrese el correo electrónico del alumno',
                                      type: 'warning',
                                      confirmButtonText: 'Aceptar'
                                    });
                                $("#txtmail").focus();
                                }

                                else{

                                    if(v9.length==0){
                                        swal({
                                          title: '',
                                          text: 'Ingrese el username del alumno',
                                          type: 'warning',
                                          confirmButtonText: 'Aceptar'
                                        });
                                    $("#txtuser").focus();
                                    }

                                    else{

                                        if(v10.length==0){
                                            swal({
                                              title: '',
                                              text: 'Ingrese el password del alumno',
                                              type: 'warning',
                                              confirmButtonText: 'Aceptar'
                                            });
                                        $("#txtpsw").focus();
                                        }

                                        else{

                                          if(v2.length!=8){
                                            swal({
                                              title: '',
                                              text: 'Ingrese correctamente el número del DNI',
                                              type: 'warning',
                                              confirmButtonText: 'Aceptar'
                                            });
                                        $("#txtpsw").focus();
                                          }

                                          else{


  var formData = new FormData($("#formulario")[0]);

if(fileExtension.length==0){
  rutaimg="0"
  $.get("/alumnos/nuevoAlumno/"+v1+"/"+v2+"/"+v3+"/"+v4+"/"+v5+"/"+v6+"/"+v7+"/"+v8+"/"+v9+"/"+v10+"/"+rutaimg+"/"+v11+"",function(response){

    if(response.html=="0"){
        swal({
                                              title: 'Error',
                                              text: response.msj,
                                              type: 'warning',
                                              confirmButtonText: 'Aceptar'
                                            });
    }

    else{
      $('#modalAlumno').modal('hide');        
            $("#tabla").html(response.view);  
            $("#tabla1").DataTable(); 
                                  swal({
                                              title: 'Éxito',
                                              text: 'Se registró correctamente al alumno',
                                              type: 'success',
                                              confirmButtonText: 'Aceptar'
                                            });
    }
             
            

                                                                                        
            }); 
}
  else{



  if(isImage(fileExtension)){
    if(fileSize<=200000){


        $.ajax({
            url: 'alumnos/imagen',  
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
              '<div class="alert alert-info alert-dismissable">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Imagen:</strong> Subiendo el documento, por favor espere...</div></div>');
                        
            },
            //una vez finalizado correctamente
            success: function(data){

              //res=$.parseJSON(data);
              rutaimg=data;

                $("#msjFile").html(''+
              '<div class="alert alert-success alert-dismissible">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Exito:</strong> Documentp subido exitosamente '+rutaimg+'</div></div>');
               
           
         $.get("/alumnos/nuevoAlumno/"+v1+"/"+v2+"/"+v3+"/"+v4+"/"+v5+"/"+v6+"/"+v7+"/"+v8+"/"+v9+"/"+v10+"/"+rutaimg+"/"+v11+"",function(response){
             
                        if(response.html=="0"){
                        swal({
                        title: 'Error',
                        text: response.msj,
                        type: 'warning',
                        confirmButtonText: 'Aceptar'
                        });
                        }

                        else{
                        $('#modalAlumno').modal('hide');        
                        $("#tabla").html(response.view);  
                        $("#tabla1").DataTable(); 
                        swal({
                        title: 'Éxito',
                        text: 'Se registró correctamente al alumno',
                        type: 'success',
                        confirmButtonText: 'Aceptar'
                        });
                        }

                                                                                        
            }); 



                
            },
            //si ha ocurrido un error
            error: function(data){
                 $("#msjFile").html(''+
              '<div class="alert alert-danger alert-dismissable">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Error:</strong> del sistema, no se subio el archivo</div></div>'+data);
                    
            }
        });








  }
      else{
        swal({
          title: '',
          text: 'El peso de la imagen '+fileName+' es superior a los 200 Kb',
          type: 'warning',
          confirmButtonText: 'Aceptar'
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
}

  }






                                          }





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

function isImage(extension)
{
    switch(extension.toLowerCase()) 
    {
        case 'jpg': case 'gif': case 'png': case 'jpeg':
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

function editar(idPer,idAlum,idUser) 
{
  var token=$("#tokenLaravel").val();
  $.post("alumnos/cargar", { idP: idPer, idA: idAlum, idU:idUser, _token:token })
  .done(function(data) {

    $("#mTituloE").html("Editar Alumno");
    $("#formuEditar").empty();
    $("#formuEditar").html(data.view);
    $('#modalAlumnoE').modal();
  });

}

function CerrarE(){
  $('#modalAlumnoE').modal('hide'); 
}

function GuardarE1(){

  var idPer=$("#idPerE").val();
  var idAlum=$("#idAluE").val();
  var idUser=$("#idUsuE").val();

  var codigo=$("#txtcodE").val();
  var dni=$("#txtDNIE").val();
  var nom=$("#txtnomE").val();
  var ape=$("#txtapeE").val();
  var gen=$("#cbugeneroE").val();
  var seme=$("#txtsemeE").val();
  var telf=$("#txttelfE").val();
  var dir=$("#txtdirE").val();
  var mail=$("#txtmailE").val();
  var user=$("#txtuserE").val();
  var psw=$("#txtpswE").val();

  if(codigo.length==0){

    swal({
    title: '',
    text: 'Ingrese el código del alumno',
    type: 'warning',
    confirmButtonText: 'Aceptar'
    });
    $("#txtcodE").focus();
    }
    else{

      if(dni.length!=8){

      swal({
      title: '',
      text: 'Ingrese el DNI del alumno correctamente',
      type: 'warning',
      confirmButtonText: 'Aceptar'
      });
      $("#txtDNIE").focus();
      }
      else{

          if(nom.length==0){
            swal({
            title: '',
            text: 'Complete los nombres del alumno correctamente',
            type: 'warning',
            confirmButtonText: 'Aceptar'
            });
            $("#txtnomE").focus();
          }
          else
          {

            if(ape.length==0){
              swal({
              title: '',
              text: 'Complete los apellidos del alumno correctamente',
              type: 'warning',
              confirmButtonText: 'Aceptar'
              });
              $("#txtapeE").focus();
            }
            else
            {

              if(seme.length==0){
                swal({
                title: '',
                text: 'Complete el semestre que cursa el alumno correctamente',
                type: 'warning',
                confirmButtonText: 'Aceptar'
                });
                $("#txtsemeE").focus();
              }
              else
              {
                if(gen=="0"){
                  swal({
                  title: '',
                  text: 'Seleccione el género del alumno correctamente',
                  type: 'warning',
                  confirmButtonText: 'Aceptar'
                  });
                  $("#gen").focus();
                }
                else
                {
                  if(mail.length=="0"){
                    swal({
                    title: '',
                    text: 'Ingrese el correo electrónico del alumno correctamente',
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
                      text: 'Ingrese el username del alumno correctamente',
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
                        text: 'Ingrese el password del alumno correctamente',
                        type: 'warning',
                        confirmButtonText: 'Aceptar'
                        });
                        $("#txtpswE").focus();
                      }
                      else
                      {
                          //alert("llegamos bien");

                          var token=$("#tokenLaravel").val();
                        $.post("alumnos/editar", { idP: idPer, idA: idAlum, idU:idUser, _token:token, cod:codigo, docdni:dni, name:nom, apell:ape, genro:gen, sem:seme, fono:telf, direc:dir, correo:mail, usu:user, pass:psw }).done(function(data) {


                          if(data.html=="0"){
                                swal({
                                title: 'Error',
                                text: data.msj,
                                type: 'warning',
                                confirmButtonText: 'Aceptar'
                                });
                                }

                        else{
                               $('#modalAlumnoE').modal('hide');        
                                $("#tabla").html(data.view);  
                                $("#tabla1").DataTable(); 
                                swal({
                                title: 'Éxito',
                                text: 'Se editó correctamente al alumno '+data.msj,
                                type: 'success',
                                confirmButtonText: 'Aceptar'
                                });
                                }



                        });


                      }
                    }
                  }
                }
              }
            }
          }

      }

    }

}
var fileExtension2 = ""; 
var fileName2 = ""; 
var fileSize2 ="";


function cambiarFoto() {
     
     fileExtension2 = ""; 
     fileName2 = ""; 
     fileSize2 ="";
        //obtenemos un array con los datos del archivo
        var file2 = $("#archivo2")[0].files[0];
        //obtenemos el nombre del archivo
        fileName2 = file2.name;
        //obtenemos la extensión del archivo
        fileExtension2 = fileName2.substring(fileName2.lastIndexOf('.') + 1);
        //obtenemos el tamaño del archivo
        fileSize2= file2.size;
        //obtenemos el tipo de archivo image/png ejemplo
        var fileType2 = file2.type;
        //mensaje con la información del archivo
        //$("#msjHC").html("<span class='info'>Imagen para subir: "+fileName+", peso total: "+fileSize+" bytes.</span>");

        $("#msjEditFoto").html(''+
'<div class="alert alert-info alert-dismissable">'+
  '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
  '<strong>Historia Digital:</strong> Documento para subir: '+fileName2+', peso total: '+fileSize2+' bytes.</div></div>');
    
}

function GuardarE2() {
  if(fileExtension2.length==0){
    $("#msjEditFoto").html(''+
              '<div class="alert alert-danger alert-dismissable">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Error:</strong> del sistema, no se puede cambiar de imagen porque no se ha ingresado ninguna imagen'+
                'válida</div></div>');

  }
  else{
    if(isImage(fileExtension2)){
    if(fileSize2<=200000){
var formData = new FormData($("#formulario2")[0]);

        $.ajax({
            url: 'alumnos/imagen2',  
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
                $("#msjEditFoto").html(''+
              '<div class="alert alert-info alert-dismissable">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Imagen:</strong> Subiendo el documento, por favor espere...</div></div>');
                        
            },
            //una vez finalizado correctamente
            success: function(data){

              //res=$.parseJSON(data);
              rutaimg=data;

                $("#msjEditFoto").html(''+
              '<div class="alert alert-success alert-dismissible">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Exito:</strong> Documentp subido exitosamente '+rutaimg+'</div></div>');
               
           
                    if(data.html=="0"){
                        swal({
                        title: 'Error',
                        text: data.msj,
                        type: 'warning',
                        confirmButtonText: 'Aceptar'
                        });
                        }

                        else{
                               
                        $("#tabla").html(data.view);  
                        $("#tabla1").DataTable(); 
                        $("#formuEditar").empty();
                        $("#formuEditar").html(data.view2);

                        var d = new Date();
                        var img = $('#imgEdit').attr('src');
                        img=img+"?";
                        $('#imgEdit').attr("src",img+d.getTime());
                        swal({
                        title: 'Éxito',
                        text: data.msj,
                        type: 'success',
                        confirmButtonText: 'Aceptar'
                        });
                        } 



                
            },
            //si ha ocurrido un error
            error: function(data){
                 $("#data").html(''+
              '<div class="alert alert-danger alert-dismissable">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Error:</strong> del sistema, no se subio el archivo</div></div>'+data);
                    
            }
        });








  }
      else{
        swal({
          title: '',
          text: 'El peso de la imagen '+fileName2+' es superior a los 200 Kb',
          type: 'warning',
          confirmButtonText: 'Aceptar'
        });
      }


  }

  else{
      swal({
          title: '',
          text: 'El archivo '+fileName2+' no es una imagen',
          type: 'warning',
          confirmButtonText: 'Aceptar'
        });
}
  }
}



    function deleteAlum(idPer,idAl,idusu) {
       // alert("delete");

               swal({
  title: '¿Usted está seguro(a)?',
  text: "Eliminará el alumno seleccionado, este proceso no puede ser revertido, Nota: Solo pueden ser eliminados alumnos que no tengan registros de procesos de la tutoría.",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Cancelar',
  confirmButtonText: 'Confirmar'
}).then(function () {


  var token=$("#tokenLaravel").val();
   $.post("alumnos/delete", { idA:idAl , _token:token }).done(function(data) {


                          if(data.html=="0"){
                                swal({
                                title: 'Error',
                                text: data.msj,
                                type: 'warning',
                                confirmButtonText: 'Aceptar'
                                });
                                }

                        else{
                                     
                                $("#tabla").html(data.view);  
                                $("#tabla1").DataTable(); 
                                swal({
                                title: 'Éxito',
                                text: 'Se eliminó correctamente al alumno '+data.msj,
                                type: 'success',
                                confirmButtonText: 'Aceptar'
                                });
                                }



                        });

 });

  

    }
</script>  
</body>
</html>
