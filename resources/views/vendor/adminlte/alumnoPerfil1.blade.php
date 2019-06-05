          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#actividades" data-toggle="tab">Actividades Pendientes</a></li>
              <li><a href="#historicos" data-toggle="tab">Registro Histórico de Actividades</a></li>
           {{--     <li><a href="#otros" data-toggle="tab">Otras Funciones</a></li>--}}
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="actividades">
                <ul class="timeline timeline-inverse"> 

                  @php
                    $fecha="fec";
                    $aux="0";
                  @endphp

                  @foreach($evaluacion as $dato)



                  @if($dato->tipo=='evaluacion')

                  @if($dato->fechatomada!=$fecha)
                    <li class="time-label">
                        <span class="bg-blue">
                         {{pasFechaVista($dato->fechatomada)}}
                        </span>
                 
                    </li>
                    @php
                      $fecha=$dato->fechatomada;
                    @endphp
                  @endif

                    

                    <li>
                    <i class="fa fa-file-text bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> {{$dato->hora}}</span>

                      <h3 class="timeline-header"><a href="#">Su tutor le envió la siguiente evaluación</a> Proceda a Resolverla</h3>

                      <div class="timeline-body">
                        {{$dato->deseval}}
                      </div>
                      <div class="timeline-footer">
                        <button type="button" class="btn btn-primary btn-xs" onclick="revisarEval('{{$dato->id}}')">Revisar y Resolver el Cuestionario</button>
                 
                      </div>
                    </div>
                  </li>

                  @elseif($dato->tipo=='tarea')

                    @if($dato->fechatomada!=$fecha)
                    <li class="time-label">
                        <span class="bg-green">
                         {{pasFechaVista($dato->fechatomada)}}
                        </span>
                 
                    </li>
                    @php
                      $fecha=$dato->fechatomada;
                    @endphp
                  @endif


                  <li>
                    <i class="fa fa-home bg-green"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> {{$dato->hora}}</span>

                      <h3 class="timeline-header"><a href="#">Su tutor le envió la Siguiente Tarea</a> Proceda a Revisarla y atenderla</h3>

                      <div class="timeline-body">
                        {{$dato->deseval}}, Fecha máxima de entrega del desarrollo: {{pasFechaVista($dato->fechares)}}
                      </div>
                      <div class="timeline-footer">
                        <button type="button" class="btn btn-success btn-xs" onclick="revisarTarea('{{$dato->id}}')">Revisar y Atender la Tarea</button>
    
                      </div>
                    </div>
                  </li>

                  @elseif($dato->tipo=='sesion')
                    @if($dato->fechatomada!=$fecha)
                    <li class="time-label">
                        <span class="bg-aqua">
                         {{pasFechaVista($dato->fechatomada)}}
                        </span>
                 
                    </li>
                    @php
                      $fecha=$dato->fechatomada;
                    @endphp
                  @endif

                    <li>
                    <i class="fa fa-comments bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> {{$dato->hora}}</span>

                      <h3 class="timeline-header"><a href="#">Citación a Sesión de Trabajo</a> @if(strval($dato->estado)=="3") <span class="label label-danger" style="font-size: 100%">Sesión Cancelada</span> @else Atienda la Citación @endif</h3>

                      <div class="timeline-body">
                        Su tutor le cita a la sesión @if(strval($dato->tipoSesion)=="1") Presencial @elseif(strval($dato->tipoSesion)=="2") Virtual @endif: {{$dato->deseval}} el día {{pasFechaVista($dato->fechares)}} a horas {{$dato->horaEval}}.

                          @if(strval($dato->confirmado)=="1")
                          <br><br>
                          <span class="label label-success" style="font-size: 100%">Participación Confirmada</span>
                          @elseif(strval($dato->confirmado)=="2")
                          <br><br>
                          <span class="label label-warning" style="font-size: 100%">Solicitud de Cancelación Enviada</span>
                          @endif
                      </div>
                      <div class="timeline-footer">
                        @if(strval($dato->estado)=="3")
                        <button type="button" class="btn bg-navy-active color-palette btn-xs" onclick="revisarSesion('{{$dato->id}}')">Ver Detalles de la Sesión</button>
                        @else
                        <button type="button" class="btn btn-info btn-xs" onclick="revisarSesion('{{$dato->id}}')">Ver Detalles y Confirmar la Sesión</button>
                     @endif
                      </div>
                    </div>
                  </li>

                  @endif

                  @endforeach

                  {{-- 
                  

                  <li class="time-label">
                        <span class="bg-yellow">
                          25/03/2018
                        </span>
                  </li>

                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 23:50:00</span>

                      <h3 class="timeline-header"><a href="#">Su tutor le envió una Recomendación</a> Proceda a Revisarla</h3>

                      <div class="timeline-body">
                        En base a la Evaluación N° 02 Se le aconseja al alumno:
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-xs">Revisar la Recomendación</a>
            
                      </div>
                    </div>
                  </li>


               

                  --}}

                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>

                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="historicos">
                <!-- The timeline -->
                @include('adminlte::alumnoHistoricos')
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="otros">
                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
