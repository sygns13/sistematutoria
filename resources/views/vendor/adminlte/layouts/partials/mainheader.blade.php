<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>TU</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Tutoría</b> Universitaria</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">


        
            <ul class="nav navbar-nav">
       {{--      <li>
            <div class="col-md-12" style="float:right;">
            <h2>Semestre Activo: 2017-I</h2>
            </div></li> --}}
                <!-- Messages: style can be found in dropdown.less-->
               {{--     <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="bajar1();">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">0</span>
                    </a>
                    <ul class="dropdown-menu" id="menuBajar1">
                        <li class="header">Usted tiene 0 mensajes</li>
                  {{--      <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <!-- User Image -->
                                            <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image"/>
                                        </div>
                                        <!-- Message title and timestamp -->
                                        <h4>
                                            {{ trans('adminlte_lang::message.supteam') }}
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <!-- The message -->
                                        <p>{{ trans('adminlte_lang::message.awesometheme') }}</p>
                                    </a>
                                </li><!-- end message -->
                            </ul><!-- /.menu -->
                        </li> 
                       
                    </ul>
                </li><!-- /.messages-menu -->--}} 

                <!-- Notifications Menu -->
           {{--       <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="bajar2();">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">0</span>
                    </a>
                    <ul class="dropdown-menu" id="menuBajar2">
                        <li class="header">Usted tiene 0 Notificaciones</li>
                        <li>
                            <!-- Inner Menu: contains the notifications -->
                       {{--     <ul class="menu">
                                <li><!-- start notification -->
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> {{ trans('adminlte_lang::message.newmembers') }}
                                    </a>
                                </li><!-- end notification -->
                            </ul> 
                        </li>

                    </ul>
                </li> --}} 
                <!-- Tasks Menu -->
            {{--      <li class="dropdown tasks-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">{{ trans('adminlte_lang::message.tasks') }}</li>
                  
                      <li>
                            <!-- Inner menu: contains the tasks -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <!-- Task title and progress text -->
                                        <h3>
                                            {{ trans('adminlte_lang::message.tasks') }}
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <!-- The progress bar -->
                                        <div class="progress xs">
                                            <!-- Change the css width attribute to simulate progress -->
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% {{ trans('adminlte_lang::message.complete') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">{{ trans('adminlte_lang::message.alltasks') }}</a>
                        </li>
                    </ul>
                </li> --}}
        

                 @php
                $foto="";
                $sexo="";
                $nomTU="";
                @endphp
                @if (Auth::guest())
                    <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else




 @php

    $usuario=DB::select("select p.imagen,p.genero, tu.nombre as nomTU from personas p
inner join users u on p.id=u.persona_id inner join tipousers tu on tu.id=u.tipouser_id  where u.id='".Auth::user()->id."';");


$foto="";
    foreach ($usuario as $usr) {
        $foto=$usr->imagen;
        $sexo=$usr->genero;
        $nomTU=$usr->nomTU;
    }
    @endphp 
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="bajar3();">
                            <!-- The user image in the navbar-->

                             @if($foto=="" || $foto==null)


                               @if($sexo=="1")
                          <img src="{{ asset('/img/av3.png')}}" class="user-image" alt="User Image" />

                        @elseif($sexo=="2")
                          <img src="{{ asset('/img/av2.jpg')}}" class="user-image" alt="User Image" />

                        @else
                         <img src="{{ asset('/img/av3.png')}}" class="img-circle" alt="User Image"/>
                        @endif

              
                       
                       @else

                       @php
                       if(Auth::user()->tipouser_id=="3"){
                            $ruta="/img/perfilTutores/".$foto; 
                       }elseif(Auth::user()->tipouser_id=="4"){
                            $ruta="/".$foto; 
                       }else
                       {
                        $ruta="/img/users/".$foto; 
                       }
                       @endphp
                        
                        <img src="{{ asset($ruta) }}" class="user-image" alt="User Image" />


                   
                       @endif



                     
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu" id="menuBajar3">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                               @if($foto=="" || $foto==null)

                      
                         @if($sexo=="1")
                          <img src="{{ asset('/img/av3.png')}}" class="img-circle" alt="User Image"/>

                        @elseif($sexo=="2")
                          <img src="{{ asset('/img/av2.jpg')}}" class="img-circle" alt="User Image"/>
                           @else
                         <img src="{{ asset('/img/av3.png')}}" class="img-circle" alt="User Image"/>
                        @endif
                       
                       @else

                       @php
                       if(Auth::user()->tipouser_id=="3"){
                            $ruta="/img/perfilTutores/".$foto; 
                       }elseif(Auth::user()->tipouser_id=="4"){
                            $ruta="/".$foto; 
                       }else
                       {
                        $ruta="/img/users/".$foto; 
                       }
                       @endphp
                        
                        <img src="{{ asset($ruta) }}" class="img-circle" alt="User Image" />


                   
                       @endif
                                <p>
                                   <small> {{$nomTU}}</small>
                                    {{ Auth::user()->name }}
                                    <small>{{Auth::user()->email}}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                         {{--   <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('adminlte_lang::message.followers') }}</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('adminlte_lang::message.sales') }}</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('adminlte_lang::message.friends') }}</a>
                                </div>
                            </li> --}}
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="javascript:void(0);" onclick="Myperfil();" class="btn btn-info btn-flat">Mi Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-danger btn-flat"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="submit" value="logout" style="display: none;">
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Control Sidebar Toggle Button -->
            {{--     <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> --}}
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
