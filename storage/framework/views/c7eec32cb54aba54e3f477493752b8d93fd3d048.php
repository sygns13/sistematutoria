<?php $__env->startSection('htmlheader_title'); ?>
  Inicio
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<style type="text/css">
    #mdialTamanio{
  width: 70% !important;
}
#mdialTamanio1{
  width: 70% !important;
}#mdialTamanio2{
  width: 70% !important;
}
</style>
 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?> " id="tokenLaravel">
<div class="container-fluid spark-screen">
    <div class="row">
        <?php if(accesoUser([4])): ?>
        <div class="col-md-3" id="divTama3">
            <?php echo $__env->make('adminlte::alumnoPerfil0', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        <div class="col-md-9" id="divTama9">
            <?php echo $__env->make('adminlte::alumnoPerfil1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        <div id="divEval"></div>
        <div id="divChatAlum"></div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.appAlumnoLogin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>