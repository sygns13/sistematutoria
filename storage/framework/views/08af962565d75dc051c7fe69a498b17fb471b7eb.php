
<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;">Mi Perfil</h3></center>
              <button style="float: right;" type="button" class="btn btn-default" onclick="homePerfil();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

    

 <div class="box-body">

      <?php $__currentLoopData = $alumno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-8" style="border-right: 3px solid rgba(60, 141, 188, 0.48);">
 
            <div class="box-header with-border" >

            
              <h3 class="box-title" id="nombreAlumE">Alumno: <?php echo e($dato->nombres); ?> <?php echo e($dato->apellidos); ?></h3>

      
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">


              
                <div class="form-group">
                  <label for="txtcodE" class="col-sm-2 control-label">Código:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtcodE" placeholder="Código" value="<?php echo e($dato->codigo); ?>" readonly="true" onkeypress="return noEscribe(event);">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtDNIE" class="col-sm-2 control-label">DNI:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtDNIE" placeholder="DNI" value="<?php echo e($dato->DNI); ?>" onkeypress="return soloNumeros(event);" readonly="true" onkeypress="return noEscribe(event);">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtnomE" class="col-sm-2 control-label">Nombres:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtnomE" placeholder="Nombres" value="<?php echo e($dato->nombres); ?>" readonly="true" onkeypress="return noEscribe(event);">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtapeE" class="col-sm-2 control-label">Apellidos:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtapeE" placeholder="Apellidos" value="<?php echo e($dato->apellidos); ?>" readonly="true" onkeypress="return noEscribe(event);">
                  </div>
                </div>


                <div class="form-group">
                  <label for="cbugeneroE" class="col-sm-2 control-label">Genero:</label>

                  <div class="col-sm-10">
                  
                  
                  <?php if($dato->genero=="1"): ?>
                    <input type="text" class="form-control" id="txtgenE" placeholder="Genero" value="Varón" readonly="true" onkeypress="return noEscribe(event);">
                  <?php else: ?>
                    <input type="text" class="form-control" id="txtgenE" placeholder="Genero" value="Mujer" readonly="true" onkeypress="return noEscribe(event);">
                  <?php endif; ?>

                  </select>
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtsemeE" class="col-sm-2 control-label">Semestre que cursa:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtsemeE" placeholder="I,II,..." value="<?php echo e($dato->semestre); ?>" readonly="true" onkeypress="return noEscribe(event);">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txttelfE" class="col-sm-2 control-label">Teléfono:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txttelfE" placeholder="Ej. 999 9999" value="<?php echo e($dato->telf); ?>">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtdirE" class="col-sm-2 control-label">Dirección:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtdirE" placeholder="Av. Jr. Psje." value="<?php echo e($dato->direccion); ?>">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtmailE" class="col-sm-2 control-label">Email:*</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="txtmailE" placeholder="email@dominio.com/net" value="<?php echo e($dato->correo); ?>" required>
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtuserE" class="col-sm-2 control-label">Usuario:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtuserE" placeholder="username" value="<?php echo e($dato->username); ?>">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtpswE" class="col-sm-2 control-label">Password:*</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="txtpswE" placeholder="password">
                  </div>
                </div>

                <input type="hidden" id="idPerE" value="<?php echo e($dato->idper); ?>">
                <input type="hidden" id="idAluE" value="<?php echo e($dato->idalum); ?>">
                <input type="hidden" id="idUsuE" value="<?php echo e($dato->idusu); ?>">

                

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-info" onclick="GuardarE1();">Guardar</button>

                <button type="reset" class="btn btn-default">Cancelar</button>
                
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

    

      <div class="col-md-4">
        
       


              <?php if($dato->imagen==""): ?>

                        <?php if($dato->genero=="1"): ?>
                          <img src="<?php echo e(asset('/img/av3.png')); ?>" class="profile-user-img img-responsive img-circle" alt="User Image" style="height: 80px;width: 80px;" id="imgEdit" />

                        <?php elseif($dato->genero=="2"): ?>
                          <img src="<?php echo e(asset('/img/av2.jpg')); ?>" class="profile-user-img img-responsive img-circle" alt="User Image" style="height: 80px;width: 80px;" id="imgEdit" />
                        <?php endif; ?>
                       <?php else: ?>
                         <img src="<?php echo e(asset($dato->imagen)); ?>" class="profile-user-img img-responsive img-circle" alt="User Image" style="height: 80px;width: 80px;" id="imgEdit" />
                       <?php endif; ?>

 

              <h3 class="profile-username text-center">Foto de Perfil</h3>

              <p class="text-muted text-center">Alumno.</p>



          <form enctype="multipart/form-data" class="formarchivo2" id="formulario2" name="formulario2">
          <input name="archivo2" type="file" id="archivo2" class="archivo form-control" onchange="cambiarFoto();"
          accept=".png, .jpg, .jpeg, .gif, .PNG, .JPG, .JPEG, .GIF"/><br /><br />

          <input type="hidden" name="ocudni2" id="ocudni2" value="<?php echo e($dato->DNI); ?>" >
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <input type="hidden" name="idPerEimg" id="idPerEimg" value="<?php echo e($dato->idper); ?>">
          <input type="hidden" name="idAluEimg" id="idAluEimg" value="<?php echo e($dato->idalum); ?>">
          <input type="hidden" name="idUsuEimg" id="idUsuEimg" value="<?php echo e($dato->idusu); ?>">

          <div class="col-sm-12" id="msjEditFoto"></div>

          
             </form>

          <button type="button" class="btn btn-info" onclick="GuardarE2();">Guardar</button>

 
         

         

      </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

          
          </div>

          <div id="divEval02"></div>

<script type="text/javascript">
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
  '<strong>Historia Digital:</strong> Documento para subir: '+fileName2+', peso total: '+(fileSize2/1024)+' Kbytes.</div></div>');
    
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
    if(fileSize2<=2097152){
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
                               

                          $("#imgEdit").attr("src","/img/perfilAlumnos/"+rutaimg+"");
                          
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


</script>
