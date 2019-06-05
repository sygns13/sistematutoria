<?php $__env->startSection('htmlheader_title'); ?>
	Gestión de Docentes
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
  <?php echo $__env->make('docentes.controles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>   

<div id="formDatos" style="display: none;">
  <?php echo $__env->make('docentes.formulario', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div> 




<div id="tabla">
  <?php echo $__env->make('docentes.tabla', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

		</div>
	</div>

<div class="modal fade bs-example-modal-lg" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document" id="mdialTamanio">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="desEditarTitulo" style="font-weight: bold;text-decoration: underline;">EDITAR DOCENTE TUTOR</h4>

      </div> 
      <div class="modal-body">
      <input type="hidden" id="idPerEdit" value="0">
      <input type="hidden" id="idTutEdit" value="0">
      <input type="hidden" id="idUsuEdit" value="0">

      <div class="row">

      <div class="box" id="o" style="border:0px; box-shadow:none;" >
            <div class="box-header with-border">
              <h3 class="box-title" id="boxTitulo">DOCENTE: </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="FormularioEditar"> 
                
            </div>
          </div>



      </div>
      </div>
      <div class="modal-footer" >

      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar</button>

      </div>
    </div>
  </div>
</div>


<div class="modal fade bs-example-modal-lg" id="modalverMas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document" id="mdialTamanio3">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="desBajaTitulo" style="font-weight: bold;text-decoration: underline;">FICHA DE AGREMIADO</h4>

      </div> 
      <div class="modal-body">
      <input type="hidden" id="idPerv" value="0">
      <input type="hidden" id="idAgrev" value="0">
      <input type="hidden" id="idusuv" value="0">


      <div class="row">

      <div class="box" id="o" style="border:0px; box-shadow:none;" >
            <div class="box-header with-border">
              <h3 class="box-title" id="boxTituloAgre"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="FormularioPersona"> 
            
                
            </div>
          </div>



      </div>
      </div>
      <div class="modal-footer">
      <button id="imp" class="btn btn-success no-print" onclick="imprimir();"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>

      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar</button>

      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg" id="modalBaja" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document" id="mdialTamanio3">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="desBajaTitulo" style="font-weight: bold;text-decoration: underline;">DESACTIVAR DOCENTE</h4>

      </div> 
      <div class="modal-body">
      <input type="hidden" id="idPerb" value="0">
      <input type="hidden" id="idTutob" value="0">
      <input type="hidden" id="idusub" value="0">

     
        <input type="hidden" id="bajaDatos" value="0">
        <input type="hidden" id="dnibaja" value="0">

      <div class="row">

      <div class="box" id="o" style="border:0px; box-shadow:none;" >
            <div class="box-header with-border">
              <h3 class="box-title" id="boxTituloBaja">DOCENTE: </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="FormularioBaja"> 
             <?php echo $__env->make('docentes.baja', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                
            </div>
          </div>



      </div>
      </div>
      <div class="modal-footer">
      <button type="button" onclick="AceptarBaja();" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Desactivar</button>

      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar</button>

      </div>
    </div>
  </div>
</div>


<div class="modal fade bs-example-modal-lg" id="modalhabilitar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document" id="mdialTamanio3">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="desBajaTitulo" style="font-weight: bold;text-decoration: underline;">ACTIVAR AGREMIADO</h4>

      </div> 
      <div class="modal-body">
       <input type="hidden" id="idPerR" value="0">
      <input type="hidden" id="idTutoR" value="0">
      <input type="hidden" id="idusuR" value="0">

       <input type="hidden" id="dniRec" value="0">
        <input type="hidden" id="bajaDatosR" value="0">

      <div class="row">

      <div class="box" id="o" style="border:0px; box-shadow:none;" >
            <div class="box-header with-border">
              <h3 class="box-title" id="boxTituloRein">Docente: </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="FormularioReinc"> 
             <?php echo $__env->make('docentes.habilitacion', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                
            </div>
          </div>



      </div>
      </div>
      <div class="modal-footer">
      <button type="button" onclick="AceptarReinc();" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Activar</button>

      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar</button>

      </div>
    </div>
  </div>
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.appDocentes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>