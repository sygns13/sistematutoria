<?php $__currentLoopData = $alumno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- Profile Image -->
<div class="box box-primary">
    <div class="box-body box-profile">
        <?php if($dato->imagen=="" || $dato->imagen==null): ?>
                       <?php if($dato->genero=="1"): ?>
        <img alt="User Image" class="profile-user-img img-responsive img-circle" src="<?php echo e(asset('/img/av3.png')); ?>"/>
        <?php elseif($dato->genero=="2"): ?>
        <img alt="User Image" class="profile-user-img img-responsive img-circle" src="<?php echo e(asset('/img/av2.jpg')); ?>"/>
        <?php else: ?>
        <img alt="User Image" class="profile-user-img img-responsive img-circle" src="<?php echo e(asset('/img/av3.png')); ?>"/>
        <?php endif; ?>
                       <?php else: ?>

                       <?php 
                       if(Auth::user()->tipouser_id=="3"){
                            $ruta="/img/perfilTutores/".$dato->imagen;
                       }elseif(Auth::user()->tipouser_id=="4"){
                            $ruta="/".$dato->imagen; 
                       }else
                       {
                        $ruta="/img/users/".$dato->imagen; 
                       }
                        ?>
        <img alt="User Image" class="profile-user-img img-responsive img-circle" src="<?php echo e(asset($ruta)); ?>" style="width: 100px;height: 100px;"/>
        <?php endif; ?>
        <h3 class="profile-username text-center">
            <?php echo e($dato->nombres); ?> <?php echo e($dato->apellidos); ?>

        </h3>
        <p class="text-muted text-center">
            <?php echo e($dato->codigo); ?>

        </p>
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>
                    DNI
                </b>
                <a class="pull-right">
                    <?php echo e($dato->DNI); ?>

                </a>
            </li>
            <li class="list-group-item">
                <b>
                    Teléfono
                </b>
                <a class="pull-right">
                    <?php echo e($dato->telf); ?>

                </a>
            </li>
            <li class="list-group-item">
                <b>
                    Dirección
                </b>
                <a class="pull-right">
                    <?php echo e($dato->direccion); ?>

                </a>
            </li>
        </ul>
        <a class="btn btn-primary btn-block" href="javascript:void(0);" onclick="Myperfil();"><i class="fa fa-user margin-r-5"></i>
            <b>
                Mi Perfil
            </b>
        </a>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
<!-- About Me Box -->
<?php 
$aux=0;
 ?>

<?php $__currentLoopData = $tutorAlumno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php 
$aux=1;
 ?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">
            Tutor Asignado
        </h3>
    </div>
    <div class="box-body">
        <strong>
            <i class="fa fa-book margin-r-5">
            </i>
            <?php echo e($dato->nombres); ?> <?php echo e($dato->apellidos); ?>

        </strong>
        <p class="text-muted">
            Especialidad: <?php echo e($dato->esptutor); ?>

        </p>
        <hr>
            <strong>
                <i class="fa fa-map-marker margin-r-5">
                </i>
                Teléfono
            </strong>
            <p class="text-muted">
                <?php echo e($dato->telf); ?>

            </p>
            <hr>
                <strong>
                    <i class="fa fa-pencil margin-r-5">
                    </i>
                    Correo
                </strong>
                <p>
                    <span class="label label-info">
                        <?php echo e($dato->email); ?>

                    </span>
                </p>
                <hr>
                    <strong>
                        <i class="fa fa-file-text-o margin-r-5">
                        </i>
                        Detalles
                    </strong>
                    <p>
                        <center><button type="button" class="btn btn-info" id="btnPerfilTutor" onclick="VerPerfilTutor('<?php echo e($dato->idtutor); ?>');"><i class="fa fa-user margin-r-5"></i> Ver Perfil del Tutor</button></center>
                    </p>
                    <p>
                        <center><button type="button" class="btn btn-info" id="btnChatTutor" onclick="iniciarChat('<?php echo e($dato->idper); ?>','<?php echo e($dato->idtutor); ?>','<?php echo e($dato->idusu); ?>','<?php echo e($dato->idTA); ?>');"><i class="fa fa-wechat margin-r-5"></i> Iniciar Chat en Vivo</button></center>
                    </p>

    </div>
</div>
<!-- /.box -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if($aux==0): ?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">
            Tutor Asignado
        </h3>
    </div>
    <div class="box-body">
        <strong>
            <i class="fa fa-book margin-r-5">
            </i>
            Aún no cuenta con un tutor asignado. Comuníquese con el coordinador de la Tutoría.
        </strong>
       
      



    </div>
</div>
<?php endif; ?>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
