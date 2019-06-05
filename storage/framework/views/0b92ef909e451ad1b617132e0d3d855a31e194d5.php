      <?php $__currentLoopData = $editTutor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     
        <div class="box box-info" style="border-bottom: 0px;">
            


            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body" style="border-bottom: 0px;">

                <div class="col-md-8" >
                  <form class="form-horizontal">
                <h3 class="profile-username text-center" style="padding-bottom: 40px;padding-top: 10px;">Datos Personales</h3>
              
           


                <div class="form-group">
                  <label for="cbutipodocE" class="col-sm-2 control-label">Tipo Doc:*</label>

                  <div class="col-sm-4">
                  <select class="form-control" id="cbutipodocE">

                  <?php if($dato->tipodoc=="1"): ?>
                    <option value="1">DNI</option>
                    <option value="2">Carnet de Extranjería</option>
                  <?php elseif($dato->tipodoc=="2"): ?>
                    <option value="1">DNI</option>
                    <option value="2" selected>Carnet de Extranjería</option>
                  <?php else: ?>
                    <option value="1">DNI</option>
                    <option value="2">Carnet de Extranjería</option>
                  <?php endif; ?>
                    
                  </select>
                   </div>
                  <label for="txtDNIE" class="col-sm-2 control-label">Número:*</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="txtDNIE" placeholder="DNI/CE" maxlength="15" onkeypress="return soloNumeros(event);" value="<?php echo e($dato->dni); ?>">
                  </div>
                 

                </div>

           


                <div class="form-group">
                  <label for="txtnomE" class="col-sm-2 control-label">Nombres:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtnomE" placeholder="Nombres" maxlength="500" value="<?php echo e($dato->nombres); ?>" onkeyup="EscribeLetras(event,this);">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtapeE" class="col-sm-2 control-label">Apellidos:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtapeE" placeholder="Apellidos" maxlength="500" value="<?php echo e($dato->apellidos); ?>" onkeyup="EscribeLetras(event,this);">
                  </div>
                </div>


                <div class="form-group">
                  <label for="cbugeneroE" class="col-sm-2 control-label">Genero:*</label>

                  <div class="col-sm-4">
                  <select class="form-control" id="cbugeneroE">
                  <?php if($dato->genero=="1"): ?>
                    <option value="0">Seleccione...</option>
                    <option value="1" selected>Varón</option>
                    <option value="2">Mujer</option>
                  <?php elseif($dato->genero=="2"): ?>
                    <option value="0">Seleccione...</option>
                    <option value="1">Varón</option>
                    <option value="2" selected>Mujer</option>
                  <?php else: ?>
                    <option value="0">Seleccione...</option>
                    <option value="1">Varón</option>
                    <option value="2">Mujer</option>
                  <?php endif; ?>
                    
                  </select>
                  </div>
                

                <label for="txttelfE" class="col-sm-2 control-label">Teléfono:</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="txttelfE" placeholder="Ej. 043-123456" maxlength="50" value="<?php echo e($dato->telf); ?>" onkeyup="EscribeLetras(event,this);">
                  </div>

                  
                </div>


    




                <div class="form-group">
                  <label for="txtdirE" class="col-sm-2 control-label">Dirección:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtdirE" placeholder="Av. Jr. Psje." maxlength="500" value="<?php echo e($dato->direccion); ?>" onkeyup="EscribeLetras(event,this);">
                  </div>




                </div>


                <div class="form-group">
                  <label for="txtespE" class="col-sm-2 control-label">Especialidad.</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtespE" placeholder="Especialidad en su Carrera Universitaria" maxlength="500" value="<?php echo e($dato->esptutor); ?>" onkeyup="EscribeLetras(event,this);">
                  </div>         
                </div>


                <div class="form-group">
                  <label for="txtVideoE" class="col-sm-2 control-label">Video de Presentación:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtVideoE" placeholder="Iframe del Video" maxlength="2000" value="<?php echo e($dato->video); ?>">
                  </div>
                </div>

                <div class="form-group" style="margin-left: 20px;margin-top: 40px;">
                  <button type="button" class="btn btn-info" id="btnGuardarE1" onclick="seguroSave1();">Guardar</button>
                  
                </div>

               
                </form>
              </div>

              <div class="col-md-4" style="border-left: 3px solid rgba(60, 141, 188, 0.48);">
              <h3 class="profile-username text-center" style="padding-top: 10px;">Imagen De Perfil</h3>
  

