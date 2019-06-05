        @foreach($sesion  as $key => $dato)
<div class="box box-danger" id="divEval01">
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;">CANCELAR {{$dato->nombresesion}}</h3></center>
              <button style="float: right;" type="button" class="btn btn-default" onclick="homeSesion();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

            <input type="hidden" name="txtidSesion" id="txtidSesion" value="{{$dato->idSesion}}">


            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

               
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

                @if(strval($dato->confirmado)=="0")

              

              @elseif(strval($dato->confirmado)=="1")
              
              <span class="label label-success" style="font-size: 100%">Participación Confirmada por el Alumno</span>

             
              @elseif(strval($dato->confirmado)=="2")
                          
                          <span class="label label-warning" style="font-size: 100%">Solicitud de Cancelación Enviada por el Alumno</span>

                  <br>
                 <br>

                 <strong> Justificación de la Solicitud del Alumno: </strong> {{$dato->descCalifAlumno}}
                         
              @endif


                <hr>
                 

                 <div class="form-group">
                  <label for="txtContenido" class="col-sm-2 control-label">Motivo de Cancelación</label>
                  <div class="col-sm-10"> 
                  <textarea id="txtContenidoC" name="txtContenidoC" class="form-control" rows="6"></textarea>
                   </div>
                </div>


                </div>
              <div class="box-footer" style="padding-top: 20px;">
                

                <button type="button" class="btn bg-navy-active color-palette" onclick="SaveParticipacion();" id="btnCancelSesion"><i class="fa fa-check-square-o" aria-hidden="true" ></i> Confirmar Cancelación</button>

                <button type="button" class="btn btn-default" onclick="limpiarCancelSesion();" id="btnLimCancelSesion"> Limpiar</button>

                <div id="divCarga2" style="display: inline-block;"><div id="dcarga0" style="display: none;"><img src="{{ asset('/img/ajax-loader.gif')}}"/></div></div>
              </div>

          
          </div>

          <div id="divEval02"></div>

          <script type="text/javascript">

                 

function limpiarSesion() {
  $("#txtContenido").val("");
  $("#txtContenido").focus();


}
                </script>
@endforeach