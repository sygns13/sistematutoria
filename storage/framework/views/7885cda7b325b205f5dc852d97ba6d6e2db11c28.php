        <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Chat Directo Alumno: <?php echo e($alumno->apellidos); ?>, <?php echo e($alumno->nombres); ?></h3>

              <div class="box-tools pull-right">
               

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="padrePaneChat">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages" id="PanelChatDirecto">
                <!-- Message. Default to the left -->

<?php 
$auxFotoT="0";
$auxFotoA="0";

$abrioT="0";
$abrioA="0";

 ?>

<?php $__currentLoopData = $chat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



<?php if($msj->idtu=="4"): ?>

<?php if($auxFotoT=="1"): ?>
</div>
<?php endif; ?>

<?php if($auxFotoA=="0"): ?>

                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left"><?php echo e($msj->nombre); ?>: <?php echo e($msj->apellidos); ?>, <?php echo e($msj->nombres); ?> </span>
                    <span class="direct-chat-timestamp pull-right"><?php echo e($msj->fecha); ?> <?php echo e($msj->hora); ?></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  

<?php if($msj->imagen==""|| $msj->imagen==null): ?>

                        <?php if($msj->genero=="1"): ?>

                        <img class="direct-chat-img" src="<?php echo e(asset('/img/av3.png')); ?>" style="width: 40px;height: 40px;"  alt="Message User Image">
                

                        <?php elseif($msj->genero=="2"): ?>

                        <img class="direct-chat-img" src="<?php echo e(asset('/img/av2.jpg')); ?>" style="width: 40px;height: 40px;"  alt="Message User Image">
                          <?php elseif($msj->genero==null): ?>
                            <img class="direct-chat-img" src="<?php echo e(asset('/img/av3.png')); ?>" style="width: 40px;height: 40px;"  alt="Message User Image">
                        <?php endif; ?>
                       <?php else: ?>

                       <img class="direct-chat-img" src="<?php echo e(asset($msj->imagen)); ?>" style="width: 40px;height: 40px;"  alt="Message User Image">

                       <?php endif; ?>










 <div class="direct-chat-text">
<?php echo e($msj->mensaje); ?>

</div>

<?php 
$auxFotoT="0";
$auxFotoA="1";
 ?>


<?php else: ?>
 <div class="direct-chat-text">
<?php echo e($msj->mensaje); ?>

</div>

<?php endif; ?>


<?php elseif($msj->idtu=="3"): ?>

<?php if($auxFotoA=="1"): ?>
</div>
<?php endif; ?>


<?php if($auxFotoT=="0"): ?>

  <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right"><?php echo e($msj->nombre); ?>: <?php echo e($msj->apellidos); ?>, <?php echo e($msj->nombres); ?></span>
                    <span class="direct-chat-timestamp pull-left"><?php echo e($msj->fecha); ?> <?php echo e($msj->hora); ?></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  

                       <?php if($msj->imagen=="" || $msj->imagen==null): ?>
  <?php if($msj->genero=="1"): ?>
<img class="direct-chat-img" src="<?php echo e(asset('/img/av3.png')); ?>" style="width: 40px;height: 40px;"  alt="Message User Image">
  <?php elseif($msj->genero=="2"): ?>
<img class="direct-chat-img" src="<?php echo e(asset('/img/av2.png')); ?>" style="width: 40px;height: 40px;" alt="Message User Image">
  <?php elseif($msj->genero==null): ?>
<img class="direct-chat-img" src="<?php echo e(asset('/img/av3.png')); ?>" style="width: 40px;height: 40px;"  alt="Message User Image">
  <?php endif; ?>
 <?php else: ?>

  <?php 
 $ruta="/img/perfilTutores/".$msj->imagen;
  ?>

 <img class="direct-chat-img" src="<?php echo e(asset($ruta)); ?>" style="width: 40px;height: 40px;"  alt="Message User Image">

 <?php endif; ?>





                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    <?php echo e($msj->mensaje); ?>

                  </div>

<?php 
$auxFotoA="0";
$auxFotoT="1";
 ?>


<?php else: ?>
 <div class="direct-chat-text">
                    <?php echo e($msj->mensaje); ?>

                  </div>

<?php endif; ?>



<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if($auxFotoT=="1"): ?>
</div>
<?php endif; ?>
<?php if($auxFotoA=="1"): ?>
</div>
<?php endif; ?>




              </div>
              <!--/.direct-chat-messages-->

              <!-- Contacts are loaded here -->
              <div class="direct-chat-contacts">
                <ul class="contacts-list">
                  <li>
                    <a href="#">



                       <img class="contacts-list-img" src="<?php echo e(asset('/img/av3.png')); ?>" style="width: 40px;height: 40px;" alt="User Image">


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
            
                <div class="input-group">

<input type="hidden" name="chattxtidta" id="chattxtidta" value="<?php echo e($idTA); ?>">
<input type="hidden" name="idLastMsj" id="idLastMsj" value="<?php echo e($idLastMsj); ?>">

<input type="text" name="message" placeholder="Ingrese su Mensaje ..." class="form-control" id="txtMsjChat" onkeypress="enviarEnter(this,event);">
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-primary btn-flat" id="btnEnviarChat" onclick="enviarMsj();">Enviar</button>
                      </span>
                </div>
             
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
        </div>