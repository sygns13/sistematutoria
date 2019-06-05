<table class="table table-bordered table-hover" id="tabla2" style="font-size: 12px;">
                
                <thead>
                  <tr>
                    
                    <th width="10%">#</th>
                    <th>Pregunta</th>
                    <th width="25%">Dimensión</th>
                    <th width="15%">Agregar</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTable1">
                <?php
                $cont=1;
                ?>
                  <?php $__currentLoopData = $preguntas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($cont); ?></td>
                      <td><?php echo e($dato->pregunta); ?></td>
                      <td><?php echo e($dato->dimension); ?></td>
                      
                      <td>
                        <center>
 
                          <button class="btn btn-sm btn-primary" onclick="AgregarPreg('<?php echo e($dato->idPreg); ?>','<?php echo e($dato->pregunta); ?>','<?php echo e($dato->dimension); ?>');" data-placement="top" data-toggle="tooltip" title="Agregar Pregunta"><i class="fa fa-plus-square" aria-hidden="true"></i></button>  

                        </center>

                      </td>
                   </tr>
                   <?php
                   $cont++; 
                   ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
              </table>