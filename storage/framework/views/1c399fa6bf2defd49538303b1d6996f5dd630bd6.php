<?php $__currentLoopData = $tarea; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>




<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Evaluación Base de la Tarea:</strong><?php echo e($dato->deseval); ?>

</div>

<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Diagnóstico Base de la Tarea:</strong><?php echo e($dato->nomdiag); ?>

</div>

<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Fecha Máxima de Entrega :</strong><?php echo e(pasFechaVista($dato->fechatarea)); ?>

</div>

<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Estado de la Tarea:</strong>

	<?php if(strval($dato->tareaestado)=="1"): ?>
                        Tarea Enviada al Alumno, El alumno aún no revisa la tarea.
                         <?php elseif(strval($dato->tareaestado)=="2"): ?>
                        Tarea Vista por el Alumno, Tarea sin envío de respuesta del alumno.
                        <?php elseif(strval($dato->tareaestado)=="3"): ?>
                        Tarea Resuelta por el Alumno, Sin Calificación del Tutor.
                        <?php elseif(strval($dato->tareaestado)=="4"): ?>
                         Tarea Resuelta por el Alumno, Calificada por el Tutor.
                        <?php endif; ?>


</div>

<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Descripción de la Tarea:</strong>
<br>
<?php 
echo $dato->desctarea;
 ?>
	
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>