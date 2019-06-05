<table class="table table-bordered table-hover" id="tabla1" style="font-size: 14px;">
                {{-- <caption>Relación de Alumnos</caption> --}}
                <thead>
                  <tr>
                    {{-- <th class="sorting_asc">id</th> --}}
                    <th width="10%">#</th>
                    <th>Actividad</th>
                    <th width="20%">Fecha</th>
                    <th width="20%">Estado</th>
                    <th width="15%">Detalles</th>
                  </tr>
                </thead>
                <tbody id="cuerpoHistorico">
                <?php
                $cont=1;
                ?>

                @php
                    $fecha="fec";
                    $aux="0";
                  @endphp

                  @foreach($evaluacionRes as $dato)
                  
                  <tr>
                      <td>{{$cont}}</td>
                      <td>{{$dato->deseval}}</td>
                      <td>{{pasFechaVista($dato->fechatomada)}}</td>
                      <td>
                        @if($dato->tipo=='evaluacion')
                             @if(strval($dato->estado)=="1")
                              <span class="label label-warning">Evaluación Recibida</span> Alumno no ha visto las preguntas
                               @elseif(strval($dato->estado)=="2")
                              <span class="label label-info">Vista por el Alumno</span> Alumno no ha respondido la Evaluación
                              @elseif(strval($dato->estado)=="3")
                              <span class="label label-primary">Resuelta</span> Aun no calificada por el Tutor
                              @elseif(strval($dato->estado)=="4")
                              <span class="label label-success">Calificada</span>
                              @elseif(strval($dato->estado)=="5")
                              <span class="label bg-navy color-palette">Calificada</span>
                              @endif

                        @elseif($dato->tipo=='tarea')
                              @if(strval($dato->estado)=="1")
                            <span class="label label-warning">Tarea Recibida</span> Alumno no ha visto la tarea
                             @elseif(strval($dato->estado)=="2")
                            <span class="label label-info">Vista por el Alumno</span> Alumno no ha desarrollado la tarea 
                            @elseif(strval($dato->estado)=="3")
                            <span class="label label-primary">Resuelta</span> Aun no calificada por el Tutor
                            @elseif(strval($dato->estado)=="4")
                            <span class="label label-success">Calificada</span>
                            @endif

                        @elseif($dato->tipo=='sesion')
                          @if(strval($dato->estado)=="1")

                                @if(strval($dato->sesionPasada)=="1")
                                <span class="label label-danger">A espera de Calificación</span> Sesión Pasada
                                @else

                                  @if(strval($dato->confirmado)=="1")
                                  <span class="label label-warning">Sesión Programada</span> Alumno Confirmó su Participación
                                  @elseif(strval($dato->confirmado)=="2")
                                  <span class="label label-danger">Sesión Programada</span> Alumno Solicitó la Cancelación
                                  @else
                                <span class="label label-warning">Sesión Programada</span>
                                @endif
                                @endif
                            
                             @elseif(strval($dato->estado)=="2")
                            <span class="label label-info">Sesión Realizada</span> Calificación Realizada
                            @elseif(strval($dato->estado)=="3")
                            <span class="label label-primary">Sesión Cancelada</span> Por el Tuttor
                            @elseif(strval($dato->estado)=="0")
                            <span class="label label-success">Sesión No Realizada</span>
                            @endif

                        @endif

                      </td>
                      <td>
                        <center>
                        @if($dato->tipo=='evaluacion')
                          <button class="btn btn-info" onclick="verMasEvaluacion('{{$dato->id}}','{{$dato->deseval}}');" data-placement="top" data-toggle="tooltip" title="Ver detalles de la Evaluación"><i class="fa fa-eye" aria-hidden="true"></i></button>  
                        @elseif($dato->tipo=='tarea')  
                          <button class="btn btn-info" onclick="verMasTarea('{{$dato->id}}','{{$dato->deseval}}');" data-placement="top" data-toggle="tooltip" title="Ver detalles de la Tarea"><i class="fa fa-eye" aria-hidden="true"></i></button>  
                        @elseif($dato->tipo=='sesion')
                          <button class="btn btn-info" onclick="verMasSesion('{{$dato->id}}','{{$dato->deseval}}');" data-placement="top" data-toggle="tooltip" title="Ver detalles de la Sesion"><i class="fa fa-eye" aria-hidden="true"></i></button>  
                        @endif

                        </center>

                      </td>
                   </tr>
                   @php
                  $aux="1";
                  $cont++;
                  @endphp

                  @endforeach

                  @if($aux=="0")
                  <tr>
              
                      <td colspan="4">Aun no se han registrado Actividades Históricas Para el Alumno</td>

                   </tr>
                  @endif
                


                </tbody>
              </table>