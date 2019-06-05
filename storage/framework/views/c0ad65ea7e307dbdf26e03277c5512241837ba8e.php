        <?php $__currentLoopData = $tareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;"><?php echo e($dato->nombreTar); ?></h3></center>
              <button style="float: right;" type="button" class="btn btn-default" onclick="homeAlumno();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

            <input type="hidden" name="txtidTarea" id="txtidTarea" value="<?php echo e($dato->idTarea); ?>">


            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

               
                <p style="text-align:justify;">
                 <strong style="text-decoration: underline;"> Instrucciones:</strong> Revise la Tarea, y proceda a desarrollarla, si es posible responder la tarea en la caja de texto hacerlo, y/o adjunte la evidencia del desarrollo de su tarea en un archivo PDF de 2MB de peso máximo.
                 <br>
                 <br>
                <strong> Fecha Máxima de Entrega: </strong> <?php echo e(pasFechaVista($dato->fechatarea)); ?>


                 <br>
                 <br>

                 <strong> Descripción de la Tarea: </strong>
                </p>

                <?php 
                $cont=1;
                 ?>

                


                <div class="form-group">
                  <?php 
                    echo $dato->desctarea;
                   ?>

                </div>

     
 
                <hr>

                <center><strong> Ingrese el Desarrollo de la Tarea: </strong></center>
                
                <br><br>
                <p>Ingrese el desarrollo de la tarea dejada por el tutor en la caja de Texto, y/o mediante un archivo PDF de a lo máximo 2MB.</p>
                 

                 <div class="form-group">
                  <label for="txtContenido">Caja de Texto:</label>
                  <textarea id="txtContenido" name="txtContenido" class="form-control" rows="6"></textarea>

                </div>

                <br>
                <br>
                
                <div class="form-group" id="im">
                  <label for="txtdir" class="col-sm-2 control-label">Seleccione Archivo (.PDF) Opcional</label>

                  <div class="col-sm-10"> 
                    <form class="form-horizontal formarchivo" enctype="multipart/form-data" id="formulario" name="formulario">
                    <input id="archivo" name="archivo" type="file" multiple=true class="file-loading" accept=".pdf, .PDF" >
                     <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                     <input type="hidden" name="nomImg" id="nomImg" value="">
                     </form>
                   </div>
                </div>
              
                
       

                </div>
              <div class="box-footer" style="padding-top: 20px;">
                

                <button type="button" class="btn btn-primary" onclick="SaveTarea();" id="btnRespTarea"><i class="fa fa-check" aria-hidden="true" ></i> Enviar Desarrollo de la Tarea</button>

                <button type="button" class="btn btn-default" onclick="limpiarTarea();" id="btnLimpiarTarea"> Limpiar</button>

                <div id="divCarga2" style="display: inline-block;"><div id="dcarga0" style="display: none;"><img src="<?php echo e(asset('/img/ajax-loader.gif')); ?>"/></div></div>
              </div>
           

          
          </div>

          <div id="divEval02"></div>

          <script type="text/javascript">

                  CKEDITOR.replace( 'txtContenido' );

          

                  $("#archivo").fileinput({language: "es",  
                    allowedFileExtensions:['pdf', 'PDF'],
                    'showUpload':false,  
                    'previewFileType':'any', 
                    minFileCount: 1,
                    maxFileCount: 1});


                  $('#archivo').change(function(){

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

        var tamañoMostrar=redondear(parseFloat(fileSize)/1024);


        var formData = new FormData($("#formulario")[0]);
        //console.log(formData);

if(isPDF(fileExtension)){
    if(fileSize<=5242880){
                
        $.ajax({
            url: 'Tarea/imagen',
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
                        
            },
            //una vez finalizado correctamente
            success: function(data){

                alertify.success('Archivo subido Exitosamente');               
        
                $("#nomImg").val(data);
                $(".file-upload-indicator").hide();
                
            },
            //si ha ocurrido un error
            error: function(data){

                alertify.success("Error");

                 $('#formulario').each (function(){                            
                 this.reset();

            });
                    
            }
        });

  }
      else{

        alertify.error('Error: no se subio el archivo. El peso de la imagen '+fileName+' es superior a los 5 mb');

        $('#formulario').each (function(){                            
                              this.reset();                            
            });
        }


  }

  else{
      swal({
          title: '',
          text: 'El archivo '+fileName+' no es un archivo PDF',
          type: 'warning',
          confirmButtonText: 'Aceptar'
        });

        $('#formulario').each (function(){                            
          this.reset();                            
        });
      }

  });



$(".fileinput-remove-button").click(function() {
    limpiarImg();
    
})

 
function limpiarImg(){
  var token=$("#tokenLaravel").val();
  var nomImg=$("#nomImg").val();

  if(nomImg.length>0){

    $('#formulario').each (function(){                            
      this.reset();                            
    });

    $.post( "Tarea/borrarimagen", {img:nomImg, _token:token}).done(function(data) {
        $("#nomImg").val("");
        alertify.warning('Imagen eliminada');
    });
  }

}

function limpiarTarea() {
  limpiarImg();
  CKEDITOR.instances['txtContenido'].setData("");


}
                </script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>