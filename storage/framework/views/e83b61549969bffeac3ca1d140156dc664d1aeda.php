        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Lista de Alumnos</h3>
          </div>
          <div class="box-body">
             <table class="table table-bordered table-hover" id="tabla1" style="font-size: 14px;">
                <caption>Relación de Alumnos</caption>
                <thead>
                  <tr>
                    
                    <th width="5%">#</th>
                    <th width="8%">Código</th>
                    <th width="20%">Nombres</th>
                    <th width="20%">Apellidos</th>
                    <th width="5%">Ciclo</th>
                    <th width="7%">Teléfono</th>
                    <th width="20%">Correo</th>
                   
                    <th width="15%">Gestión</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTable">
                <?php
                $cont=1;
                ?>
                  <?php $__currentLoopData = $alumnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($cont); ?></td>
                      <td><?php echo e($dato->codigo); ?></td>
                      <td><?php echo e($dato->nombres); ?></td>
                      <td><?php echo e($dato->apellidos); ?></td>
                      <td><?php echo e($dato->semestre); ?></td>
                      <td><?php echo e($dato->telf); ?></td>
                      <td><?php echo e($dato->correo); ?></td>
                   

                      <td>
                        <center>
                          <button class="btn btn-warning" type="button" onclick="editar(<?php echo e($dato->idper); ?>,<?php echo e($dato->idalum); ?>,<?php echo e($dato->idusu); ?>);" data-placement="top" data-toggle="tooltip" title="Editar Alumno"><i class="fa fa-cogs"></i></button>
                          <button class="btn btn-danger" type="button" onclick="deleteAlum(<?php echo e($dato->idper); ?>,<?php echo e($dato->idalum); ?>,<?php echo e($dato->idusu); ?>);" data-placement="top" data-toggle="tooltip" title="Eliminar Alumno"><i class="fa fa-trash"></i></button>
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
