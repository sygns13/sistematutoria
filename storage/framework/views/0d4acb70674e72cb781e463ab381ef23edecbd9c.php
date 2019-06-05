<div class="box">
        <div class="box-header">
          <h3 class="box-title"><i class="fa fa-cogs"></i> Gestión del banco de Preguntas</h3>
          <a href="<?php echo e(URL::to('home')); ?>" style="float: right;"><button type="button" class="btn btn-default"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button></a>
        </div>
        <div class="box-body">
          <div class="row">

        <div class="form-group">
        <div class="col-sm-12">

        <?php if($auxE==0): ?>
        No se han creado las Etapas de la Tutoria, Para gestionar el banco de Preguntas es necesario crearlas:  <a href="<?php echo e(URL::to('etapas')); ?>"><span class="label label-danger" style="font-size: 100%;">Gestión de Etapas</span></a>
        <?php elseif($auxD==0): ?>
        No se han creado las Dimensiones Personales de la Tutoria, Para gestionar el banco de Preguntas es necesario crearlas  <a href="<?php echo e(URL::to('dimensions')); ?>"><span class="label label-danger" style="font-size: 100%;">Gestión de Dimensiones</span></a>
        <?php else: ?>

        <div class="form-group" style="padding-bottom: 50px;">
            <label for="cbutipodoc" class="col-sm-2 control-label">ETAPA:</label>
           <div class="col-sm-10">
            <select class="form-control" style="width: 100%;" id="cbuEtapa" onchange="selEtapa();">
                 <?php $__currentLoopData = $etapas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($idE==$dato->id): ?>
                 <option value="<?php echo e($dato->id); ?>" selected><?php echo e($dato->nometapa); ?></option>
                 <?php else: ?>
                  <option value="<?php echo e($dato->id); ?>"><?php echo e($dato->nometapa); ?></option>
                 <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

          </div>
          </div>


          <div class="form-group" style="padding-bottom: 50px;">
            <label for="cbutipodoc" class="col-sm-2 control-label">Dimension:</label>
           <div class="col-sm-10">
            <select class="form-control" style="width: 100%;" id="cbuDimension" onchange="selDimension();">
                 <?php $__currentLoopData = $dimensiones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($idD==$dato->id): ?>
                 <option value="<?php echo e($dato->id); ?>" selected><?php echo e($dato->nomdimen); ?></option>
                 <?php else: ?>
                  <option value="<?php echo e($dato->id); ?>"><?php echo e($dato->nomdimen); ?></option>
                 <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

          </div>
          </div>

          <input type="hidden" name="idE" id="idE" value="<?php echo e($idE); ?>">
          <input type="hidden" name="idD" id="idD" value="<?php echo e($idD); ?>">
          <div class="form-group">
           <div class="col-sm-3">
          <button type="button" class="btn btn-primary" id="btnNuevo" onclick="nuevaPregunta();">Nueva Pregunta</button>
          </div>
          </div>
         
  <?php endif; ?>

   </div>
   </div>
   

      
      
          </div>

        </div>

        <!-- /.box-body -->
      </div>
