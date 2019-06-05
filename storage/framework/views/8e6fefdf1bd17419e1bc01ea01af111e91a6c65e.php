<div class="box">
        <div class="box-header">
          <h3 class="box-title"><i class="fa fa-users"></i> Gestión de Asignación de Tutores</h3>
          <a href="<?php echo e(URL::to('home')); ?>" style="float: right;"><button type="button" class="btn btn-default"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button></a>
        </div>
        <div class="box-body">
          <div class="row">

        <div class="col-lg-12 col-xs-12">
          <?php 
            $auxS=0;
           ?>

          <?php $__currentLoopData = $semestre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          Semestre Académico Activo: <span class="label label-primary" style="font-size: 100%;"><?php echo e($dato->nomsem); ?></span>
          <?php 
            $auxS=1;
           ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          

          <?php if($auxS==0): ?>
            <span class="label label-danger" style="font-size: 100%;">No Existe semestre académico Activo, vaya a Gestión de Semestres: </span> <a href="<?php echo e(URL::to('semestres')); ?>">Gestión de Semestres</a>
          <?php endif; ?>

   </div>
   

      
      
          </div>

        </div>

        <!-- /.box-body -->
      </div>
