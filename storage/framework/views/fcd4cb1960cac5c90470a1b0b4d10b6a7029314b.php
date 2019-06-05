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
                        <button type="button" class="btn btn-primary" style="margin-bottom: 5px; width: 130px;">Iniciar Chat</button><br>
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


          <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Direct Chat</h3>

              <div class="box-tools pull-right">
                <span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                  <i class="fa fa-comments"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Alexander Pierce</span>
                    <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    Is this template really for free? That's unbelievable!
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->

                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right">Sarah Bullock</span>
                    <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    You better believe it!
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
              </div>
              <!--/.direct-chat-messages-->

              <!-- Contacts are loaded here -->
              <div class="direct-chat-contacts">
                <ul class="contacts-list">
                  <li>
                    <a href="#">
                      <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="User Image">

                      <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              Count Dracula
                              <small class="contacts-list-date pull-right">2/28/2015</small>
                            </span>
                        <span class="contacts-list-msg">How have you been? I was...</span>
                      </div>
                      <!-- /.contacts-list-info -->
                    </a>
                  </li>
                  <!-- End Contact Item -->
                </ul>
                <!-- /.contatcts-list -->
              </div>
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <form action="#" method="post">
                <div class="input-group">
                  <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-flat">Send</button>
                      </span>
                </div>
              </form>
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
        </div>