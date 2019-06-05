        <?php $__currentLoopData = $sesion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="box box-primary" id="divEval01">

  <form>
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;"><?php echo e($dato->nombresesion); ?></h3></center>
              <button style="float: right;" type="button" class="btn btn-default" onclick="homeSesion();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

            <input type="hidden" name="txtidSesion" id="txtidSesion" value="<?php echo e($dato->idSesion); ?>">


            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

               
                <p style="text-align:justify;">
                  <p style="text-align:justify;">

                 <strong style="text-decoration: underline;"> Instrucciones:</strong> Según la Sesión de Trabajo entre usted y el alumno, proceda a realizar la calificación que a su criterio merece el desarrollo de la Sesión, eligiendo entre 05 valores posibles: <br><br> (5) Desarrollo totalmente adecuado / muy bueno, (4) Desarrollo regularmente adecuado / bueno, (3) Desarrollo  medianamente adecuado / regular, (2) Desarrollo no adecuado / erroneo, (1) Desarrollo Indadecuado / totalmente erroneo. Luego ingrese una pequeña descripción sustentando la calificación ingresada.
                 <br>
                 <br>

                  <strong> Alumno: </strong> <?php echo e($dato->nomalumno); ?> <?php echo e($dato->apealumno); ?>


                 <br>
                 <br>
                 
                <strong> Fecha de Sesión: </strong> <?php echo e(pasFechaVista($dato->fechasesion)); ?>


                 <br>
                 <br>

                 <strong> Hora de Sesión: </strong> <?php echo e($dato->horasesion); ?>


                 <br>
                 <br>

                 <strong> Tipo de Sesión: </strong> <?php if(strval($dato->tiposesion)=="1"): ?> Presencial <?php elseif(strval($dato->tiposesion)=="2"): ?> Virtual <?php endif; ?>:

                 <br>
                 <br>

                 <strong> Descripción de la Sesión: </strong><br>

                </p>


                <div class="form-group">
                  <?php 
                    echo $dato->detallesSesion;
                   ?>

                </div>

     
 
              

                <?php if(strval($dato->confirmado)=="0"): ?>

              

              <?php elseif(strval($dato->confirmado)=="1"): ?>
                <hr>
              <span class="label label-success" style="font-size: 100%">Participación Confirmada por el Alumno</span>

             
              <?php elseif(strval($dato->confirmado)=="2"): ?>
                         <hr>   
                          <span class="label label-warning" style="font-size: 100%">Solicitud de Cancelación Enviada por el Alumno</span>

                  <br>
                 <br>

                 <strong> Justificación de la Solicitud del Alumno: </strong> <?php echo e($dato->descCalifAlumno); ?>

                         
              <?php endif; ?>


                <hr>
                 
                  <center><strong> Calificación del Desarrollo de la Sesión de Trabajo: </strong></center>
                <br>

                <div class="form-group col-md-6" style="padding-left: 0px;">
                   <select class="form-control" id="cbuCalifSesion">

                    <?php if(strval($dato->califTutor)=="0"): ?>
                        <option value="0" selected>Seleccione...</option>
                        <option value="5">(5) Desarrollo totalmente adecuado / muy bueno</option>
                        <option value="4">(4) Desarrollo regularmente adecuadao / bueno</option>
                        <option value="3">(3) Desarrollo  medianamente adecuado / regular</option>
                        <option value="2">(2) Desarrollo no adecuado / erroneo</option>
                        <option value="1">(1) Desarrollo Indadecuado / totalmente erroneo</option>
                    <?php elseif(strval($dato->califTutor)=="5"): ?>
                    <option value="0">Seleccione...</option>
                        <option value="5" selected>(5) Desarrollo totalmente adecuado / muy bueno</option>
                        <option value="4">(4) Desarrollo regularmente adecuadao / bueno</option>
                        <option value="3">(3) Desarrollo  medianamente adecuado / regular</option>
                        <option value="2">(2) Desarrollo no adecuado / erroneo</option>
                        <option value="1">(1) Desarrollo Indadecuado / totalmente erroneo</option>
                    <?php elseif(strval($dato->califTutor)=="4"): ?>
                    <option value="0">Seleccione...</option>
                        <option value="5">(5) Desarrollo totalmente adecuado / muy bueno</option>
                        <option value="4" selected>(4) Desarrollo regularmente adecuadao / bueno</option>
                        <option value="3">(3) Desarrollo  medianamente adecuado / regular</option>
                        <option value="2">(2) Desarrollo no adecuado / erroneo</option>
                        <option value="1">(1) Desarrollo Indadecuado / totalmente erroneo</option>
                    <?php elseif(strval($dato->califTutor)=="3"): ?>
                    <option value="0" >Seleccione...</option>
                        <option value="5">(5) Desarrollo totalmente adecuado / muy bueno</option>
                        <option value="4">(4) Desarrollo regularmente adecuadao / bueno</option>
                        <option value="3" selected>(3) Desarrollo  medianamente adecuado / regular</option>
                        <option value="2">(2) Desarrollo no adecuado / erroneo</option>
                        <option value="1">(1) Desarrollo Indadecuado / totalmente erroneo</option>
                    <?php elseif(strval($dato->califTutor)=="2"): ?>
                    <option value="0" >Seleccione...</option>
                        <option value="5">(5) Desarrollo totalmente adecuado / muy bueno</option>
                        <option value="4">(4) Desarrollo regularmente adecuadao / bueno</option>
                        <option value="3">(3) Desarrollo  medianamente adecuado / regular</option>
                        <option value="2" selected>(2) Desarrollo no adecuado / erroneo</option>
                        <option value="1">(1) Desarrollo Indadecuado / totalmente erroneo</option>
                    <?php elseif(strval($dato->califTutor)=="1"): ?>
                    <option value="0" >Seleccione...</option>
                        <option value="5">(5) Desarrollo totalmente adecuado / muy bueno</option>
                        <option value="4">(4) Desarrollo regularmente adecuadao / bueno</option>
                        <option value="3">(3) Desarrollo  medianamente adecuado / regular</option>
                        <option value="2">(2) Desarrollo no adecuado / erroneo</option>
                        <option value="1" selected>(1) Desarrollo Indadecuado / totalmente erroneo</option>
                    <?php endif; ?>

                      </select>
                </div>

                <br>
                <br>
                <br>
              
                 <div class="form-group">
                  <label for="txtContenido">Motivo de la Calificación:</label>
                  <textarea id="txtContenidoCalif" name="txtContenidoCalif" class="form-control" rows="6"><?php echo e($dato->resultSesion); ?></textarea>

                </div>






                </div>
              <div class="box-footer" style="padding-top: 20px;">
                

               <button type="button" class="btn btn-primary" onclick="SaveCalifSesion();" id="btnCalifSesion"><i class="fa fa-save" aria-hidden="true" ></i> Registrar Calificación</button>

                <button type="reset" class="btn btn-default" onclick="limpiarCalifSesion();" id="btnLimCalifSesion"> Limpiar</button>

                <div id="divCarga2" style="display: inline-block;"><div id="dcarga0" style="display: none;"><img src="<?php echo e(asset('/img/ajax-loader.gif')); ?>"/></div></div>
              </div>

          </form>
          </div>

          <div id="divEval02"></div>

          <script type="text/javascript">

                 

function limpiarCalifSesion() {

  $("#btnCalifSesion").removeAttr("disabled");
  $("#btnLimCalifSesion").removeAttr("disabled");

 
  $("#cbuCalifSesion").focus();


}
                </script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>