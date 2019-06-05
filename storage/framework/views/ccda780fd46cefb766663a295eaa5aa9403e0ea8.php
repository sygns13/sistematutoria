          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#actividades" data-toggle="tab">Actividades Pendientes</a></li>
              <li><a href="#historicos" data-toggle="tab">Registro Histórico de Actividades</a></li>
           
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="actividades">
                <ul class="timeline timeline-inverse"> 

                  <?php 
                    $fecha="fec";
                    $aux="0";
                   ?>

                  <?php $__currentLoopData = $evaluacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                  <?php if($dato->tipo=='evaluacion'): ?>

                  <?php if($dato->fechatomada!=$fecha): ?>
                    <li class="time-label">
                        <span class="bg-blue">
                         <?php echo e(pasFechaVista($dato->fechatomada)); ?>

                        </span>
                 
                    </li>
                    <?php 
                      $fecha=$dato->fechatomada;
                     ?>
                  <?php endif; ?>

                    

                    <li>
                    <i class="fa fa-file-text bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> <?php echo e($dato->hora); ?></span>

                      <h3 class="timeline-header"><a href="#">Su tutor le envió la siguiente evaluación</a> Proceda a Resolverla</h3>

                      <div class="timeline-body">
                        <?php echo e($dato->deseval); ?>

                      </div>
                      <div class="timeline-footer">
                        <button type="button" class="btn btn-primary btn-xs" onclick="revisarEval('<?php echo e($dato->id); ?>')">Revisar y Resolver el Cuestionario</button>
                 
                      </div>
                    </div>
                  </li>

                  <?php elseif($dato->tipo=='tarea'): ?>

                    <?php if($dato->fechatomada!=$fecha): ?>
                    <li class="time-label">
                        <span class="bg-green">
                         <?php echo e(pasFechaVista($dato->fechatomada)); ?>

                        </span>
                 
                    </li>
                    <?php 
                      $fecha=$dato->fechatomada;
                     ?>
                  <?php endif; ?>


                  <li>
                    <i class="fa fa-home bg-green"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> <?php echo e($dato->hora); ?></span>

                      <h3 class="timeline-header"><a href="#">Su tutor le envió la Siguiente Tarea</a> Proceda a Revisarla y atenderla</h3>

                      <div class="timeline-body">
                        <?php echo e($dato->deseval); ?>, Fecha máxima de entrega del desarrollo: <?php echo e(pasFechaVista($dato->fechares)); ?>

                      </div>
                      <div class="timeline-footer">
                        <button type="button" class="btn btn-success btn-xs" onclick="revisarTarea('<?php echo e($dato->id); ?>')">Revisar y Atender la Tarea</button>
    
                      </div>
                    </div>
                  </li>

                  <?php elseif($dato->tipo=='sesion'): ?>
                    <?php if($dato->fechatomada!=$fecha): ?>
                    <li class="time-label">
                        <span class="bg-aqua">
                         <?php echo e(pasFechaVista($dato->fechatomada)); ?>

                        </span>
                 
                    </li>
                    <?php 
                      $fecha=$dato->fechatomada;
                     ?>
                  <?php endif; ?>

                    <li>
                    <i class="fa fa-comments bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> <?php echo e($dato->hora); ?></span>

                      <h3 class="timeline-header"><a href="#">Citación a Sesión de Trabajo</a> <?php if(strval($dato->estado)=="3"): ?> <span class="label label-danger" style="font-size: 100%">Sesión Cancelada</span> <?php else: ?> Atienda la Citación <?php endif; ?></h3>

                      <div class="timeline-body">
                        Su tutor le cita a la sesión <?php if(strval($dato->tipoSesion)=="1"): ?> Presencial <?php elseif(strval($dato->tipoSesion)=="2"): ?> Virtual <?php endif; ?>: <?php echo e($dato->deseval); ?> el día <?php echo e(pasFechaVista($dato->fechares)); ?> a horas <?php echo e($dato->horaEval); ?>.

                          <?php if(strval($dato->confirmado)=="1"): ?>
                          <br><br>
                          <span class="label label-success" style="font-size: 100%">Participación Confirmada</span>
                          <?php elseif(strval($dato->confirmado)=="2"): ?>
                          <br><br>
                          <span class="label label-warning" style="font-size: 100%">Solicitud de Cancelación Enviada</span>
                          <?php endif; ?>
                      </div>
                      <div class="timeline-footer">
                        <?php if(strval($dato->estado)=="3"): ?>
                        <button type="button" class="btn bg-navy-active color-palette btn-xs" onclick="revisarSesion('<?php echo e($dato->id); ?>')">Ver Detalles de la Sesión</button>
                        <?php else: ?>
                        <button type="button" class="btn btn-info btn-xs" onclick="revisarSesion('<?php echo e($dato->id); ?>')">Ver Detalles y Confirmar la Sesión</button>
                     <?php endif; ?>
                      </div>
                    </div>
                  </li>

                  <?php endif; ?>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  

                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>

                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="historicos">
                <!-- The timeline -->
                <?php echo $__env->make('adminlte::alumnoHistoricos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="otros">
                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
