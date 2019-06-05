     
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Relación de Dimensiones Personales</h3>
          </div>
          <div class="box-body">
             <table class="table table-bordered table-hover" id="tabla1" style="font-size: 14px;">
                
                <thead>
                  <tr>
                    
                    <th width="4%">#</th>
                    <th width="20%">Nombre</th>
                    <th>Descripción</th>
                    <th width="15%">Gestión</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTable">
                <?php
                $cont=1;
                ?>
                  <?php $__currentLoopData = $dimensiones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($cont); ?></td>
                      <td><?php echo e($dato->nomdimen); ?></td>
                      <td><?php  echo $dato->desdimen;  ?></td>
                      
                      <td>
                        <center>
 
           
                          <button class="btn btn-warning" type="button" onclick="editar('<?php echo e($dato->id); ?>','<?php echo e($dato->nomdimen); ?>');" data-placement="top" data-toggle="tooltip" title="Editar Dimensión"><i class="fa fa-cogs"></i></button>
                          <button class="btn btn-danger" type="button" onclick="eliminar('<?php echo e($dato->id); ?>','<?php echo e($dato->nomdimen); ?>');" data-placement="top" data-toggle="tooltip" title="Borrar Dimensión"><i class="fa fa-trash"></i></button>
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

