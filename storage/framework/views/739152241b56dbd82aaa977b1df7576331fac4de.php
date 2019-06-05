        <?php $__currentLoopData = $evaluacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;">Realizar Diagnóstico del Alumno </h3></center>
              <button style="float: right;" type="button" class="btn btn-default" onclick="homeEvaluacion();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

            <input type="hidden" name="txtidEval" id="txtidEval" value="<?php echo e($dato->id); ?>">


            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

                <form>

                  <p>
                    Evaluación: <strong style="text-decoration: underline;"><?php echo e($dato->deseval); ?></strong>
                  </p>

                  <p>
                    Alumno: <strong><?php echo e($dato->nomalumno); ?> <?php echo e($dato->apealumno); ?></strong>
                  </p>

                  <p>
                    Nota Promedio: <strong><?php echo e(number_format($notaProm, 2, ',', ' ')); ?></strong>
                    <?php if($notaProm>4): ?>
                      Nota Promedio Totalmente Adecuada
                    <?php elseif($notaProm>3): ?>
                      Nota Promedio Regularmente Adecuada
                    <?php elseif($notaProm>2): ?>
                      Nota Promedio Medianamente Adecuada
                    <?php elseif($notaProm>1): ?>
                      Nota Promedio no Adecuada
                    <?php elseif($notaProm>=0): ?>
                      Nota Promedio Totalmente Inadecuada
                    <?php endif; ?>
                   
                  </p>

                  <div class="form-group">
                <button type="button" class="btn btn-success" onclick="verPregs();" id="btnVerPregs"><i class="fa fa-eye" aria-hidden="true" ></i> Ver las Preguntas y Respuestas de la Evaluación</button>
                <input type="hidden" name="ctrolBtnPregs" id="ctrolBtnPregs" value="0">
                </div>


                <div style="display: none;" id="divContentPregs">
                  <hr>
                                  <?php 
                $cont=1;
                 ?>
                <?php $__currentLoopData = $preguntas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pregs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <br>
                 <br>
                <strong> Preguntas: </strong>
                <div class="form-group">
                  <label for="txtPregunta<?php echo e($pregs->idDetPreg); ?>"><?php echo e($cont); ?>.- <?php echo e($pregs->pregunta); ?></label>

                  
                  <p id="resp<?php echo e($pregs->idDetPreg); ?>" style="text-align: justify;">
                     <label style="font-weight: bold;text-decoration: underline;">Respuesta:</label> <?php echo e($pregs->resultado); ?>

                  </p>

                  <div class="col-sm-1">
                   <label for="califResp<?php echo e($pregs->idresult); ?>">Calificación: </label></div> 
                <div class="col-sm-4">


                    <?php if($pregs->calif=="5"): ?>
                        (5) Respuesta totalmente adecuada / muy buena
                    <?php elseif($pregs->calif=="4"): ?>
                        (4) Respuesta regularmente adecuada / buena
                    <?php elseif($pregs->calif=="3"): ?>
                        (3) Respuesta  medianamente adecuada / regular
                    <?php elseif($pregs->calif=="2"): ?>
                        (2) Respuesta no adecuada / erronea
                    <?php elseif($pregs->calif=="1"): ?>
                        (1) Respuesta Indadecuada / totalmente erronea

                        <?php endif; ?>                  


                </div>
                <br>
                <br>
                </div>

                <?php 
                $cont++;
                 ?>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <hr>
                </div>




                 <div class="form-group">
                  <center><h4>Complete la Información del Diagnóstico</h4></center>
                                  <p style="text-align:justify;"><br>
                 <strong style="text-decoration: underline;"> Instrucciones:</strong> A partir de la siguiente evaluación calificada por su Persona en la escala de valor, realize un diagnóstico del estado situacional del alumno de acorde a la calificación obtenida.
                 
                
                </p>
                </div>

                 <div class="form-group">
                  <label for="txtAsuntoD">Título o Asunto:</label>
                  <input type="text" class="form-control" id="txtAsuntoD" name="txtAsuntoD" placeholder="Ingrese Asunto" onkeyup="EscribeLetras(event,this);">
                </div>
                <div class="form-group">
                  <label for="txtAlum">Alumno:</label>
                  <input type="email" class="form-control" id="txtAlum" name="txtAlum" placeholder="Ingrese Email" readonly="true" onkeypress="return noEscribe(event);" value="<?php echo e($dato->nomalumno); ?> <?php echo e($dato->apealumno); ?>"> 
                </div>

                <div class="form-group">
                  <label for="txtContenido">Descripción del Informe:</label>
                  <textarea id="txtContenido" name="txtContenido" class="form-control" rows="6"></textarea>

                  <script type="text/javascript">
                    CKEDITOR.replace( 'txtContenido' );
                  </script>
                </div>


              <div class="box-footer">
                

                <button type="button" class="btn btn-primary" onclick="SaveDiagnost();" id="btnRegDiag"><i class="fa fa-save" aria-hidden="true" ></i> Registrar Diagnóstico</button>

                <button type="reset" class="btn btn-default" onclick="LimpiarDiagnost();" id="btnLimRespEval"> Limpiar</button>

                <div id="divCarga2" style="display: inline-block;"><div id="dcarga0" style="display: none;"><img src="<?php echo e(asset('/img/ajax-loader.gif')); ?>"/></div></div>
              </div>
           
</form>
          </div>
          </div>

          <div id="divEval02"></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>