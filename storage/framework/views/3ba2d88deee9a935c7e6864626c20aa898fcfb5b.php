        <?php $__currentLoopData = $sesion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;">Detalles de la Sesión</h3></center>
              <button style="float: right;" type="button" class="btn btn-default" onclick="homePerfil1Alumno();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>

          <button style="float: right; margin-right: 10px;" type="button" class="btn btn-success" onclick="impSeSion();"><i class="fa fa-print" aria-hidden="true"></i> 
          Imprimir</button>
            </div>

            <input type="hidden" name="txtidSesion" id="txtidSesion" value="<?php echo e($dato->idSesion); ?>">


            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body" id="divImpSesion">

                <center><h4><?php echo e($dato->nombresesion); ?></h4></center>
               
                <p style="text-align:justify;">
                
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

     
 
                <hr>
                <?php 
                //var_dump(strval($dato->estadosesion));
                 ?>

            <?php if(strval($dato->estadosesion)=="1"): ?>
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


                  <?php 
                    echo $dato->descCalifAlumno;
                   ?>

             


                         
              <?php endif; ?>

               
          <?php elseif(strval($dato->estadosesion)=="3"): ?>

           <?php if(strval($dato->confirmado)=="0"): ?>
            <?php elseif(strval($dato->confirmado)=="1"): ?>
            <hr>
             <span class="label label-success" style="font-size: 100%">Participación Confirmada por el Alumno</span>

            <?php elseif(strval($dato->confirmado)=="2"): ?>

            <hr>  
            
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

         



          <?php elseif(strval($dato->estadosesion)=="2"): ?>

            <?php if(strval($dato->confirmado)=="0"): ?>
            <?php elseif(strval($dato->confirmado)=="1"): ?>
            <hr>
             <span class="label label-success" style="font-size: 100%">Participación Confirmada por el Alumno</span>

            <?php elseif(strval($dato->confirmado)=="2"): ?>

            <hr>  

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
              <span class="label label-success" style="font-size: 100%">Sesión Calificada por el Tutor</span>
              </div>

               <div class="form-group">
                <p> <strong style="text-decoration: underline;">Calificación del Desarro de la Sesión:</strong> 

                  <?php if(strval($dato->califTutor)=="0"): ?>
                        No calificada
                    <?php elseif(strval($dato->califTutor)=="5"): ?>
                    Desarrollo totalmente adecuado / muy bueno
                    <?php elseif(strval($dato->califTutor)=="4"): ?>
                    Desarrollo regularmente adecuadao / bueno
                    <?php elseif(strval($dato->califTutor)=="3"): ?>
                    Desarrollo  medianamente adecuado / regular
                    <?php elseif(strval($dato->califTutor)=="2"): ?>
                    Desarrollo no adecuado / erroneo
                    <?php elseif(strval($dato->califTutor)=="1"): ?>
                    Desarrollo Indadecuado / totalmente erroneo
                    <?php endif; ?>


                  </p>
                </div>


            <div class="form-group">
                <p> <strong style="text-decoration: underline;">Sustento de la Calificación:</strong> <?php 
                    echo $dato->resultSesion;
                   ?>
                  </p>
                </div>

            
          <?php endif; ?>

          </div>
          </div>
          
     

          <div id="divEval02"></div>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>