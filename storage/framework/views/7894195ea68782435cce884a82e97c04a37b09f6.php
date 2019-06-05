             <div class="col-md-12" id="divtablaEval">
             <div class="box">
          <div class="box-header">
            <h3 class="box-title" style="width: 100%;"><center><strong>RELACION DE TAREAS AL ALUMNO:</strong></center>
              </h3>
          </div>
          <div class="box-body">

            <div style="font-size: 12px;"><strong style="text-decoration: underline;">Nota:</strong> Solo se podran editar y eliminar las tareas que no hayan sido vistas o resueltas por los alumnos.</div>
             <table class="table table-bordered table-hover" id="tabla1" style="font-size: 14px;">
                
                <thead>
                  <tr>
                    
                    <th width="5%">#</th>
                    <th>Título de la Tarea</th>
                    <th width="13%">Etapa de la Tutoría</th>
                    <th width="13%">Evaluación Base</th>
                    <th width="13%">Diagnóstico Base</th>
                    <th width="13%">Estado</th>
                    <th width="10%">Fecha</th>
                    <th width="13%">Gestión</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTable">
                <?php
                $cont=1;
                ?>
                  <?php $__currentLoopData = $tareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($cont); ?></td>
                      <td><?php echo e($dato->nombreTar); ?></td>
                      <td><?php echo e($dato->etapa); ?></td>
                      <td><?php echo e($dato->deseval); ?></td>
                      <td><?php echo e($dato->nomdiag); ?></td>

                      <td>
                        <?php if(strval($dato->tareaestado)=="1"): ?>
                        <span class="label label-warning">Tarea Enviada</span>
                         <?php elseif(strval($dato->tareaestado)=="2"): ?>
                        <span class="label label-info">Vista por el Alumno</span>
                        <?php elseif(strval($dato->tareaestado)=="3"): ?>
                        <span class="label label-primary">Resuelta por el Alumno</span>
                        <?php elseif(strval($dato->tareaestado)=="4"): ?>
                        <span class="label label-success">Tarea Calificada</span>
                        <?php endif; ?>

                      </td>

                      <td><?php echo e(pasFechaVista($dato->fechatarea)); ?></td>
                      
                      <td>
                        <center>
 
                          <button class="btn btn-info" onclick="verMasTarea('<?php echo e($dato->idTarea); ?>','<?php echo e($dato->nombreTar); ?>');" data-placement="top" data-toggle="tooltip" title="Ver Tarea"><i class="fa fa-eye" aria-hidden="true"></i></button>  

                          <?php if(strval($dato->tareaestado)=="1"): ?>
                          <button class="btn btn-warning" type="button" onclick="editarTarea('<?php echo e($dato->idTarea); ?>','<?php echo e($dato->nombreTar); ?>');" data-placement="top" data-toggle="tooltip" title="Editar Tarea"><i class="fa fa-cogs"></i></button>

                          <button class="btn btn-danger" type="button" onclick="eliminarTarea('<?php echo e($dato->idTarea); ?>','<?php echo e($dato->nombreTar); ?>');" data-placement="top" data-toggle="tooltip" title="Borrar Tarea"><i class="fa fa-trash"></i></button>


                          <?php elseif(strval($dato->tareaestado)=="3"): ?>
                          <button class="btn btn-primary" type="button" onclick="califTarea('<?php echo e($dato->idTarea); ?>','<?php echo e($dato->nombreTar); ?>');" data-placement="top" data-toggle="tooltip" title="Calificar Tarea"><i class="fa fa-pencil-square-o"></i></button>

                           <?php elseif(strval($dato->tareaestado)=="4"): ?>
                            

                          <button class="btn btn-primary" type="button" onclick="califTarea('<?php echo e($dato->idTarea); ?>','<?php echo e($dato->nombreTar); ?>');" data-placement="top" data-toggle="tooltip" title="Editar Calificación"><i class="fa fa-pencil-square-o"></i></button>

       
                        <?php endif; ?>
                          
                        </center>

                      </td>
                   </tr>
                   <?php
                   $cont++;
                   ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
              </table>

               

          </div>

        </div>
</div>
