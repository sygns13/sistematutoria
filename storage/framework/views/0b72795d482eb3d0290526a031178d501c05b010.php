 <?php 
$aux="0";
 ?>
<?php $__currentLoopData = $evaluacions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php 
$aux="1";
 ?>
  <option value="<?php echo e($eval->idDiag); ?>"><?php echo e($eval->deseval); ?>  -  <?php echo e($eval->nomdiag); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


  <?php if($aux=="0"): ?>
    <option value="0">No hay Evaluaciones con Diagnósticos en la etapa de la tutoría elegida</option>
  <?php endif; ?>