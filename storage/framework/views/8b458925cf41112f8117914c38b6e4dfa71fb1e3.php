             <div class="box">
          <div class="box-header">
            <h3 class="box-title" style="width: 100%;"><center><strong>RELACION DE PREGUNTAS:</strong></center>
              <br><br><strong>Etapa: </strong> <?php echo e($nomEta); ?>

              <br><br><strong>Dimension: </strong> <?php echo e($nomDim); ?>

              </h3>
          </div>
          <div class="box-body">
             <table class="table table-bordered table-hover" id="tabla1" style="font-size: 14px;">
                
                <thead>
                  <tr>
                    
                    <th width="10%">#</th>
                    <th>Preguntas</th>

                    <th width="15%">Gestión</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTable">
                <?php
                $cont=1;
                ?>
                  <?php $__currentLoopData = $preguntas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($cont); ?></td>
                      <td><?php echo e($dato->nombre); ?></td>
                      
                      <td>
                        <center>
 
           
                          <button class="btn btn-warning" type="button" onclick="editar('<?php echo e($dato->id); ?>','<?php echo e($dato->nombre); ?>');" data-placement="top" data-toggle="tooltip" title="Editar Pregunta"><i class="fa fa-cogs"></i></button>
                          <button class="btn btn-danger" type="button" onclick="eliminar('<?php echo e($dato->id); ?>','<?php echo e($dato->nombre); ?>');" data-placement="top" data-toggle="tooltip" title="Borrar Pregunta"><i class="fa fa-trash"></i></button>
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

