<?php $__currentLoopData = $alumno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <h3 class="box-title">Nueva Evalaución al Alumno:</h3>
              <button style="float: right;" type="button" class="btn btn-default" onclick="home();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

            <input type="hidden" name="txtidTA" id="txtidTA" value="<?php echo e($idTA); ?>">
            <input type="hidden" name="txtidA" id="txtidA" value="<?php echo e($idA); ?>">
            <input type="hidden" name="txtidP" id="txtidP" value="<?php echo e($idP); ?>">

            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

                <div class="form-group">
                  <label for="txtAsunto">Etapa de la Tutoría:</label>
                  <select class="form-control" id="cbsEtapa">
                    <?php $__currentLoopData = $etapas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etapa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($etapa->id); ?>"><?php echo e($etapa->nometapa); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  
                </div>


                <div class="form-group">
                  <label for="txtAsunto">Título:</label>
                  <input type="text" class="form-control" id="txtAsunto" name="txtAsunto" placeholder="Ingrese Título de la Evalaución" onkeyup="EscribeLetras(event,this);">
                </div>
                
                <div class="form-group">
                  <label for="txtAlum">Alumno:</label>
                  <input type="email" class="form-control" id="txtAlum" name="txtAlum" placeholder="Ingrese Email" readonly="true" onkeypress="return noEscribe(event);" value="<?php echo e($dato->nombres); ?> <?php echo e($dato->apellidos); ?>"> 
                </div>

         
              <!-- /.box-body -->

              <div class="box-footer">
                

                <button type="button" class="btn btn-primary" onclick="Paso1Eval();" id="btnsaveInf"><i class="fa fa-check" aria-hidden="true" ></i> Siguiente</button>

                <button type="button" class="btn btn-default" onclick="limpiar1Eval();" id="btnlimInf"> Limpiar</button>

                <div id="divCarga0" style="display: inline-block;"><div id="dcarga0" style="display: none;"><img src="<?php echo e(asset('/img/ajax-loader.gif')); ?>"/></div></div>
              </div>
           

          </div>
          </div>

          <div id="divEval02"></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>