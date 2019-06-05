<?php $__currentLoopData = $sesion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>




<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Evaluación Base de la Sesión:</strong><?php echo e($dato->deseval); ?>

</div>

<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Diagnóstico Base de la Sesión:</strong><?php echo e($dato->nomdiag); ?>

</div>

<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Fecha de la Sesión:</strong><?php echo e(pasFechaVista($dato->fechasesion)); ?>

</div>

<div class="col-md-12" style="padding-bottom: 10px;">
        <strong>Hora de la Sesión:</strong><?php echo e($dato->horasesion); ?>

</div>

<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Estado de la Sesión:</strong>

	<?php if(strval($dato->estadosesion)=="1"): ?>

                            <?php if(strval($dato->sesionPasada)=="1"): ?>
                            Sesión Caducada Pendiente de Calificación
                            <?php else: ?>
                            Sesión Programada
                            <?php endif; ?>
                        
                         <?php elseif(strval($dato->estadosesion)=="2"): ?>
                                Sesión Realizada
                        <?php elseif(strval($dato->estadosesion)=="3"): ?>
                                Sesión Cancelada, debido a <?php echo e($dato->resultSesion); ?>

                        <?php elseif(strval($dato->estadosesion)=="0"): ?>
                                Sesión No Realizada, debido a <?php echo e($dato->resultSesion); ?>

                        <?php endif; ?>


</div>

<div class="col-md-12" style="padding-bottom: 10px;">
        <strong>Tipo de Sesión:</strong>
<?php if(strval($dato->tiposesion)=="1"): ?>
                        Presencial
                        <?php elseif(strval($dato->tiposesion)=="2"): ?>
                        Virtual Mediante la aplicación Chat en el Sistema
                        <?php endif; ?>


</div>

<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Detalles de la Sesión:</strong>
<br>
<?php 
echo $dato->detallesSesion;
 ?>
	
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>