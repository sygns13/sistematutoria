     
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Relación de Tutores</h3>
          </div>
          <div class="box-body">
             <table class="table table-bordered table-hover" id="tabla1" style="font-size: 14px;">
                
                <thead>
                  <tr>
                    
                    <th width="4%">#</th>
                    <th width="10%">DNI</th>
                    <th width="17%">Apellidos</th>
                    <th width="17%">Nombres</th>
                    <th width="17%">Especialidad</th>
                    <th width="10%">Teléf Cell</th>
                    <th width="10%">Estado en el Sistema</th>
                    <th width="15%">Gestión</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTable">
                <?php
                $cont=1;
                ?>
                  <?php $__currentLoopData = $tutors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($cont); ?></td>
                      <td><?php echo e($dato->dni); ?></td>
                      <td><?php echo e($dato->apellidos); ?></td>
                      <td><?php echo e($dato->nombres); ?></td>
                      <td><?php echo e($dato->esptutor); ?></td>
                      <td><?php echo e($dato->telf); ?></td>
                      <td>
                      <?php if($dato->tactivo=="1"): ?>
                      <span class="label label-success">Activo</span>
                      <?php elseif($dato->tactivo=="2"): ?>
                      <span class="label label-warning">Suspendido</span>
                      <?php elseif($dato->tactivo=="3"): ?>
                        <span class="label label-danger">De Baja</span>
                      <?php endif; ?>
                      </td>
                      
                      <td>
                        <center>
                        <button class="btn btn-info" onclick="verMas('<?php echo e($dato->idper); ?>','<?php echo e($dato->idtutor); ?>','<?php echo e($dato->idusu); ?>');" data-placement="top" data-toggle="tooltip" title="Ver más"><i class="fa fa-eye" aria-hidden="true"></i></button>   

                        <?php if($dato->tactivo=="2" || $dato->tactivo=="3"): ?>
                          <button class="btn btn-success" onclick="darSubida('<?php echo e($dato->idper); ?>','<?php echo e($dato->idtutor); ?>','<?php echo e($dato->idusu); ?>','<?php echo e($dato->apellidos); ?>','<?php echo e($dato->nombres); ?>','<?php echo e($dato->dni); ?>');" data-placement="top" data-toggle="tooltip" title="Activar Docente"><i class="fa fa-user-plus" aria-hidden="true"></i></button>
                        <?php elseif($dato->tactivo=="1"): ?>
                         <button class="btn bg-navy" onclick="DarBaja('<?php echo e($dato->idper); ?>','<?php echo e($dato->idtutor); ?>','<?php echo e($dato->idusu); ?>','<?php echo e($dato->apellidos); ?>','<?php echo e($dato->nombres); ?>','<?php echo e($dato->dni); ?>');" data-placement="top" data-toggle="tooltip" title="Desactivar Docente"><i class="fa fa-user-times" aria-hidden="true"></i></button>  

                         <?php endif; ?>            
                          <button class="btn btn-warning" type="button" onclick="editar('<?php echo e($dato->idper); ?>','<?php echo e($dato->idtutor); ?>','<?php echo e($dato->idusu); ?>','<?php echo e($dato->apellidos); ?>','<?php echo e($dato->nombres); ?>','<?php echo e($dato->dni); ?>');" data-placement="top" data-toggle="tooltip" title="Editar Docente"><i class="fa fa-cogs"></i></button>
                          <button class="btn btn-danger" type="button" onclick="eliminar('<?php echo e($dato->idper); ?>','<?php echo e($dato->idtutor); ?>','<?php echo e($dato->idusu); ?>','<?php echo e($dato->apellidos); ?>','<?php echo e($dato->nombres); ?>','<?php echo e($dato->dni); ?>');" data-placement="top" data-toggle="tooltip" title="Borrar Docente"><i class="fa fa-trash"></i></button>
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

