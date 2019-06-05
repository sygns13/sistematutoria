@foreach($alumno as $dato)
<!-- Profile Image -->
<div class="box box-primary">
    <div class="box-body box-profile">
        @if($dato->imagen=="" || $dato->imagen==null)
                       @if($dato->genero=="1")
        <img alt="User Image" class="profile-user-img img-responsive img-circle" src="{{ asset('/img/av3.png')}}"/>
        @elseif($dato->genero=="2")
        <img alt="User Image" class="profile-user-img img-responsive img-circle" src="{{ asset('/img/av2.jpg')}}"/>
        @else
        <img alt="User Image" class="profile-user-img img-responsive img-circle" src="{{ asset('/img/av3.png')}}"/>
        @endif
                       @else

                       @php
                       if(Auth::user()->tipouser_id=="3"){
                            $ruta="/img/perfilTutores/".$dato->imagen;
                       }elseif(Auth::user()->tipouser_id=="4"){
                            $ruta="/".$dato->imagen; 
                       }else
                       {
                        $ruta="/img/users/".$dato->imagen; 
                       }
                       @endphp
        <img alt="User Image" class="profile-user-img img-responsive img-circle" src="{{ asset($ruta) }}" style="width: 100px;height: 100px;"/>
        @endif
        <h3 class="profile-username text-center">
            {{$dato->nombres}} {{$dato->apellidos}}
        </h3>
        <p class="text-muted text-center">
            {{$dato->codigo}}
        </p>
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>
                    DNI
                </b>
                <a class="pull-right">
                    {{$dato->DNI}}
                </a>
            </li>
            <li class="list-group-item">
                <b>
                    Teléfono
                </b>
                <a class="pull-right">
                    {{$dato->telf}}
                </a>
            </li>
            <li class="list-group-item">
                <b>
                    Dirección
                </b>
                <a class="pull-right">
                    {{$dato->direccion}}
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
@php
$aux=0;
@endphp

@foreach($tutorAlumno as $dato)
@php
$aux=1;
@endphp
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
            {{$dato->nombres}} {{$dato->apellidos}}
        </strong>
        <p class="text-muted">
            Especialidad: {{$dato->esptutor}}
        </p>
        <hr>
            <strong>
                <i class="fa fa-map-marker margin-r-5">
                </i>
                Teléfono
            </strong>
            <p class="text-muted">
                {{$dato->telf}}
            </p>
            <hr>
                <strong>
                    <i class="fa fa-pencil margin-r-5">
                    </i>
                    Correo
                </strong>
                <p>
                    <span class="label label-info">
                        {{$dato->email}}
                    </span>
                </p>
                <hr>
                    <strong>
                        <i class="fa fa-file-text-o margin-r-5">
                        </i>
                        Detalles
                    </strong>
                    <p>
                        <center><button type="button" class="btn btn-info" id="btnPerfilTutor" onclick="VerPerfilTutor('{{$dato->idtutor}}');"><i class="fa fa-user margin-r-5"></i> Ver Perfil del Tutor</button></center>
                    </p>
                    <p>
                        <center><button type="button" class="btn btn-info" id="btnChatTutor" onclick="iniciarChat('{{$dato->idper}}','{{$dato->idtutor}}','{{$dato->idusu}}','{{$dato->idTA}}');"><i class="fa fa-wechat margin-r-5"></i> Iniciar Chat en Vivo</button></center>
                    </p>

    </div>
</div>
<!-- /.box -->
@endforeach

@if($aux==0)
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
@endif


@endforeach
