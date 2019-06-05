<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <?php if(! Auth::guest()): ?>
            <div class="user-panel">
                <div class="pull-left image">
                
                
<?php 
$foto="";
$sexo="";

    $usuario=DB::select("select p.imagen,p.genero from personas p
inner join users u on p.id=u.persona_id where u.id='".Auth::user()->id."';");
$foto="";
    foreach ($usuario as $usr) {
        $foto=$usr->imagen;
        $sexo=$usr->genero;
    }
     ?>                



                     <?php if($foto=="" || $foto==null): ?>

                      
                       <?php if($sexo=="1"): ?>
                          <img src="<?php echo e(asset('/img/av3.png')); ?>" class="img-circle" alt="User Image"/>

                        <?php elseif($sexo=="2"): ?>
                          <img src="<?php echo e(asset('/img/av2.jpg')); ?>" class="img-circle" alt="User Image"/>

                        <?php else: ?>
                         <img src="<?php echo e(asset('/img/av3.png')); ?>" class="img-circle" alt="User Image"/>
                        <?php endif; ?>
                   
                       
                       <?php else: ?>

                       <?php 
                       if(Auth::user()->tipouser_id=="3"){
                            $ruta="/img/perfilTutores/".$foto; 
                       }elseif(Auth::user()->tipouser_id=="4"){
                            $ruta="/".$foto; 
                       }else
                       {
                        $ruta="/img/users/".$foto; 
                       }
                       
                        ?>
                        
                        <img src="<?php echo e(asset($ruta)); ?>" class="img-circle" alt="User Image" style="width: 45px;height: 45px;"/>


                   
                       <?php endif; ?>


                </div>
                <div class="pull-left info">
                    <p><?php echo e(Auth::user()->name); ?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(trans('adminlte_lang::message.online')); ?></a>
                </div>
            </div>
        <?php endif; ?>



        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENÚ PRINCIPAL</li>
            <!-- Optionally, you can add icons to the links -->

            <?php if(accesoUser([1,2,3,4])): ?>
            <li class="active" id="li1"><a href="<?php echo e(url('home')); ?>"><i class='fa fa-link'></i> <span><?php echo e(trans('adminlte_lang::message.home')); ?></span></a></li>
            <?php endif; ?>

            <?php if(accesoUser([1,2])): ?>
            <li id="li2"><a href="<?php echo e(url('alumnos')); ?>"><i class='fa fa-users'></i> <span>Gestión de Alumnos</span></a></li>
            <?php endif; ?>

            <?php if(accesoUser([1,2])): ?>
            <li id="li3"><a href="<?php echo e(url('tutors')); ?>"><i class='fa fa-user'></i> <span>Gestión de Docentes</span></a></li>
            <?php endif; ?>

            <?php if(accesoUser([1,2])): ?>
            <li id="li4"><a href="<?php echo e(url('tutores')); ?>"><i class='fa fa-user-secret'></i> <span>Asignar Tutores Docentes</span></a></li>
            <?php endif; ?>

            <?php if(accesoUser([1,2])): ?>
            <li id="li5"><a href="<?php echo e(url('semestres')); ?>"><i class='fa fa-calendar'></i> <span>Gestión de Semestres</span></a></li>
            <?php endif; ?>

            <?php if(accesoUser([1,2])): ?>
            <li class="treeview" id="li6">
                <a href="#"><i class='fa fa-cogs'></i> <span>Dimensiones y Etapas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                   <li><a href="<?php echo e(url('dimensions')); ?>"><i class='fa fa-check-square-o'></i> <span>Dimensiones Personales</span></a></li>
                    <li><a href="<?php echo e(url('etapas')); ?>"><i class='fa fa-check-square-o'></i> <span>Etapas de la Tutoría</span></a></li>
                     <li><a href="<?php echo e(url('bancopreguntas')); ?>"><i class='fa fa-check-square-o'></i> <span>Banco de Preguntas</span></a></li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if(accesoUser([1,2])): ?>
            <li id="li7"><a href="#"><i class='fa fa-book'></i> <span>Manual de Usuario</span></a></li>
            <?php endif; ?>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
