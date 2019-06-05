<?php $__env->startSection('htmlheader_title'); ?>
	Gestión del Banco de Preguntas
<?php $__env->stopSection(); ?>

<style type="text/css">         
          
#mdialTamanio{
  width: 80% !important;
}
</style>



<?php $__env->startSection('main-content'); ?>
	<div class="container-fluid spark-screen">
		<div class="row">
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="idToken">
 <div id="controles">
  <?php echo $__env->make('tutoralumnos.controles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>   


<div id="tabla">
  <?php echo $__env->make('tutoralumnos.tabla', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

		</div>
	</div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.appTutores', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>