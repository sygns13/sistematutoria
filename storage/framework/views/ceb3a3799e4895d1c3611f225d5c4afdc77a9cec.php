     
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
                    <th width="15%">Apellidos</th>
                    <th width="15%">Nombres</th>
                    <th width="16%">Especialidad</th>
                    <th width="10%">Teléf Cell</th>
                    <th width="10%">Estado en el Sistema</th>
                    <th width="10%">N° de Alumnos Tutoreados</th>
                    <th width="10%">Asignar</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTable">
                <?php
                $cont=1;
                ?>
                  <?php $__currentLoopData = $tutorAlumno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                     <td><?php echo e($dato->totalAsesorados); ?></td>
                      <td>

          <?php 
            $auxS2=0;
           ?>

          <?php $__currentLoopData = $semestre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php 
            $auxS2=1;
           ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($auxS2=='1'): ?>
                          <center>
                        <button class="btn btn-primary" onclick="asignarTut('<?php echo e($dato->idper); ?>','<?php echo e($dato->idtutor); ?>','<?php echo e($dato->idusu); ?>');" data-placement="top" data-toggle="tooltip" title="Asignar Alumnos para Tutoría"><i class="fa fa-user-plus" aria-hidden="true"></i></button>  </center>
                  <?php elseif($auxS2=='0'): ?>
                  No existe Semestre Activo.
                  <?php endif; ?>
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

