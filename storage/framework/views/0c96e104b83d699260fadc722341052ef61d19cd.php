<?php $__env->startSection('htmlheader_title'); ?>
	Gestión de Etapas
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
  <?php echo $__env->make('etapas.controles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>   

<div id="formDatos" style="display: none;">
  <?php echo $__env->make('etapas.formulario', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div> 




<div id="tabla">
  <?php echo $__env->make('etapas.tabla', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

		</div>
	</div>

<div class="modal fade bs-example-modal-lg" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document" id="mdialTamanio">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="desEditarTitulo" style="font-weight: bold;text-decoration: underline;">EDITAR ETAPA: </h4>

      </div> 
      <div class="modal-body">
      <input type="hidden" id="idEta" value="0">


      <div class="row">

      <div class="box" id="o" style="border:0px; box-shadow:none;" >
            <div class="box-header with-border">
              <h3 class="box-title" id="boxTitulo">ETAPA: </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="FormularioEditar"> 
                
            </div>
          </div>



      </div>
      </div>
      <div class="modal-footer" >
        <button type="button" class="btn btn-info" id="btnGuardarE" onclick="seguroSave1();">Guardar</button>

      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar</button>

      </div>
    </div>
  </div>
</div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.appEtapas', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>