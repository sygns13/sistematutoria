<table class="table table-bordered table-hover" id="tabla1" style="font-size: 14px;">
                
                <thead>
                  <tr>
                    
                    <th width="10%">#</th>
                    <th>Actividad</th>
                    <th width="20%">Fecha</th>
                    <th width="20%">Estado</th>
                    <th width="15%">Detalles</th>
                  </tr>
                </thead>
                <tbody id="cuerpoHistorico">
                <?php
                $cont=1;
                ?>

                <?php 
                    $fecha="fec";
                    $aux="0";
                   ?>

                  <?php $__currentLoopData = $evaluacionRes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                  <tr>
                      <td><?php echo e($cont); ?></td>
                      <td><?php echo e($dato->deseval); ?></td>
                      <td><?php echo e(pasFechaVista($dato->fechatomada)); ?></td>
                      <td>
                        <?php if($dato->tipo=='evaluacion'): ?>
                             <?php if(strval($dato->estado)=="1"): ?>
                              <span class="label label-warning">Evaluación Recibida</span> Alumno no ha visto las preguntas
                               <?php elseif(strval($dato->estado)=="2"): ?>
                              <span class="label label-info">Vista por el Alumno</span> Alumno no ha respondido la Evaluación
                              <?php elseif(strval($dato->estado)=="3"): ?>
                              <span class="label label-primary">Resuelta</span> Aun no calificada por el Tutor
                              <?php elseif(strval($dato->estado)=="4"): ?>
                              <span class="label label-success">Calificada</span>
                              <?php elseif(strval($dato->estado)=="5"): ?>
                              <span class="label bg-navy color-palette">Calificada</span>
                              <?php endif; ?>

                        <?php elseif($dato->tipo=='tarea'): ?>
                              <?php if(strval($dato->estado)=="1"): ?>
                            <span class="label label-warning">Tarea Recibida</span> Alumno no ha visto la tarea
                             <?php elseif(strval($dato->estado)=="2"): ?>
                            <span class="label label-info">Vista por el Alumno</span> Alumno no ha desarrollado la tarea 
                            <?php elseif(strval($dato->estado)=="3"): ?>
                            <span class="label label-primary">Resuelta</span> Aun no calificada por el Tutor
                            <?php elseif(strval($dato->estado)=="4"): ?>
                            <span class="label label-success">Calificada</span>
                            <?php endif; ?>

                        <?php elseif($dato->tipo=='sesion'): ?>
                          <?php if(strval($dato->estado)=="1"): ?>

                                <?php if(strval($dato->sesionPasada)=="1"): ?>
                                <span class="label label-danger">A espera de Calificación</span> Sesión Pasada
                                <?php else: ?>

                                  <?php if(strval($dato->confirmado)=="1"): ?>
                                  <span class="label label-warning">Sesión Programada</span> Alumno Confirmó su Participación
                                  <?php elseif(strval($dato->confirmado)=="2"): ?>
                                  <span class="label label-danger">Sesión Programada</span> Alumno Solicitó la Cancelación
                                  <?php else: ?>
                                <span class="label label-warning">Sesión Programada</span>
                                <?php endif; ?>
                                <?php endif; ?>
                            
                             <?php elseif(strval($dato->estado)=="2"): ?>
                            <span class="label label-info">Sesión Realizada</span> Calificación Realizada
                            <?php elseif(strval($dato->estado)=="3"): ?>
                            <span class="label label-primary">Sesión Cancelada</span> Por el Tuttor
                            <?php elseif(strval($dato->estado)=="0"): ?>
                            <span class="label label-success">Sesión No Realizada</span>
                            <?php endif; ?>

                        <?php endif; ?>

                      </td>
                      <td>
                        <center>
                        <?php if($dato->tipo=='evaluacion'): ?>
                          <button class="btn btn-info" onclick="verMasEvaluacion('<?php echo e($dato->id); ?>','<?php echo e($dato->deseval); ?>');" data-placement="top" data-toggle="tooltip" title="Ver detalles de la Evaluación"><i class="fa fa-eye" aria-hidden="true"></i></button>  
                        <?php elseif($dato->tipo=='tarea'): ?>  
                          <button class="btn btn-info" onclick="verMasTarea('<?php echo e($dato->id); ?>','<?php echo e($dato->deseval); ?>');" data-placement="top" data-toggle="tooltip" title="Ver detalles de la Tarea"><i class="fa fa-eye" aria-hidden="true"></i></button>  
                        <?php elseif($dato->tipo=='sesion'): ?>
                          <button class="btn btn-info" onclick="verMasSesion('<?php echo e($dato->id); ?>','<?php echo e($dato->deseval); ?>');" data-placement="top" data-toggle="tooltip" title="Ver detalles de la Sesion"><i class="fa fa-eye" aria-hidden="true"></i></button>  
                        <?php endif; ?>

                        </center>

                      </td>
                   </tr>
                   <?php 
                  $aux="1";
                  $cont++;
                   ?>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  <?php if($aux=="0"): ?>
                  <tr>
              
                      <td colspan="4">Aun no se han registrado Actividades Históricas Para el Alumno</td>

                   </tr>
                  <?php endif; ?>
                


                </tbody>
              </table>