<div class="box">
        <div class="box-header">
          <h3 class="box-title"><i class="fa fa-users"></i> Gestión de Asignación de Tutores</h3>
          <a href="{{ URL::to('tutores') }}" style="float: right;"><button type="button" class="btn btn-default"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button></a>
        </div>
        <div class="box-body">
        
       <div class="form-group">
        <div class="col-sm-12">

          @foreach($semestre as $dato)
          <div class="form-group">
            <label for="cbutipodoc" class="col-sm-3 control-label">SEMESTRE ACADÉMICO:</label>
           <div class="col-sm-9">
           <span class="label label-primary" style="font-size: 100%;">{{$dato->nomsem}}</span>

          </div>
          </div>
          @endforeach

   </div><br>
   </div>

@foreach($tutor as $dato)
   <div class="form-group">

    <label for="cbutipodoc" class="col-sm-6 control-label">DOCENTE:</label>
    <label for="cbutipodoc" class="col-sm-2 control-label">DNI:</label>
    <label for="cbutipodoc" class="col-sm-4 control-label">ESPECIALIDAD:</label>

     <div class="col-sm-6">
       <input type="text" class="form-control" id="txtdoc" placeholder="Nombres" onKeyPress="return noEscribe(event);" readonly="true" value="{{$dato->apellidos}}, {{$dato->nombres}}">
     </div>
     <div class="col-sm-2">
       <input type="text" class="form-control" id="txtdni" placeholder="DNI" onKeyPress="return noEscribe(event);" readonly="true" value="{{$dato->dni}}">
     </div>

     <div class="col-sm-4">
       <input type="text" class="form-control" id="txtesp" placeholder="DNI" onKeyPress="return noEscribe(event);" readonly="true" value="{{$dato->esptutor}}">
     </div>
   </div>

   <div class="form-group" style="padding-bottom: 130px;">

    <label for="cbutipodoc" class="col-sm-4 control-label">CORREO:</label>
    <label for="cbutipodoc" class="col-sm-2 control-label">TELÉFONO:</label>
    <label for="cbutipodoc" class="col-sm-6 control-label">DIRECCIÓN:</label>

     <div class="col-sm-4">
       <input type="text" class="form-control" id="txtmail" placeholder="Nombres" onKeyPress="return noEscribe(event);" readonly="true" value="{{$dato->email}}">
     </div>
     <div class="col-sm-2">
       <input type="text" class="form-control" id="txttelf" placeholder="DNI" onKeyPress="return noEscribe(event);" readonly="true" value="{{$dato->telf}}">
     </div>

     <div class="col-sm-6">
       <input type="text" class="form-control" id="txtdir" placeholder="DNI" onKeyPress="return noEscribe(event);" readonly="true" value="{{$dato->direccion}}">
     </div>
   </div>
   <input type="hidden" name="idP" id="idP" value="{{$dato->idper}}">
   <input type="hidden" name="idT" id="idT" value="{{$dato->idtutor}}">
   <input type="hidden" name="idU" id="idU" value="{{$dato->idusu}}">

   
@endforeach
      
     <table class="table table-bordered table-hover" style="font-size: 14px;">
                <caption>Relación de Alumnos Tutoreados por el Docente</caption>
                <thead>
                  <tr>
                    {{-- <th class="sorting_asc">id</th> --}}
                    <th width="5%">#</th>
                    <th width="8%">Código</th>
                    <th width="20%">Nombres</th>
                    <th width="20%">Apellidos</th>
                    <th width="5%">Ciclo</th>
                    <th width="7%">Teléfono</th>
                    <th width="20%">Correo</th>
                   {{--  <th width="9%">Imagen</th>--}}
                    <th width="15%">Gestión</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTable">
                <?php
                $cont=1;
                ?>
                  @foreach($alumnosTut as $dato)
                    <tr>
                      <td>{{$cont}}</td>
                      <td>{{$dato->codigo}}</td>
                      <td>{{$dato->nombres}}</td>
                      <td>{{$dato->apellidos}}</td>
                      <td>{{$dato->semestre}}</td>
                      <td>{{$dato->telf}}</td>
                      <td>{{$dato->correo}}</td>

                      <td>
                        <center>
                          <button class="btn btn-danger" type="button" onclick="quitarAlum({{$dato->idper}},{{$dato->idalum}},{{$dato->idusu}},{{$dato->idTA}});" data-placement="top" data-toggle="tooltip" title="Quitar asignación del Alumno"><i class="fa fa-user-times"></i></button>
                        </center>

                      </td>
                   </tr>
                   <?php
                   $cont++;
                   ?>
                  @endforeach

                  @if($cont==1)
                  <tr>
                    <td colspan="8">Para el presente semestre, el docente aun no tiene alumnos asignados para el proceso de tutoría</td>
                  </tr>

                  @endif


                </tbody>
              </table>

        </div>

        <!-- /.box-body -->
      </div>
