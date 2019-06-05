             <div class="col-md-12" id="divtablaEval">
             <div class="box">
          <div class="box-header">
            <h3 class="box-title" style="width: 100%;"><center><strong>RELACION DE SESIONES DEL ALUMNO:</strong></center>
              </h3>
          </div>
          <div class="box-body">

            <div style="font-size: 12px;"><strong style="text-decoration: underline;">Nota:</strong> Solo se podran editar y eliminar las sesiones que no hayan caducado.</div>
             <table class="table table-bordered table-hover" id="tabla1" style="font-size: 14px;">
                {{-- <caption>Relación de Alumnos</caption> --}}
                <thead>
                  <tr>
                    {{-- <th class="sorting_asc">id</th> --}}
                    <th width="5%">#</th>
                    <th>Título de la Sesión</th>
                    <th width="10%">Tipo</th>
                    <th width="10%">Etapa de la Tutoría</th>
                    <th width="10%">Evaluación Base</th>
                    <th width="10%">Diagnóstico Base</th>
                    <th width="10%">Estado</th>
                    <th width="7%">Fecha</th>
                    <th width="6%">Hora</th>
                    <th width="16%">Gestión</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTable">
                <?php
                $cont=1;
                ?>
                  @foreach($sesions as $dato)
                    <tr>
                      <td>{{$cont}}</td>
                      <td>{{$dato->nombresesion}}</td>
                      <td>
                        @if(strval($dato->tiposesion)=="1")
                        Presencial
                        @elseif(strval($dato->tiposesion)=="2")
                        Virtual Mediante la aplicación Chat en el Sistema
                        @endif
                      </td>
                      <td>{{$dato->etapa}}</td>
                      <td>{{$dato->deseval}}</td>
                      <td>{{$dato->nomdiag}}</td>

                      <td>
                        @if(strval($dato->estadosesion)=="1")

                            @if(strval($dato->sesionPasada)=="1")
                            <span class="label label-danger">Sesión Caducada</span> Debe Calificarla
                            @else

                              @if(strval($dato->confirmado)=="1")
                              <span class="label label-warning">Sesión Programada</span> Alumno Confirmó su Participación
                              @elseif(strval($dato->confirmado)=="2")
                              <span class="label label-danger">Sesión Programada</span> Alumno Solicitó la Cancelación
                              @else
                            <span class="label label-warning">Sesión Programada</span>
                            @endif
                            @endif
                        
                         @elseif(strval($dato->estadosesion)=="2")
                        <span class="label label-info">Sesión Realizada</span> Calificación Realizada
                        @elseif(strval($dato->estadosesion)=="3")
                        <span class="label label-primary">Sesión Cancelada</span> 
                        @elseif(strval($dato->estadosesion)=="0")
                        <span class="label label-success">Sesión No Realizada</span>
                        @endif

                      </td>

                      <td>{{pasFechaVista($dato->fechasesion)}}</td>
                      <td>{{$dato->horasesion}}</td>
                      
                      <td>
                        <center>
 
                          <button class="btn btn-info" onclick="verMasSesion('{{$dato->idSesion}}','{{$dato->nombresesion}}');" data-placement="top" data-toggle="tooltip" title="Ver Citación de Sesión"><i class="fa fa-eye" aria-hidden="true"></i></button>  

                          @if(strval($dato->estadosesion)=="1")
                            @if(strval($dato->sesionPasada)=="1")

                              <button class="btn btn-primary" type="button" onclick="califSesion('{{$dato->idSesion}}','{{$dato->nombresesion}}');" data-placement="top" data-toggle="tooltip" title="Calificar Sesión"><i class="fa fa-pencil-square-o"></i></button>
                            @else

                            @if(strval($dato->confirmado)=="0")
                          <button class="btn btn-warning" type="button" onclick="editarSesion('{{$dato->idSesion}}','{{$dato->nombresesion}}');" data-placement="top" data-toggle="tooltip" title="Editar Sesión"><i class="fa fa-cogs"></i></button>

                          <button class="btn btn-danger" type="button" onclick="eliminarSesion('{{$dato->idSesion}}','{{$dato->nombresesion}}');" data-placement="top" data-toggle="tooltip" title="Borrar Sesión"><i class="fa fa-trash"></i></button>

                          <button class="btn bg-navy-active color-palette" type="button" onclick="cancelarSesion('{{$dato->idSesion}}','{{$dato->nombresesion}}');" data-placement="top" data-toggle="tooltip" title="Cancelar Sesión"><i class="fa fa-calendar-times-o"></i></button>

                          @else
                            <button class="btn bg-navy-active color-palette" type="button" onclick="cancelarSesion('{{$dato->idSesion}}','{{$dato->nombresesion}}');" data-placement="top" data-toggle="tooltip" title="Cancelar Sesión"><i class="fa fa-calendar-times-o"></i></button>

                            @endif
                            @endif




                           @elseif(strval($dato->estadosesion)=="2")
 
                            <button class="btn btn-primary" type="button" onclick="califSesion('{{$dato->idSesion}}','{{$dato->nombresesion}}');" data-placement="top" data-toggle="tooltip" title="Editar Calificación de Sesión"><i class="fa fa-pencil-square-o"></i></button>
     
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
