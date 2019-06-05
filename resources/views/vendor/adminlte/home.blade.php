@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Inicio
@endsection


@section('main-content')


<style type="text/css">         
          
#mdialTamanio{
  width: 70% !important;
}
#mdialTamanio1{
  width: 70% !important;
}#mdialTamanio2{
  width: 70% !important;
}
</style>



	<div class="container-fluid spark-screen">
		<div class="row">



      @if(accesoUser([1,2]))
			<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Alumnos</h3>
              <p>Gestión de Alumnos</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="{{ URL::to('alumnos') }}" class="small-box-footer" style="height: 37px; font-size: 25px;">Ingresar 
            <i style="font-size: 30px; " class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endif


        @if(accesoUser([1,2]))
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Docentes</h3>

              <p>Gestión de Docentes</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="{{ URL::to('tutors') }}" class="small-box-footer" style="height: 37px; font-size: 25px;">Ingresar 
            <i style="font-size: 30px; " class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endif

        @if(accesoUser([1,2]))
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Tutores</h3>

              <p>Asignar Docentes</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-secret"></i>
            </div>
            <a href="{{ URL::to('tutores') }}" class="small-box-footer" style="height: 37px; font-size: 25px;">Ingresar 
            <i style="font-size: 30px; " class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endif


        @if(accesoUser([3]))



        



        <input type="hidden" name="_token" value="{{csrf_token()}} " id="tokenLaravel">
        <div class="col-md-12" id="panelPrincipal">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Alumnos Asignados  <span class="label label-primary" style="font-size: 100%;">Semestre 2018-I</span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered" style="overflow-x: auto;">
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
                  @foreach($alumnosTut as $dato)
                    <tr>
                      <td>{{$cont}}</td>
                      <td>{{$dato->codigo}}</td>
                      <td>{{$dato->apellidos}}, {{$dato->nombres}}</td>
                      <td>{{$dato->semestre}}</td>
                      <td>{{$dato->telf}}</td>
                      <td>{{$dato->correo}}</td>
                      <td>
                        @if($dato->imagen==""||$dato->imagen==null)

                        @if($dato->genero=="1")
                          <img src="{{ asset('/img/av3.png')}}" class="profile-user-img img-responsive img-circle" alt="User Image" style="height: 80px;width: 80px;" id="imgEdit" />

                        @elseif($dato->genero=="2")
                          <img src="{{ asset('/img/av2.jpg')}}" class="profile-user-img img-responsive img-circle" alt="User Image" style="height: 80px;width: 80px;" id="imgEdit" />
                        @endif
                       @else
                         <img src="{{ asset($dato->imagen)}}" class="profile-user-img img-responsive img-circle" alt="User Image" style="height: 80px;width: 80px;" id="imgEdit" />
                       @endif

                      </td>

                      <td>
                        <button type="button" class="btn btn-primary" style="margin-bottom: 5px; width: 130px;" onclick="chatAlumno('{{$dato->idper}}','{{$dato->idalum}}','{{$dato->idusu}}','{{$dato->idTA}}')">Iniciar Chat</button><br>
                        <button type="button" class="btn btn-primary" style="margin-bottom: 5px;width: 130px;" onclick="envMail('{{$dato->idper}}','{{$dato->idalum}}','{{$dato->idusu}}','{{$dato->idTA}}')">Enviar Mensaje</button><br>
                        <button type="button" class="btn btn-primary" style="width: 130px;" onclick="cargarInf('{{$dato->idper}}','{{$dato->idalum}}','{{$dato->idusu}}','{{$dato->idTA}}')">Guardar Informe</button>

                      </td>
                      <td>
                        <button type="button" class="btn btn-primary" style="margin-bottom: 5px;width: 139px;" onclick="nuevaEval('{{$dato->idper}}','{{$dato->idalum}}','{{$dato->idusu}}','{{$dato->idTA}}')">Evaluaciones</button><br>
                        <button type="button" class="btn btn-primary" style="margin-bottom: 5px;width: 139px;" onclick="nuevaTarea('{{$dato->idper}}','{{$dato->idalum}}','{{$dato->idusu}}','{{$dato->idTA}}')">Tareas</button><br>
                        <button type="button" class="btn btn-primary" style="width: 139px;" onclick="nuevaSesion('{{$dato->idper}}','{{$dato->idalum}}','{{$dato->idusu}}','{{$dato->idTA}}')">Sesiones</button>
                      </td>
                   </tr>
                   <?php
                   $cont++;
                   ?>
                  @endforeach

                  @if($cont==1)
                  <tr>
                    <td colspan="9">Para el presente semestre, el docente aun no tiene alumnos asignados para el proceso de tutoría</td>
                  </tr>

                  @endif





              </tbody></table>
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->
        <div id="divChat"></div>

          <!-- /.box -->
        </div>


        <div id="divTable"></div>

        @endif


        @if(accesoUser([4]))
        @endif

		</div>
	</div>







@if(accesoUser([3]))

