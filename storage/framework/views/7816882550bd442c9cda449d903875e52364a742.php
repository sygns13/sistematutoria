      <?php $__currentLoopData = $alumnosEdit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-8" style="border-right: 3px solid rgba(60, 141, 188, 0.48);">
        <div class="box box-info">
            <div class="box-header with-border" >

            
              <h3 class="box-title" id="nombreAlumE">Alumno: <?php echo e($dato->nombres); ?> <?php echo e($dato->apellidos); ?></h3>

      
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">


              
                <div class="form-group">
                  <label for="txtcodE" class="col-sm-2 control-label">Código:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtcodE" placeholder="Código" value="<?php echo e($dato->codigo); ?>">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtDNIE" class="col-sm-2 control-label">DNI:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtDNIE" placeholder="DNI" value="<?php echo e($dato->DNI); ?>" onkeypress="return soloNumeros(event);">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtnomE" class="col-sm-2 control-label">Nombres:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtnomE" placeholder="Nombres" value="<?php echo e($dato->nombres); ?>">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtapeE" class="col-sm-2 control-label">Apellidos:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtapeE" placeholder="Apellidos" value="<?php echo e($dato->apellidos); ?>">
                  </div>
                </div>


                <div class="form-group">
                  <label for="cbugeneroE" class="col-sm-2 control-label">Genero:*</label>

                  <div class="col-sm-10">
                  <select class="form-control" id="cbugeneroE">
                    <option value="0">Seleccione...</option>
                  <?php if($dato->genero=="1"): ?>
                    <option value="1" selected>Varón</option>
                    <option value="2">Mujer</option>
                  <?php else: ?>
                    <option value="1" >Varón</option>
                    <option value="2" selected>Mujer</option>
                  <?php endif; ?>

                  </select>
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtsemeE" class="col-sm-2 control-label">Semestre que cursa:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtsemeE" placeholder="I,II,..." value="<?php echo e($dato->semestre); ?>">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txttelfE" class="col-sm-2 control-label">Teléfono:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txttelfE" placeholder="Ej. 999 9999" value="<?php echo e($dato->telf); ?>">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtdirE" class="col-sm-2 control-label">Dirección:</label>

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

                <button type="button" class="btn btn-default" onclick="CerrarE();">Cancelar</button>
                
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

      </div>


      <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-body box-profile">


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

          <button type="button" class="btn btn-default" onclick="CerrarE();">Cancelar</button>
            </div>

            <!-- /.box-body -->
          </div>

      </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>