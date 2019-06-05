        <?php $__currentLoopData = $evaluacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;"><?php echo e($dato->deseval); ?></h3></center>
              <button style="float: right;" type="button" class="btn btn-default" onclick="homeAlumno();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

            <input type="hidden" name="txtidEval" id="txtidEval" value="<?php echo e($dato->id); ?>">


            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

                <form>
                <p style="text-align:justify;">
                 <strong style="text-decoration: underline;"> Instrucciones:</strong> Conteste Todas las preguntas, con la mayor sinceridad posible y escriba una descripción breve y sencilla de porque considera esa respuesta. Siendo este un proceso para poder brindarle ayuda, o usted mismo descubra en que puede mejorar personalmente.
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

                  <textarea class="txtRespuesta form-control" rows="3" id="txtPregunta<?php echo e($pregs->idDetPreg); ?>" name="txtPregunta<?php echo e($pregs->idDetPreg); ?>" placeholder="Ingrese su Respuesta"></textarea>
                </div>

                <?php 
                $cont++;
                 ?>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


              <div class="box-footer">
                

                <button type="button" class="btn btn-primary" onclick="SaveEval();" id="btnResponderEval"><i class="fa fa-check" aria-hidden="true" ></i> Enviar Respuestas</button>

                <button type="reset" class="btn btn-default" onclick="limpiarEval();" id="btnLimRespEval"> Limpiar</button>

                <div id="divCarga2" style="display: inline-block;"><div id="dcarga0" style="display: none;"><img src="<?php echo e(asset('/img/ajax-loader.gif')); ?>"/></div></div>
              </div>
           
</form>
          </div>
          </div>

          <div id="divEval02"></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>