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



	<div class="container-fluid spark-screen">
		<div class="row">



      <?php if(accesoUser([1,2])): ?>
			<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Alumnos</h3>
              <p>Gestión de Alumnos</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo e(URL::to('alumnos')); ?>" class="small-box-footer" style="height: 37px; font-size: 25px;">Ingresar 
            <i style="font-size: 30px; " class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php endif; ?>


        <?php if(accesoUser([1,2])): ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Docentes</h3>

              <p>Gestión de Docentes</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?php echo e(URL::to('tutors')); ?>" class="small-box-footer" style="height: 37px; font-size: 25px;">Ingresar 
            <i style="font-size: 30px; " class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php endif; ?>

        <?php if(accesoUser([1,2])): ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Tutores</h3>

              <p>Asignar Docentes</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-secret"></i>
            </div>
            <a href="<?php echo e(URL::to('tutores')); ?>" class="small-box-footer" style="height: 37px; font-size: 25px;">Ingresar 
            <i style="font-size: 30px; " class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php endif; ?>


        <?php if(accesoUser([3])): ?>



        



        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?> " id="tokenLaravel">
        <div class="col-md-12" id="panelPrincipal">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Alumnos Asignados  <span class="label label-primary" style="font-size: 100%;">Semestre 2018-I</span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered" style="overflow-x: auto;">
                <thead><tr>
                  <th style="width: 4%">#</th>
                  <th style="width: 10%">Código</th>
                  <th style="width: 17%">Alumno</th>
                  <th style="width: 14%">Semestre del Alumno</th>
                  <th style="width: 13%">Teléfono</th>
                  <th style="width: 16%">Email</th>
                  <th style="width: 10%">Img. Perfil</th>
                  <th style="width: 8%">Comunicación</th>
                  <th style="width: 8%">Evaluación</th>

                </tr></thead>
                <tbody id="cuerpoTable">

                   <?php
                $cont=1;
                ?>
                  <?php $__currentLoopData = $alumnosTut; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($cont); ?></td>
                      <td><?php echo e($dato->codigo); ?></td>
                      <td><?php echo e($dato->apellidos); ?>, <?php echo e($dato->nombres); ?></td>
                      <td><?php echo e($dato->semestre); ?></td>
                      <td><?php echo e($dato->telf); ?></td>
                      <td><?php echo e($dato->correo); ?></td>
                      <td>
                        <?php if($dato->imagen==""||$dato->imagen==null): ?>

                        <?php if($dato->genero=="1"): ?>
                          <img src="<?php echo e(asset('/img/av3.png')); ?>" class="profile-user-img img-responsive img-circle" alt="User Image" style="height: 80px;width: 80px;" id="imgEdit" />

                        <?php elseif($dato->genero=="2"): ?>
                          <img src="<?php echo e(asset('/img/av2.jpg')); ?>" class="profile-user-img img-responsive img-circle" alt="User Image" style="height: 80px;width: 80px;" id="imgEdit" />
                        <?php endif; ?>
                       <?php else: ?>
                         <img src="<?php echo e(asset($dato->imagen)); ?>" class="profile-user-img img-responsive img-circle" alt="User Image" style="height: 80px;width: 80px;" id="imgEdit" />
                       <?php endif; ?>

                      </td>

                      <td>
                        <button type="button" class="btn btn-primary" style="margin-bottom: 5px; width: 130px;">Iniciar Chat</button><br>
                        <button type="button" class="btn btn-primary" style="margin-bottom: 5px;width: 130px;" onclick="envMail('<?php echo e($dato->idper); ?>','<?php echo e($dato->idalum); ?>','<?php echo e($dato->idusu); ?>','<?php echo e($dato->idTA); ?>')">Enviar Mensaje</button><br>
                        <button type="button" class="btn btn-primary" style="width: 130px;" onclick="cargarInf('<?php echo e($dato->idper); ?>','<?php echo e($dato->idalum); ?>','<?php echo e($dato->idusu); ?>','<?php echo e($dato->idTA); ?>')">Guardar Informe</button>

                      </td>
                      <td>
                        <button type="button" class="btn btn-primary" style="margin-bottom: 5px;width: 139px;" onclick="nuevaEval('<?php echo e($dato->idper); ?>','<?php echo e($dato->idalum); ?>','<?php echo e($dato->idusu); ?>','<?php echo e($dato->idTA); ?>')">Evaluaciones</button><br>
                        <button type="button" class="btn btn-primary" style="margin-bottom: 5px;width: 139px;" onclick="nuevaTarea('<?php echo e($dato->idper); ?>','<?php echo e($dato->idalum); ?>','<?php echo e($dato->idusu); ?>','<?php echo e($dato->idTA); ?>')">Tareas</button><br>
                        <button type="button" class="btn btn-primary" style="width: 139px;" onclick="nuevaSesion('<?php echo e($dato->idper); ?>','<?php echo e($dato->idalum); ?>','<?php echo e($dato->idusu); ?>','<?php echo e($dato->idTA); ?>')">Sesiones</button>
                      </td>
                   </tr>
                   <?php
                   $cont++;
                   ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  <?php if($cont==1): ?>
                  <tr>
                    <td colspan="9">Para el presente semestre, el docente aun no tiene alumnos asignados para el proceso de tutoría</td>
                  </tr>

                  <?php endif; ?>





              </tbody></table>
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->
          <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Chat Directo Con el Alumno</h3>

              <div class="box-tools pull-right">
                <span data-toggle="tooltip" title="0 New Messages" class="badge bg-light-blue">0</span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                  <i class="fa fa-comments"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Alexander Pierce</span>
                    <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    Is this template really for free? That's unbelievable!
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->

                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right">Sarah Bullock</span>
                    <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    You better believe it!
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
              </div>
              <!--/.direct-chat-messages-->

              <!-- Contacts are loaded here -->
              <div class="direct-chat-contacts">
                <ul class="contacts-list">
                  <li>
                    <a href="#">
                      <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="User Image">

                      <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              Count Dracula
                              <small class="contacts-list-date pull-right">2/28/2015</small>
                            </span>
                        <span class="contacts-list-msg">How have you been? I was...</span>
                      </div>
                      <!-- /.contacts-list-info -->
                    </a>
                  </li>
                  <!-- End Contact Item -->
                </ul>
                <!-- /.contatcts-list -->
              </div>
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <form action="#" method="post">
                <div class="input-group">
                  <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-flat">Send</button>
                      </span>
                </div>
              </form>
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
        </div>

          <!-- /.box -->
        </div>


        <div id="divTable"></div>

        <?php endif; ?>


        <?php if(accesoUser([4])): ?>
        <?php endif; ?>

		</div>
	</div>







