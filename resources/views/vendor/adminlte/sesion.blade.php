@foreach($alumno  as $key => $dato)
<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <h3 class="box-title">Nueva Sesión con el Alumno:</h3>
              <button style="float: right;" type="button" class="btn btn-default" onclick="home();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

            <input type="hidden" name="txtidTA" id="txtidTA" value="{{$idTA}}">
            <input type="hidden" name="txtidA" id="txtidA" value="{{$idA}}">
            <input type="hidden" name="txtidP" id="txtidP" value="{{$idP}}">

            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">


                <div class="form-group">
                  <label for="txtAlum">Alumno:</label>
                  <input type="text" class="form-control" id="txtAlum" name="txtAlum" placeholder="Alumno" readonly="true" onkeypress="return noEscribe(event);" value="{{$dato->nombres}} {{$dato->apellidos}}"> 
                </div>


                <div class="form-group">
                  <label for="cbsEtapa">Etapa de la Tutoría:</label>
                  <select class="form-control" id="cbsEtapa" onchange="changeEta();">
                    @foreach($etapas as $etapa)
                      <option value="{{$etapa->id}}">{{$etapa->nometapa}}</option>
                    @endforeach
                  </select>
                  
                </div>

                <div class="form-group">
                  <label for="cbsEvalDiag">Evaluación - Diagnóstico Requerido como base para realizar la sesión:</label>
                  <select class="form-control" id="cbsEvalDiag">
                    @include('adminlte::cbsEvalTarea')
                  </select>
                  
                </div>




                <div class="col-md-9" style="padding-left:0px;">
                <div class="form-group">
                  <label for="txtAsunto">Título de la Convocatoria de la Sesión:</label>
                  <input type="text" class="form-control" id="txtAsunto" name="txtAsunto" placeholder="Ingrese Título de la Tarea" onkeyup="EscribeLetras(event,this);">
                </div>
                </div>

                <div class="col-md-3" style="padding-right:0px;">
                 <div class="form-group">
                  <label for="txtFechaSesion">Fecha de Sesión:</label>
                  <input type="text" class="form-control" id="txtFechaSesion" name="txtFechaSesion" placeholder="dd/mm/aaaa" onKeypress="return noEscribe(event);">
                </div>
                  </div>

                  <div class="col-md-9" style="padding-left:0px;">
                <div class="form-group">
                  <label for="cbsTipoSesion">Tipo de Sesión:</label>
                  <select class="form-control" id="cbsTipoSesion">
                      <option value="1">Presencial (Física) Indicar el lugar en la sección de Detalles de la Sesión</option>
                      <option value="2">Virtual Mediante la aplicación Chat en el Sistema</option>
                   
                  </select>
                  
                </div>
                </div>

                <div class="col-md-3" style="padding-right:0px;">
                 <div class="form-group">
                  <label for="txthoraSesion">Hora de Sesión:</label>
                  <input type="time" class="form-control" id="txthoraSesion" name="txthoraSesion" placeholder="hh:mm" onkeyup="soloNumeros(event,this);">
                </div>
                  </div>
                

               <div class="form-group">
                  <label for="txtContenido">Detalles de la Sesión:</label>
                  <textarea id="txtContenido" name="txtContenido" class="form-control" rows="6"></textarea>

                  <script type="text/javascript">
                    $('#txtFechaSesion').datepicker({
                      autoclose: true,
                      language: 'es',
                      format: 'dd/mm/yyyy',
                      todayHighlight: true
                          });
                    CKEDITOR.replace( 'txtContenido' );
                  </script>
                </div>

 {{--  
                <div class="form-group">
                  <label for="fileAdjunto">Archivo Adjunto (Opcional)</label>
                  <input type="file" id="fileAdjunto" name="fileAdjunto">
                </div>

              </div>--}}
              <!-- /.box-body -->

              <div class="box-footer">
                

                <button type="button" class="btn btn-primary" onclick="registrarSesion();" id="btnSaveSesion"><i class="fa fa-calendar-plus-o" aria-hidden="true" ></i> Registrar y Enviar Comunicado de Sesión</button>

                <button type="button" class="btn btn-default" onclick="limpiarSesion();" id="btnLimSesion"> Limpiar</button>

                <div id="divCarga0" style="display: inline-block;"><div id="dcarga0" style="display: none;"><img src="{{ asset('/img/ajax-loader.gif')}}"/></div></div>
              </div>
           

          </div>
          </div>

          <div id="divEval02"></div>
@endforeach