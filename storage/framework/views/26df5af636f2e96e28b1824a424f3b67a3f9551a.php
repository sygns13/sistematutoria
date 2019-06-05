        <?php $__currentLoopData = $tarea; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;"><?php echo e($dato->nombreTar); ?></h3></center>
              <button style="float: right;" type="button" class="btn btn-default" onclick="homeTarea();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

             <input type="hidden" name="txtidTarea" id="txtidTarea" value="<?php echo e($dato->idTarea); ?>">


            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

                <form>
                  <p style="text-align:justify;">
                 <strong style="text-decoration: underline;"> Instrucciones:</strong> Lea el desarrollo de la tarea enviada por el alumno,luego ingrese la calificación que a su criterio merece dicho desarrollo, eligiendo entre 05 valores posibles: <br><br> (5) Desarrollo totalmente adecuado / muy bueno, (4) Desarrollo regularmente adecuado / bueno, (3) Desarrollo  medianamente adecuado / regular, (2) Desarrollo no adecuado / erroneo, (1) Desarrollo Indadecuado / totalmente erroneo. Luego ingrese una pequeña descripción sustentando la calificación ingresada.
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
                    <img src="<?php echo e(asset('/img/pdf.png')); ?>" class="img img-responsive" alt="...PDF" style="height: 100px; width: 100px;margin-left: 30px;">
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
                <center><strong> Calificación de la Tarea: </strong></center>
                <br>

                <div class="form-group col-md-6" style="padding-left: 0px;">
                   <select class="form-control" id="cbuCalifTarea">

                    <?php if(strlen(strval($dato->califTarea))=="0"): ?>
                        <option value="0" selected>Seleccione...</option>
                        <option value="5">(5) Desarrollo totalmente adecuado / muy bueno</option>
                        <option value="4">(4) Desarrollo regularmente adecuadao / bueno</option>
                        <option value="3">(3) Desarrollo  medianamente adecuado / regular</option>
                        <option value="2">(2) Desarrollo no adecuado / erroneo</option>
                        <option value="1">(1) Desarrollo Indadecuado / totalmente erroneo</option>
                    <?php elseif(strval($dato->califTarea)=="5"): ?>
                    <option value="0">Seleccione...</option>
                        <option value="5" selected>(5) Desarrollo totalmente adecuado / muy bueno</option>
                        <option value="4">(4) Desarrollo regularmente adecuadao / bueno</option>
                        <option value="3">(3) Desarrollo  medianamente adecuado / regular</option>
                        <option value="2">(2) Desarrollo no adecuado / erroneo</option>
                        <option value="1">(1) Desarrollo Indadecuado / totalmente erroneo</option>
                    <?php elseif(strval($dato->califTarea)=="4"): ?>
                    <option value="0">Seleccione...</option>
                        <option value="5">(5) Desarrollo totalmente adecuado / muy bueno</option>
                        <option value="4" selected>(4) Desarrollo regularmente adecuadao / bueno</option>
                        <option value="3">(3) Desarrollo  medianamente adecuado / regular</option>
                        <option value="2">(2) Desarrollo no adecuado / erroneo</option>
                        <option value="1">(1) Desarrollo Indadecuado / totalmente erroneo</option>
                    <?php elseif(strval($dato->califTarea)=="3"): ?>
                    <option value="0" >Seleccione...</option>
                        <option value="5">(5) Desarrollo totalmente adecuado / muy bueno</option>
                        <option value="4">(4) Desarrollo regularmente adecuadao / bueno</option>
                        <option value="3" selected>(3) Desarrollo  medianamente adecuado / regular</option>
                        <option value="2">(2) Desarrollo no adecuado / erroneo</option>
                        <option value="1">(1) Desarrollo Indadecuado / totalmente erroneo</option>
                    <?php elseif(strval($dato->califTarea)=="2"): ?>
                    <option value="0" >Seleccione...</option>
                        <option value="5">(5) Desarrollo totalmente adecuado / muy bueno</option>
                        <option value="4">(4) Desarrollo regularmente adecuadao / bueno</option>
                        <option value="3">(3) Desarrollo  medianamente adecuado / regular</option>
                        <option value="2" selected>(2) Desarrollo no adecuado / erroneo</option>
                        <option value="1">(1) Desarrollo Indadecuado / totalmente erroneo</option>
                    <?php elseif(strval($dato->califTarea)=="1"): ?>
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
                  <textarea id="txtContenidoCalif" name="txtContenidoCalif" class="form-control" rows="6"><?php echo e($dato->descCalif); ?></textarea>

                </div>


              <div class="box-footer">
                

                <button type="button" class="btn btn-primary" onclick="SaveCalifTarea();" id="btnCalifTarea"><i class="fa fa-save" aria-hidden="true" ></i> Registrar Calificación</button>

                <button type="reset" class="btn btn-default" onclick="limpiarcalifTarea();" id="btnLimTarea"> Limpiar</button>

                <div id="divCarga2" style="display: inline-block;"><div id="dcarga0" style="display: none;"><img src="<?php echo e(asset('/img/ajax-loader.gif')); ?>"/></div></div>
              </div>
           
</form>
          </div>
          </div>

          <div id="divEval02"></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>