<?php if(accesoUser([3])): ?>

<div class="modal fade bs-example-modal-lg" id="modalverMas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document" id="mdialTamanio">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="desBajaTitulo" style="font-weight: bold;text-decoration: underline;">INFORME DE TUTORÍA</h4>

      </div> 
      <div class="modal-body">
      <input type="hidden" id="idPerv" value="0">
      <input type="hidden" id="idAgrev" value="0">
      <input type="hidden" id="idusuv" value="0">


      <div class="row">

      <div class="box" id="divInforme" style="border:0px; box-shadow:none;" >

        <center>
        <table>
                        <tbody>
                            <tr>
                                <td style="width: 3.2cm;text-align: center;padding-top: 20px;">
                                <img src="<?php echo e(asset('/img/unasam.png')); ?>" style="width: 72px;">
                                </td>

                                <td style="width: 11.5cm;;text-align: center;padding-top: 20px;">
                                    <p style="margin-bottom: 0px;font-size: 19px"><strong>UNIVERSIDAD NACIONAL</strong></p>
                                    <p style="margin-bottom: 0px;font-size: 19px"><strong>SANTIAGO ANTÚNEZ DE MAYOLO</strong></p>
                                    <hr style="margin-top: 5px;margin-bottom: 5px;" class="hrP">
                                    <p><FONT FACE="Monotype Corsiva" SIZE=5 COLOR="#EDB23B">Una Nueva Universidad para el Desarrollo</FONT></p>
                                </td>
                               <td style="width: 3.52cm; text-align: center;padding-top: 20px;">
                                
                                </td>                    
                            </tr>
                        </tbody>
                    </table>
                    </center>



            <div class="box-header with-border" style="padding-left: 40px;  padding-top: 30px;">
              <center><h3 class="box-title" id="divTituloInf" style="text-decoration: underline;"></h3></center>
              <br>
              <div id="divalumno" style="float:left;"></div>
              <div id="divFecImpInf" style="float:right;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="divCuerpoInf" style="padding-left: 20px;padding-top: 20px;"> 
            
                
            </div>
          </div>



      </div>
      </div>
      <div class="modal-footer">
      <button id="imp" class="btn btn-success no-print" onclick="imprimirInforme();"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>

      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar</button>

      </div>
    </div>
  </div>
