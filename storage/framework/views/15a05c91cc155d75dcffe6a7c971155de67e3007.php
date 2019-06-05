        <?php $__currentLoopData = $sesion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;"><?php echo e($dato->nombresesion); ?></h3></center>
              <button style="float: right;" type="button" class="btn btn-default" onclick="homeAlumno();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

            <input type="hidden" name="txtidSesion" id="txtidSesion" value="<?php echo e($dato->idSesion); ?>">


            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

               
                <p style="text-align:justify;">
                 
                <strong> Fecha de Sesión: </strong> <?php echo e(pasFechaVista($dato->fechasesion)); ?>


                 <br>
                 <br>

                 <strong> Hora de Sesión: </strong> <?php echo e($dato->horasesion); ?>


                 <br>
                 <br>

                 <strong> Tipo de Sesión: </strong> <?php if(strval($dato->tiposesion)=="1"): ?> Presencial <?php elseif(strval($dato->tiposesion)=="2"): ?> Virtual <?php endif; ?>:

                 <br>
                 <br>

                 <strong> Descripción de la Tarea: </strong><br>

                </p>


                <div class="form-group">
                  <?php 
                    echo $dato->detallesSesion;
                   ?>

                </div>

     
 
                <hr>
                <?php 
                //var_dump(strval($dato->estadosesion));
                 ?>

            <?php if(strval($dato->estadosesion)=="1"): ?>
                <?php if(strval($dato->confirmado)=="0"): ?>

                <p>Confirme su participación a la Sesión, o solicite su cancelación, indicando el motivo</p>
                 

                 <div class="form-group">
                  <label for="txtContenido" class="col-sm-2 control-label">Motivo de Cancelación</label>
                  <div class="col-sm-10"> 
                  <textarea id="txtContenido" name="txtContenido" class="form-control" rows="6"></textarea>
                   </div>
                </div>


                </div>
              <div class="box-footer" style="padding-top: 20px;">
                

                <button type="button" class="btn btn-primary" onclick="SaveParticipacion();" id="btnConfirmSesion"><i class="fa fa-check-square-o" aria-hidden="true" ></i> Confirmar Participación</button>

                <button type="button" class="btn btn-danger" onclick="SaveCancelacion();" id="btnSolCancel"><i class="fa fa-check" aria-hidden="true" ></i> Solicitar Cancelación</button>

                <button type="button" class="btn btn-default" onclick="limpiarSesion();" id="btnLimSesion"> Limpiar</button>

                <div id="divCarga2" style="display: inline-block;"><div id="dcarga0" style="display: none;"><img src="<?php echo e(asset('/img/ajax-loader.gif')); ?>"/></div></div>
              </div>

              <?php elseif(strval($dato->confirmado)=="1"): ?>
              
              <span class="label label-success" style="font-size: 100%">Participación Confirmada</span>

              </div>
              <?php elseif(strval($dato->confirmado)=="2"): ?>
                          
                          <span class="label label-warning" style="font-size: 100%">Solicitud de Cancelación Enviada</span>


                <div class="form-group">
                <p><strong> Justificación del Alumno por la Solicitud: </strong>

                </p>
                </div>
                <div class="form-group">
                  <?php 
                    echo $dato->descCalifAlumno;
                   ?>

                </div>


                          </div>
              <?php endif; ?>

          <?php elseif(strval($dato->estadosesion)=="2"): ?>

          <?php elseif(strval($dato->estadosesion)=="3"): ?>

            <?php if(strval($dato->confirmado)=="0"): ?>
            <?php elseif(strval($dato->confirmado)=="1"): ?>
              <span class="label label-success" style="font-size: 100%">Participación Confirmada</span>
            <?php elseif(strval($dato->confirmado)=="2"): ?>
              <span class="label label-warning" style="font-size: 100%">Solicitud de Cancelación Enviada</span>
              <br>
              <br>
               <div class="form-group">
                <p><strong> Justificación del Alumno por la Solicitud: </strong>

                </p>
                </div>
                <div class="form-group">
                  <?php 
                    echo $dato->descCalifAlumno;
                   ?>

                </div>


            <?php endif; ?>

            <hr>
            <div class="form-group">
              <span class="label label-danger" style="font-size: 100%">Sesión Cancelada por el Tutor</span>
              </div>
            <div class="form-group">
                <p> <strong style="text-decoration: underline;">Motivo:</strong> <?php 
                    echo $dato->resultSesion;
                   ?>
                  </p>
                </div>

            </div>
          <?php endif; ?>


          
          </div>

          <div id="divEval02"></div>

          <script type="text/javascript">

                 

function limpiarSesion() {
  $("#txtContenido").val("");
  $("#txtContenido").focus();


}
                </script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>