        <?php $__currentLoopData = $tarea; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;">Detalles de la Tarea</h3></center>
                            <button style="float: right;" type="button" class="btn btn-default" onclick="homePerfil1Alumno();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>

          <button style="float: right; margin-right: 10px;" type="button" class="btn btn-success" onclick="impTarea();"><i class="fa fa-print" aria-hidden="true"></i> 
          Imprimir</button>
            </div>

             <input type="hidden" name="txtidTarea" id="txtidTarea" value="<?php echo e($dato->idTarea); ?>">


            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body" id="divImpTarea">

                <center><h4><?php echo e($dato->nombreTar); ?></h4></center>

                <form>
                  <p style="text-align:justify;">
                
                <strong> Alumno: </strong> <?php echo e($dato->nomalumno); ?> <?php echo e($dato->apealumno); ?>


                 <br>
                 <br>

                <strong> Etapa de la Tutoría: </strong> <?php echo e($dato->etapa); ?>


                 <br>
                 <br>

                 <strong> Evaluación Base de la Tarea: </strong> <?php echo e($dato->deseval); ?>


                 <br>
                 <br>

                 <strong> Diagnóstico Base de la Tarea: </strong> <?php echo e($dato->nomdiag); ?>


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

                <center><strong> Desarrollo de la Tarea: </strong></center>
                 <br>
                  <strong> Fecha de Desarrollo: </strong> <?php echo e(pasFechaVista($dato->fecharesuelta)); ?>


                 <br>
      
                <br>
                <?php if(strlen(strval($dato->rutaresp))>0): ?>
                <div class="form-group">
                  <?php 
                  $ruta="/tarea/".$dato->rutaresp; 
                   ?>
                  <a href="<?php echo e(asset($ruta)); ?>" download="Desarrollo de la Tarea">
                    
                    Descargar Contenido Adjunto
                  </a>
                </div>
                <?php endif; ?>

                <?php if(strlen(strval($dato->respuestas))>0): ?>
                <div class="form-group">
                  <strong>Contenido del Desarrollo:</strong>
                  <?php 
                    echo $dato->respuestas;
                   ?>
                <?php endif; ?>
                </div>

                <hr>
                <center><strong> Calificación del Desarrollo de la Tarea: </strong></center>
                <br>

                <div class="form-group col-md-12" style="padding-left: 0px;">

                    <?php if(strlen(strval($dato->califTarea))=="0"): ?>
                        No Calificada
                    <?php elseif(strval($dato->califTarea)=="5"): ?>
                    <option value="0">Seleccione...</option>
                        Desarrollo totalmente adecuado / muy bueno
                    <?php elseif(strval($dato->califTarea)=="4"): ?>
                    <option value="0">Seleccione...</option>
                        Desarrollo regularmente adecuadao / bueno
                    <?php elseif(strval($dato->califTarea)=="3"): ?>
                      Desarrollo  medianamente adecuado / regular
                    <?php elseif(strval($dato->califTarea)=="2"): ?>
                      Desarrollo no adecuado / erroneo
                    <?php elseif(strval($dato->califTarea)=="1"): ?>
                      Desarrollo Indadecuado / totalmente erroneo
                    <?php endif; ?>
                </div>

                <br>

              
                 <div class="form-group">
                  <label for="txtContenido">Sustento de la Calificación:</label>
                  <p><?php echo e($dato->descCalif); ?></p>

                </div>


           
</form>
          </div>
          </div>

          <div id="divEval02"></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>