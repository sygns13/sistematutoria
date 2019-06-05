<?php 
$auxFotoT="0";
$auxFotoA="0";

$abrioT="0";
$abrioA="0";

 ?>

<?php $__currentLoopData = $chat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



<?php if($msj->idtu=="4"): ?>

<?php if($auxFotoT=="1"): ?>
</div>
<?php endif; ?>

<?php if($auxFotoA=="0"): ?>

                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left"><?php echo e($msj->nombre); ?>: <?php echo e($msj->apellidos); ?>, <?php echo e($msj->nombres); ?> </span>
                    <span class="direct-chat-timestamp pull-right"><?php echo e($msj->fecha); ?> <?php echo e($msj->hora); ?></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <?php if($msj->imagen==""|| $msj->imagen==null): ?>

                        <?php if($msj->genero=="1"): ?>

                        <img class="direct-chat-img" src="<?php echo e(asset('/img/av3.png')); ?>" style="width: 40px;height: 40px;"  alt="Message User Image">
                

                        <?php elseif($msj->genero=="2"): ?>

                        <img class="direct-chat-img" src="<?php echo e(asset('/img/av2.jpg')); ?>" style="width: 40px;height: 40px;"  alt="Message User Image">
                          <?php elseif($msj->genero==null): ?>
                            <img class="direct-chat-img" src="<?php echo e(asset('/img/av3.png')); ?>" style="width: 40px;height: 40px;"  alt="Message User Image">
                        <?php endif; ?>
                       <?php else: ?>

                       <img class="direct-chat-img" src="<?php echo e(asset($msj->imagen)); ?>" style="width: 40px;height: 40px;"  alt="Message User Image">

                       <?php endif; ?>
 <div class="direct-chat-text">
<?php echo e($msj->mensaje); ?>

</div>

<?php 
$auxFotoT="0";
$auxFotoA="1";
 ?>


<?php else: ?>
 <div class="direct-chat-text">
<?php echo e($msj->mensaje); ?>

</div>

<?php endif; ?>


<?php elseif($msj->idtu=="3"): ?>

<?php if($auxFotoA=="1"): ?>
</div>
<?php endif; ?>


<?php if($auxFotoT=="0"): ?>

  <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right"><?php echo e($msj->nombre); ?>: <?php echo e($msj->apellidos); ?>, <?php echo e($msj->nombres); ?></span>
                    <span class="direct-chat-timestamp pull-left"><?php echo e($msj->fecha); ?> <?php echo e($msj->hora); ?></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <?php if($msj->imagen=="" || $msj->imagen==null): ?>
  <?php if($msj->genero=="1"): ?>
<img class="direct-chat-img" src="<?php echo e(asset('/img/av3.png')); ?>" style="width: 40px;height: 40px;"  alt="Message User Image">
  <?php elseif($msj->genero=="2"): ?>
<img class="direct-chat-img" src="<?php echo e(asset('/img/av2.png')); ?>" style="width: 40px;height: 40px;" alt="Message User Image">
  <?php elseif($msj->genero==null): ?>
<img class="direct-chat-img" src="<?php echo e(asset('/img/av3.png')); ?>" style="width: 40px;height: 40px;"  alt="Message User Image">
  <?php endif; ?>
 <?php else: ?>

  <?php 
 $ruta="/img/perfilTutores/".$msj->imagen;
  ?>

 <img class="direct-chat-img" src="<?php echo e(asset($ruta)); ?>" style="width: 40px;height: 40px;"  alt="Message User Image">

 <?php endif; ?><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    <?php echo e($msj->mensaje); ?>

                  </div>

<?php 
$auxFotoA="0";
$auxFotoT="1";
 ?>


<?php else: ?>
 <div class="direct-chat-text">
                    <?php echo e($msj->mensaje); ?>

                  </div>

<?php endif; ?>



<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if($auxFotoT=="1"): ?>
</div>
<?php endif; ?>
<?php if($auxFotoA=="1"): ?>
</div>
<?php endif; ?>