<?php 
$fotoe="";
 ?>

              <?php if($dato->imagen=="" || $dato->imagen==null): ?>

                        <?php if($dato->genero=="1"): ?>
                          <img src="<?php echo e(asset('/img/av3.png')); ?>" class="profile-user-img img-responsive img-circle" alt="Imagen del usuario" style="height: 80px;width: 80px;" id="imgPerfilE" />
                          <?php 
                          $fotoe="av3.png";
                           ?>

                        <?php elseif($dato->genero=="2"): ?>
                          <img src="<?php echo e(asset('/img/av2.jpg')); ?>" class="profile-user-img img-responsive img-circle" alt="Imagen del usuario" style="height: 80px;width: 80px;" id="imgPerfilE" />
                          <?php 
                          $fotoe="av2.jpg";
                           ?>

                        <?php elseif($dato->genero==null): ?>
                          <img src="<?php echo e(asset('/img/av3.png')); ?>" class="profile-user-img img-responsive img-circle" alt="Imagen del usuario" style="height: 80px;width: 80px;" id="imgPerfilE" />
                          <?php 
                          $fotoe="av3.png";
                           ?>
                        <?php endif; ?>
                       <?php else: ?>
                        <?php 
                       $ruta="/img/perfilTutores/".$dato->imagen;
                        $fotoe=$dato->imagen;
                        ?>
                         <img src="<?php echo e(asset($ruta)); ?>" class="profile-user-img img-responsive img-circle" alt="Imagen del usuario" style="height: 80px;width: 80px;" id="imgPerfilE" />
                       <?php endif; ?>


            

 

              

              <p class="text-muted text-center">Imagen De Perfil</p>



          <form enctype="multipart/form-data" class="formarchivoE" id="formularioE" name="formularioE">

          <input name="archivoE" type="file" id="archivoE" class="archivo form-control"
          accept=".png, .jpg, .jpeg, .gif, .PNG, .JPG, .JPEG, .GIF" onchange="cambioImagen();" /><br /><br />

          <input type="hidden" name="efoto" id="efoto" value="<?php echo e($fotoe); ?>">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <input type="hidden" name="nomImgE" id="nomImgE" value="<?php echo e($fotoe); ?>">
      
          <div class="form-group">  
             <button type="button" class="btn btn-info" id="btnGuardarE2" onclick="seguroSave3();">Guardar</button>
             <input type="reset" class="btn btn-default" id="btnCancel" value="Cancelar" onclick="cancelImg();">
          </div>

          <div class="col-sm-12" id="msjFileE"></div>

          
             </form>

             <hr>

             <form role="form">
             <h3 class="profile-username text-center">Datos De Usuario</h3>
              <div class="box-body">
                <div class="form-group">
                  <label for="txtmailE">Email:*</label>
                  <input type="text" class="form-control" id="txtmailE" placeholder="email@dominio.com/net" maxlength="500" value="<?php echo e($dato->email); ?>" onkeyup="EscribeLetras(event,this);">
                </div>
                <div class="form-group">
                  <label for="txtuserE">Usuario:*</label>
                  <input type="text" class="form-control" id="txtuserE" placeholder="username" maxlength="225" value="<?php echo e($dato->name); ?>" onkeyup="EscribeLetras(event,this);">
                </div>
                <div class="form-group">
                  <label for="txtpswE">Password:*</label>
                  <input type="password" class="form-control" id="txtpswE" placeholder="Password" maxlength="225" >
                </div>

                <div class="form-group" style="margin-top: 40px;">
                  <button type="button" class="btn btn-info" id="btnGuardarE3" onclick="seguroSave2();">Guardar</button>
                  
                </div>
  

              </div>
              <!-- /.box-body -->

   
            </form>


            </div>

          </div>

              <!-- /.box-body -->
            
              <!-- /.box-footer -->
           

          </div>

      </div>

     
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>