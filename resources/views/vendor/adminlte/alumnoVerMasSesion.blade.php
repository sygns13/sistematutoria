        @foreach($sesion  as $key => $dato)
<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;">Detalles de la Sesión</h3></center>
              <button style="float: right;" type="button" class="btn btn-default" onclick="homePerfil1Alumno();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>

          <button style="float: right; margin-right: 10px;" type="button" class="btn btn-success" onclick="impSeSion();"><i class="fa fa-print" aria-hidden="true"></i> 
          Imprimir</button>
            </div>

            <input type="hidden" name="txtidSesion" id="txtidSesion" value="{{$dato->idSesion}}">


            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body" id="divImpSesion">

                <center><h4>{{$dato->nombresesion}}</h4></center>
               
                <p style="text-align:justify;">
                
                <strong> Alumno: </strong> {{$dato->nomalumno}} {{$dato->apealumno}}

                 <br>
                 <br>

                <strong> Fecha de Sesión: </strong> {{pasFechaVista($dato->fechasesion)}}

                 <br>
                 <br>

                 <strong> Hora de Sesión: </strong> {{$dato->horasesion}}

                 <br>
                 <br>

                 <strong> Tipo de Sesión: </strong> @if(strval($dato->tiposesion)=="1") Presencial @elseif(strval($dato->tiposesion)=="2") Virtual @endif:

                 <br>
                 <br>

                 <strong> Descripción de la Sesión: </strong><br>

                </p>


                <div class="form-group">
                  @php
                    echo $dato->detallesSesion;
                  @endphp

                </div>

     
 
                <hr>
                @php
                //var_dump(strval($dato->estadosesion));
                @endphp

            @if(strval($dato->estadosesion)=="1")
                @if(strval($dato->confirmado)=="0")

    

              @elseif(strval($dato->confirmado)=="1")
              
              <hr>
              <span class="label label-success" style="font-size: 100%">Participación Confirmada por el Alumno</span>

              @elseif(strval($dato->confirmado)=="2")
                          
               <hr>   
                          <span class="label label-warning" style="font-size: 100%">Solicitud de Cancelación Enviada por el Alumno</span>

                  <br>
                 <br>

                 <strong> Justificación de la Solicitud del Alumno: </strong> {{$dato->descCalifAlumno}}

                  @php
                    echo $dato->descCalifAlumno;
                  @endphp

             


                         
              @endif

               
          @elseif(strval($dato->estadosesion)=="3")

           @if(strval($dato->confirmado)=="0")
            @elseif(strval($dato->confirmado)=="1")
            <hr>
             <span class="label label-success" style="font-size: 100%">Participación Confirmada por el Alumno</span>

            @elseif(strval($dato->confirmado)=="2")

            <hr>  
            
              <span class="label label-warning" style="font-size: 100%">Solicitud de Cancelación Enviada</span>
              <br>
              <br>
               <div class="form-group">
                <p><strong> Justificación del Alumno por la Solicitud: </strong>

                </p>
                </div>
                <div class="form-group">
                  @php
                    echo $dato->descCalifAlumno;
                  @endphp

                </div>


            @endif

            <hr>
            <div class="form-group">
              <span class="label label-danger" style="font-size: 100%">Sesión Cancelada por el Tutor</span>
              </div>
            <div class="form-group">
                <p> <strong style="text-decoration: underline;">Motivo:</strong> @php
                    echo $dato->resultSesion;
                  @endphp
                  </p>
                </div>

         



          @elseif(strval($dato->estadosesion)=="2")

            @if(strval($dato->confirmado)=="0")
            @elseif(strval($dato->confirmado)=="1")
            <hr>
             <span class="label label-success" style="font-size: 100%">Participación Confirmada por el Alumno</span>

            @elseif(strval($dato->confirmado)=="2")

            <hr>  

              <span class="label label-warning" style="font-size: 100%">Solicitud de Cancelación Enviada</span>
              <br>
              <br>
               <div class="form-group">
                <p><strong> Justificación del Alumno por la Solicitud: </strong>

                </p>
                </div>
                <div class="form-group">
                  @php
                    echo $dato->descCalifAlumno;
                  @endphp

                </div>


            @endif

            <hr>
            <div class="form-group">
              <span class="label label-success" style="font-size: 100%">Sesión Calificada por el Tutor</span>
              </div>

               <div class="form-group">
                <p> <strong style="text-decoration: underline;">Calificación del Desarro de la Sesión:</strong> 

                  @if(strval($dato->califTutor)=="0")
                        No calificada
                    @elseif(strval($dato->califTutor)=="5")
                    Desarrollo totalmente adecuado / muy bueno
                    @elseif(strval($dato->califTutor)=="4")
                    Desarrollo regularmente adecuadao / bueno
                    @elseif(strval($dato->califTutor)=="3")
                    Desarrollo  medianamente adecuado / regular
                    @elseif(strval($dato->califTutor)=="2")
                    Desarrollo no adecuado / erroneo
                    @elseif(strval($dato->califTutor)=="1")
                    Desarrollo Indadecuado / totalmente erroneo
                    @endif


                  </p>
                </div>


            <div class="form-group">
                <p> <strong style="text-decoration: underline;">Sustento de la Calificación:</strong> @php
                    echo $dato->resultSesion;
                  @endphp
                  </p>
                </div>

            
          @endif

          </div>
          </div>
          
     

          <div id="divEval02"></div>


@endforeach