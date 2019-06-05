        @foreach($tarea  as $key => $dato)
<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;">Detalles de la Tarea</h3></center>
                            <button style="float: right;" type="button" class="btn btn-default" onclick="homePerfil1Alumno();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>

          <button style="float: right; margin-right: 10px;" type="button" class="btn btn-success" onclick="impTarea();"><i class="fa fa-print" aria-hidden="true"></i> 
          Imprimir</button>
            </div>

             <input type="hidden" name="txtidTarea" id="txtidTarea" value="{{$dato->idTarea}}">


            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body" id="divImpTarea">

                <center><h4>{{$dato->nombreTar}}</h4></center>

                <form>
                  <p style="text-align:justify;">
                
                <strong> Alumno: </strong> {{$dato->nomalumno}} {{$dato->apealumno}}

                 <br>
                 <br>

                <strong> Etapa de la Tutoría: </strong> {{$dato->etapa}}

                 <br>
                 <br>

                 <strong> Evaluación Base de la Tarea: </strong> {{$dato->deseval}}

                 <br>
                 <br>

                 <strong> Diagnóstico Base de la Tarea: </strong> {{$dato->nomdiag}}

                 <br>
                 <br>

                 <strong> Descripción de la Tarea: </strong>
                </p>

                @php
                $cont=1;
                @endphp


                <div class="form-group">
                  @php
                    echo $dato->desctarea;
                  @endphp

                </div>

                <hr>

                <center><strong> Desarrollo de la Tarea: </strong></center>
                 <br>
                  <strong> Fecha de Desarrollo: </strong> {{pasFechaVista($dato->fecharesuelta)}}

                 <br>
      
                <br>
                @if(strlen(strval($dato->rutaresp))>0)
                <div class="form-group">
                  @php
                  $ruta="/tarea/".$dato->rutaresp; 
                  @endphp
                  <a href="{{asset($ruta)}}" download="Desarrollo de la Tarea">
                    
                    Descargar Contenido Adjunto
                  </a>
                </div>
                @endif

                @if(strlen(strval($dato->respuestas))>0)
                <div class="form-group">
                  <strong>Contenido del Desarrollo:</strong>
                  @php
                    echo $dato->respuestas;
                  @endphp
                @endif
                </div>

                <hr>
                <center><strong> Calificación del Desarrollo de la Tarea: </strong></center>
                <br>

                <div class="form-group col-md-12" style="padding-left: 0px;">

                    @if(strlen(strval($dato->califTarea))=="0")
                        No Calificada
                    @elseif(strval($dato->califTarea)=="5")
                    <option value="0">Seleccione...</option>
                        Desarrollo totalmente adecuado / muy bueno
                    @elseif(strval($dato->califTarea)=="4")
                    <option value="0">Seleccione...</option>
                        Desarrollo regularmente adecuadao / bueno
                    @elseif(strval($dato->califTarea)=="3")
                      Desarrollo  medianamente adecuado / regular
                    @elseif(strval($dato->califTarea)=="2")
                      Desarrollo no adecuado / erroneo
                    @elseif(strval($dato->califTarea)=="1")
                      Desarrollo Indadecuado / totalmente erroneo
                    @endif
                </div>

                <br>

              
                 <div class="form-group">
                  <label for="txtContenido">Sustento de la Calificación:</label>
                  <p>{{$dato->descCalif}}</p>

                </div>


           
</form>
          </div>
          </div>

          <div id="divEval02"></div>
@endforeach