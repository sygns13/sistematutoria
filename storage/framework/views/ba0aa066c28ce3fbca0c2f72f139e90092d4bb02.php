        <?php $__currentLoopData = $evaluacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;"><?php echo e($dato->deseval); ?></h3></center>
              <button style="float: right;" type="button" class="btn btn-default" onclick="homeEvaluacion();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

            <input type="hidden" name="txtidEval" id="txtidEval" value="<?php echo e($dato->id); ?>">


            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

                <form>
                <p style="text-align:justify;">
                 <strong style="text-decoration: underline;"> Instrucciones:</strong> Lea las respuestas de los alumnos por cada pregunta, e ingrese la calificación que a su criterio merece la respuesta, eligiendo por cada respuesta entre 05 valores posibles: <br><br> (5) Respuesta totalmente adecuada / muy buena, (4) Respuesta regularmente adecuada / buena, (3) Respuesta  medianamente adecuada / regular, (2) Respuesta no adecuada / erronea, (1) Respuesta Indadecuada / totalmente erronea.
                 <br>
                 <br>
                <strong> Preguntas: </strong>
                </p>

                <?php 
                $cont=1;
                 ?>

                <?php $__currentLoopData = $preguntas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pregs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                <div class="form-group">
                  <label for="txtPregunta<?php echo e($pregs->idDetPreg); ?>"><?php echo e($cont); ?>.- <?php echo e($pregs->pregunta); ?></label>

                  
                  <p id="resp<?php echo e($pregs->idDetPreg); ?>" style="text-align: justify;">
                     <label style="font-weight: bold;text-decoration: underline;">Respuesta:</label> <?php echo e($pregs->resultado); ?>

                  </p>

                  <div class="col-sm-1">
                   <label for="califResp<?php echo e($pregs->idresult); ?>">Calificación: </label></div> 
                <div class="col-sm-4">
                   <select class="cbsResp form-control" id="califResp<?php echo e($pregs->idresult); ?>">
                    <?php if($pregs->calif=="0"): ?>
                        <option value="0" selected>Seleccione...</option>
                        <option value="5">(5) Respuesta totalmente adecuada / muy buena</option>
                        <option value="4">(4) Respuesta regularmente adecuada / buena</option>
                        <option value="3">(3) Respuesta  medianamente adecuada / regular</option>
                        <option value="2">(2) Respuesta no adecuada / erronea</option>
                        <option value="1">(1) Respuesta Indadecuada / totalmente erronea</option>
                    <?php elseif($pregs->calif=="5"): ?>
                        <option value="0" >Seleccione...</option>
                        <option value="5" selected>(5) Respuesta totalmente adecuada / muy buena</option>
                        <option value="4">(4) Respuesta regularmente adecuada / buena</option>
                        <option value="3">(3) Respuesta  medianamente adecuada / regular</option>
                        <option value="2">(2) Respuesta no adecuada / erronea</option>
                        <option value="1">(1) Respuesta Indadecuada / totalmente erronea</option>
                    <?php elseif($pregs->calif=="4"): ?>
                        <option value="0" >Seleccione...</option>
                        <option value="5">(5) Respuesta totalmente adecuada / muy buena</option>
                        <option value="4" selected>(4) Respuesta regularmente adecuada / buena</option>
                        <option value="3">(3) Respuesta  medianamente adecuada / regular</option>
                        <option value="2">(2) Respuesta no adecuada / erronea</option>
                        <option value="1">(1) Respuesta Indadecuada / totalmente erronea</option>
                    <?php elseif($pregs->calif=="3"): ?>
                        <option value="0" >Seleccione...</option>
                        <option value="5">(5) Respuesta totalmente adecuada / muy buena</option>
                        <option value="4">(4) Respuesta regularmente adecuada / buena</option>
                        <option value="3" selected>(3) Respuesta  medianamente adecuada / regular</option>
                        <option value="2">(2) Respuesta no adecuada / erronea</option>
                        <option value="1">(1) Respuesta Indadecuada / totalmente erronea</option>
                    <?php elseif($pregs->calif=="2"): ?>
                        <option value="0" >Seleccione...</option>
                        <option value="5">(5) Respuesta totalmente adecuada / muy buena</option>
                        <option value="4">(4) Respuesta regularmente adecuada / buena</option>
                        <option value="3">(3) Respuesta  medianamente adecuada / regular</option>
                        <option value="2" selected>(2) Respuesta no adecuada / erronea</option>
                        <option value="1">(1) Respuesta Indadecuada / totalmente erronea</option>
                    <?php elseif($pregs->calif=="1"): ?>
                        <option value="0" >Seleccione...</option>
                        <option value="5">(5) Respuesta totalmente adecuada / muy buena</option>
                        <option value="4">(4) Respuesta regularmente adecuada / buena</option>
                        <option value="3">(3) Respuesta  medianamente adecuada / regular</option>
                        <option value="2">(2) Respuesta no adecuada / erronea</option>
                        <option value="1" selected>(1) Respuesta Indadecuada / totalmente erronea</option>

                        <?php endif; ?>                  
                    
                  </select>

                </div>
                <br>
                <br>
                </div>

                <?php 
                $cont++;
                 ?>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


              <div class="box-footer">
                

                <button type="button" class="btn btn-primary" onclick="SaveCalif();" id="btnResponderEval"><i class="fa fa-save" aria-hidden="true" ></i> Registrar Evaluación</button>

                <button type="reset" class="btn btn-default" onclick="limpiarEval();" id="btnLimRespEval"> Limpiar</button>

                <div id="divCarga2" style="display: inline-block;"><div id="dcarga0" style="display: none;"><img src="<?php echo e(asset('/img/ajax-loader.gif')); ?>"/></div></div>
              </div>
           
</form>
          </div>
          </div>

          <div id="divEval02"></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>