</div>





<div class="modal fade bs-example-modal-lg" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document" id="mdialTamanio">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="desEditarTitulo" style="font-weight: bold;text-decoration: underline;">EDITAR INFORME</h4>

      </div> 
      <div class="modal-body">
      <input type="hidden" id="txtIdInfE" value="0">

      <div class="row">

      <div class="box" id="o" style="border:0px; box-shadow:none;" >
            <div class="box-header with-border">
              <h3 class="box-title" id="boxTitulo">Informe: </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="FormularioEditar"> 
                
            </div>
          </div>



      </div>
      </div>
      <div class="modal-footer" >

        <div id="divCarga1" style="display: inline-block;"><div id="dcarga1" style="display: none;"><img src="<?php echo e(asset('/img/ajax-loader.gif')); ?>"/></div></div>

        <button type="button" class="btn btn-success" onclick="editInf();" id="btnEditInf"><i class="fa fa-save -o" aria-hidden="true" ></i> Editar Informe</button>

      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar</button>

      </div>
    </div>
  </div>
</div>














<div class="modal fade bs-example-modal-lg" id="modalImpEvaluacions" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document" id="mdialTamanio2">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="desEvalTitulo" style="font-weight: bold;text-decoration: underline;">EVALUACIÓN AL ALUMNO</h4>

      </div> 
      <div class="modal-body">



      <div class="row">

      <div class="box" id="divEval" style="border:0px; box-shadow:none;" >

        <center>
        <table>
                        <tbody>
                            <tr>
                                <td style="width: 3.2cm;text-align: center;padding-top: 20px;">
                                <img src="<?php echo e(asset('/img/unasam.png')); ?>" style="width: 72px;">
                                </td>

                                <td style="width: 11.5cm;;text-align: center;padding-top: 20px;">
                                    <p style="margin-bottom: 0px;font-size: 19px"><strong>UNIVERSIDAD NACIONAL</strong></p>
                                    <p style="margin-bottom: 0px;font-size: 19px"><strong>SANTIAGO ANTÚNEZ DE MAYOLO</strong></p>
                                    <hr style="margin-top: 5px;margin-bottom: 5px;" class="hrP">
                                    <p><FONT FACE="Monotype Corsiva" SIZE=5 COLOR="#EDB23B">Una Nueva Universidad para el Desarrollo</FONT></p>
                                </td>
                               <td style="width: 3.52cm; text-align: center;padding-top: 20px;">
                                
                                </td>                    
                            </tr>
                        </tbody>
                    </table>
                    </center>



            <div class="box-header with-border" style="padding-left: 40px;  padding-top: 30px;">
              <center><h3 class="box-title" id="divtituloEvalImp" style="text-decoration: underline;"></h3></center>
              <br>
              <div id="divalumnoEvalImp" style="float:left;"></div>
              <div id="divFecImp" style="float:right;"></div>
              <br>
              <div id="divEtapaImp" style="float:left;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="divCuerpoEvalImp" style="padding-left: 20px;padding-top: 20px;"> 
            
                
            </div>
          </div>



      </div>
      </div>
      <div class="modal-footer">
      <button id="imp" class="btn btn-success no-print" onclick="imprimirEval();"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>

      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar</button>

      </div>
    </div>
  </div>
</div>

<?php endif; ?>











<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>