<div class="modal fade bs-example-modal-lg" id="modalverMas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document" id="mdialTamanio">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="desBajaTitulo" style="font-weight: bold;text-decoration: underline;">INFORME DE TUTORÍA</h4>

      </div> 
      <div class="modal-body">
      <input type="hidden" id="idPerv" value="0">
      <input type="hidden" id="idAgrev" value="0">
      <input type="hidden" id="idusuv" value="0">


      <div class="row">

      <div class="box" id="divInforme" style="border:0px; box-shadow:none;" >

        <center>
        <table>
                        <tbody>
                            <tr>
                                <td style="width: 3.2cm;text-align: center;padding-top: 20px;">
                                <img src="{{ asset('/img/unasam.png') }}" style="width: 72px;">
                                </td>

                                <td style="width: 11.5cm;;text-align: center;padding-top: 20px;">
                                    <p style="margin-bottom: 0px;font-size: 19px"><strong>UNIVERSIDAD NACIONAL</strong></p>
                                    <p style="margin-bottom: 0px;font-size: 19px"><strong>SANTIAGO ANTÚNEZ DE MAYOLO</strong></p>
                                    <hr style="margin-top: 5px;margin-bottom: 5px;" class="hrP">
                                    <p><FONT FACE="Monotype Corsiva" SIZE=5 COLOR="#EDB23B">Una Nueva Universidad para el Desarrollo</FONT></p>
                                </td>
                               <td style="width: 3.52cm; text-align: center;padding-top: 20px;">
                                
                                </td>                    
                            </tr>
                        </tbody>
                    </table>
                    </center>



            <div class="box-header with-border" style="padding-left: 40px;  padding-top: 30px;">
              <center><h3 class="box-title" id="divTituloInf" style="text-decoration: underline;"></h3></center>
              <br>
              <div id="divalumno" style="float:left;"></div>
              <div id="divFecImpInf" style="float:right;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="divCuerpoInf" style="padding-left: 20px;padding-top: 20px;"> 
            {{--  @include('persona.verMasHabilitado')--}}
                
            </div>
          </div>



      </div>
      </div>
      <div class="modal-footer">
      <button id="imp" class="btn btn-success no-print" onclick="imprimirInforme();"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>

      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar</button>

      </div>
    </div>
  </div>
</div>





<div class="modal fade bs-example-modal-lg" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document" id="mdialTamanio">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="desEditarTitulo" style="font-weight: bold;text-decoration: underline;">EDITAR INFORME</h4>

      </div> 
      <div class="modal-body">
      <input type="hidden" id="txtIdInfE" value="0">

      <div class="row">

      <div class="box" id="o" style="border:0px; box-shadow:none;" >
            <div class="box-header with-border">
              <h3 class="box-title" id="boxTitulo">Informe: </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="FormularioEditar"> 
                {{-- -@include('persona.formulario') --}}
            </div>
          </div>



      </div>
      </div>
      <div class="modal-footer" >

        <div id="divCarga1" style="display: inline-block;"><div id="dcarga1" style="display: none;"><img src="{{ asset('/img/ajax-loader.gif')}}"/></div></div>

        <button type="button" class="btn btn-success" onclick="editInf();" id="btnEditInf"><i class="fa fa-save -o" aria-hidden="true" ></i> Editar Informe</button>

      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar</button>

      </div>
    </div>
  </div>
</div>














<div class="modal fade bs-example-modal-lg" id="modalImpEvaluacions" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document" id="mdialTamanio2">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="desEvalTitulo" style="font-weight: bold;text-decoration: underline;">EVALUACIÓN AL ALUMNO</h4>

      </div> 
      <div class="modal-body">



      <div class="row">

      <div class="box" id="divEval" style="border:0px; box-shadow:none;" >

        <center>
        <table>
                        <tbody>
                            <tr>
                                <td style="width: 3.2cm;text-align: center;padding-top: 20px;">
                                <img src="{{ asset('/img/unasam.png') }}" style="width: 72px;">
                                </td>

                                <td style="width: 11.5cm;;text-align: center;padding-top: 20px;">
                                    <p style="margin-bottom: 0px;font-size: 19px"><strong>UNIVERSIDAD NACIONAL</strong></p>
                                    <p style="margin-bottom: 0px;font-size: 19px"><strong>SANTIAGO ANTÚNEZ DE MAYOLO</strong></p>
                                    <hr style="margin-top: 5px;margin-bottom: 5px;" class="hrP">
                                    <p><FONT FACE="Monotype Corsiva" SIZE=5 COLOR="#EDB23B">Una Nueva Universidad para el Desarrollo</FONT></p>
                                </td>
                               <td style="width: 3.52cm; text-align: center;padding-top: 20px;">
                                
                                </td>                    
                            </tr>
                        </tbody>
                    </table>
                    </center>



            <div class="box-header with-border" style="padding-left: 40px;  padding-top: 30px;">
              <center><h3 class="box-title" id="divtituloEvalImp" style="text-decoration: underline;"></h3></center>
              <br>
              <div id="divalumnoEvalImp" style="float:left;"></div>
              <div id="divFecImp" style="float:right;"></div>
              <br>
              <div id="divEtapaImp" style="float:left;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="divCuerpoEvalImp" style="padding-left: 20px;padding-top: 20px;"> 
            {{--  @include('persona.verMasHabilitado')--}}
                
            </div>
          </div>



      </div>
      </div>
      <div class="modal-footer">
      <button id="imp" class="btn btn-success no-print" onclick="imprimirEval();"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>

      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar</button>

      </div>
    </div>
  </div>
</div>

@endif











@endsection
