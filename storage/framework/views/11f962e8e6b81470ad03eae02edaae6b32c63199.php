<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Alumnos Asignados  <span class="label label-primary" style="font-size: 100%;">Semestre 2018-I</span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
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
                        <button type="button" class="btn btn-primary" style="margin-bottom: 5px; width: 130px;" onclick="chatAlumno('<?php echo e($dato->idper); ?>','<?php echo e($dato->idalum); ?>','<?php echo e($dato->idusu); ?>','<?php echo e($dato->idTA); ?>')">Iniciar Chat</button><br>
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


<div id="divChat"></div>