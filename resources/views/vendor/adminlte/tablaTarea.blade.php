             <div class="col-md-12" id="divtablaEval">
             <div class="box">
          <div class="box-header">
            <h3 class="box-title" style="width: 100%;"><center><strong>RELACION DE TAREAS AL ALUMNO:</strong></center>
              </h3>
          </div>
          <div class="box-body">

            <div style="font-size: 12px;"><strong style="text-decoration: underline;">Nota:</strong> Solo se podran editar y eliminar las tareas que no hayan sido vistas o resueltas por los alumnos.</div>
             <table class="table table-bordered table-hover" id="tabla1" style="font-size: 14px;">
                {{-- <caption>Relación de Alumnos</caption> --}}
                <thead>
                  <tr>
                    {{-- <th class="sorting_asc">id</th> --}}
                    <th width="5%">#</th>
                    <th>Título de la Tarea</th>
                    <th width="13%">Etapa de la Tutoría</th>
                    <th width="13%">Evaluación Base</th>
                    <th width="13%">Diagnóstico Base</th>
                    <th width="13%">Estado</th>
                    <th width="10%">Fecha</th>
                    <th width="13%">Gestión</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTable">
                <?php
                $cont=1;
                ?>
                  @foreach($tareas as $dato)
                    <tr>
                      <td>{{$cont}}</td>
                      <td>{{$dato->nombreTar}}</td>
                      <td>{{$dato->etapa}}</td>
                      <td>{{$dato->deseval}}</td>
                      <td>{{$dato->nomdiag}}</td>

                      <td>
                        @if(strval($dato->tareaestado)=="1")
                        <span class="label label-warning">Tarea Enviada</span>
                         @elseif(strval($dato->tareaestado)=="2")
                        <span class="label label-info">Vista por el Alumno</span>
                        @elseif(strval($dato->tareaestado)=="3")
                        <span class="label label-primary">Resuelta por el Alumno</span>
                        @elseif(strval($dato->tareaestado)=="4")
                        <span class="label label-success">Tarea Calificada</span>
                        @endif

                      </td>

                      <td>{{pasFechaVista($dato->fechatarea)}}</td>
                      
                      <td>
                        <center>
 
                          <button class="btn btn-info" onclick="verMasTarea('{{$dato->idTarea}}','{{$dato->nombreTar}}');" data-placement="top" data-toggle="tooltip" title="Ver Tarea"><i class="fa fa-eye" aria-hidden="true"></i></button>  

                          @if(strval($dato->tareaestado)=="1")
                          <button class="btn btn-warning" type="button" onclick="editarTarea('{{$dato->idTarea}}','{{$dato->nombreTar}}');" data-placement="top" data-toggle="tooltip" title="Editar Tarea"><i class="fa fa-cogs"></i></button>

                          <button class="btn btn-danger" type="button" onclick="eliminarTarea('{{$dato->idTarea}}','{{$dato->nombreTar}}');" data-placement="top" data-toggle="tooltip" title="Borrar Tarea"><i class="fa fa-trash"></i></button>


                          @elseif(strval($dato->tareaestado)=="3")
                          <button class="btn btn-primary" type="button" onclick="califTarea('{{$dato->idTarea}}','{{$dato->nombreTar}}');" data-placement="top" data-toggle="tooltip" title="Calificar Tarea"><i class="fa fa-pencil-square-o"></i></button>

                           @elseif(strval($dato->tareaestado)=="4")
                            

                          <button class="btn btn-primary" type="button" onclick="califTarea('{{$dato->idTarea}}','{{$dato->nombreTar}}');" data-placement="top" data-toggle="tooltip" title="Editar Calificación"><i class="fa fa-pencil-square-o"></i></button>

       
                        @endif
                          
                        </center>

                      </td>
                   </tr>
                   <?php
                   $cont++;
                   ?>
                  @endforeach


                </tbody>
              </table>

               

          </div>

        </div>
</div>
