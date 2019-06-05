<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="<?php echo e(url('/home')); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>TU</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Tutoría</b> Universitaria</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only"><?php echo e(trans('adminlte_lang::message.togglenav')); ?></span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">


        
            <ul class="nav navbar-nav">
       
                <!-- Messages: style can be found in dropdown.less-->
                

                <!-- Notifications Menu -->
            
                <!-- Tasks Menu -->
            
        

                 <?php 
                $foto="";
                $sexo="";
                $nomTU="";
                 ?>
                <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(url('/register')); ?>"><?php echo e(trans('adminlte_lang::message.register')); ?></a></li>
                    <li><a href="<?php echo e(url('/login')); ?>"><?php echo e(trans('adminlte_lang::message.login')); ?></a></li>
                <?php else: ?>




 <?php 

    $usuario=DB::select("select p.imagen,p.genero, tu.nombre as nomTU from personas p
inner join users u on p.id=u.persona_id inner join tipousers tu on tu.id=u.tipouser_id  where u.id='".Auth::user()->id."';");


$foto="";
    foreach ($usuario as $usr) {
        $foto=$usr->imagen;
        $sexo=$usr->genero;
        $nomTU=$usr->nomTU;
    }
     ?> 
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="bajar3();">
                            <!-- The user image in the navbar-->

                             <?php if($foto=="" || $foto==null): ?>


                               <?php if($sexo=="1"): ?>
                          <img src="<?php echo e(asset('/img/av3.png')); ?>" class="user-image" alt="User Image" />

                        <?php elseif($sexo=="2"): ?>
                          <img src="<?php echo e(asset('/img/av2.jpg')); ?>" class="user-image" alt="User Image" />

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
                        
                        <img src="<?php echo e(asset($ruta)); ?>" class="user-image" alt="User Image" />


                   
                       <?php endif; ?>



                     
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
                        </a>
                        <ul class="dropdown-menu" id="menuBajar3">
                            <!-- The user image in the menu -->
                            <li class="user-header">
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
                        
                        <img src="<?php echo e(asset($ruta)); ?>" class="img-circle" alt="User Image" />


                   
                       <?php endif; ?>
                                <p>
                                   <small> <?php echo e($nomTU); ?></small>
                                    <?php echo e(Auth::user()->name); ?>

                                    <small><?php echo e(Auth::user()->email); ?></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                         
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="javascript:void(0);" onclick="Myperfil();" class="btn btn-info btn-flat">Mi Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo e(url('/logout')); ?>" class="btn btn-danger btn-flat"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>

                                    <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="submit" value="logout" style="display: none;">
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- Control Sidebar Toggle Button -->
            
            </ul>
        </div>
    </nav>
</header>
<script type="text/javascript">
    function bajar1(){
        //alert("prueba");
        $("#menuBajar1").toggle();
    }

    function bajar2(){
        //alert("prueba");
        $("#menuBajar2").toggle();
    }

    function bajar3(){
        //alert("prueba");
        $("#menuBajar3").toggle();
    }
</script>
