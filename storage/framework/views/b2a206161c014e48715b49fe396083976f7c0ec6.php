        <?php $__currentLoopData = $evaluacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;">Detalles de la Evaluación</h3></center>
                            <button style="float: right;" type="button" class="btn btn-default" onclick="homePerfil1Alumno();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>

          <button style="float: right; margin-right: 10px;" type="button" class="btn btn-success" onclick="impEvaluacion();"><i class="fa fa-print" aria-hidden="true"></i> 
          Imprimir</button>
            </div>

            <input type="hidden" name="txtidEval" id="txtidEval" value="<?php echo e($dato->id); ?>">


            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body" id="divEvaluacion">
                 <center><h4><?php echo e($dato->deseval); ?></h4></center>

                <form>
                <p style="text-align:justify;">
                 <strong> Alumno: </strong> <?php echo e($dato->nomalumno); ?> <?php echo e($dato->apealumno); ?>


 

                 <p>
                  <strong>  Nota Promedio: <?php echo e(number_format($notaProm, 2, ',', ' ')); ?></strong>
                    <?php if($notaProm>4): ?>
                      Nota Promedio Totalmente Adecuada
                    <?php elseif($notaProm>3): ?>
                      Nota Promedio Regularmente Adecuada
                    <?php elseif($notaProm>2): ?>
                      Nota Promedio Medianamente Adecuada
                    <?php elseif($notaProm>1): ?>
                      Nota Promedio no Adecuada
                    <?php elseif($notaProm>0): ?>
                      Nota Promedio Totalmente Inadecuada
                      <?php else: ?>
                      Evaluación no Calificada
                    <?php endif; ?>
                   
                  </p>
                <strong> Preguntas: </strong>
                </p>

                <?php 
                $cont=1;
                 ?>

                <?php $__currentLoopData = $preguntas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pregs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                <div class="form-group col-sm-12">
                  <label for="txtPregunta<?php echo e($pregs->idDetPreg); ?>"><?php echo e($cont); ?>.- <?php echo e($pregs->pregunta); ?></label>

                  
                  <p id="resp<?php echo e($pregs->idDetPreg); ?>" style="text-align: justify;">
                     <label style="font-weight: bold;text-decoration: underline;">Respuesta:</label> <?php echo e($pregs->resultado); ?>

                  </p>

                  <div class="col-sm-2">
                   <label for="califResp<?php echo e($pregs->idresult); ?>">Calificación: </label></div> 
                <div class="col-sm-10">
                    <?php if($pregs->calif=="0"): ?>
                        No calificada
                    <?php elseif($pregs->calif=="5"): ?>
                        Respuesta totalmente adecuada / muy buena
                    <?php elseif($pregs->calif=="4"): ?>
                        Respuesta regularmente adecuada / buena
                    <?php elseif($pregs->calif=="3"): ?>
                        Respuesta  medianamente adecuada / regular
                    <?php elseif($pregs->calif=="2"): ?>
                        Respuesta no adecuada / erronea
                    <?php elseif($pregs->calif=="1"): ?>
                        Respuesta Indadecuada / totalmente erronea

                        <?php endif; ?>                  

                </div>
        

                </div>

                <?php 
                $cont++;
                 ?>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



           
</form>
          </div>
          </div>

          <div id="divEval02"></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>