@foreach($alumno  as $key => $dato)
<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <h3 class="box-title">Nueva Tarea para el Alumno:</h3>
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
                  <label for="cbsEvalDiag">Evaluación - Diagnóstico Requerido como base de la Tarea:</label>
                  <select class="form-control" id="cbsEvalDiag">
                    @include('adminlte::cbsEvalTarea')
                  </select>
                  
                </div>


                <div class="col-md-9" style="padding-left:0px;">
                <div class="form-group">
                  <label for="txtAsunto">Título de la Tarea:</label>
                  <input type="text" class="form-control" id="txtAsunto" name="txtAsunto" placeholder="Ingrese Título de la Tarea" onkeyup="EscribeLetras(event,this);">
                </div>
                </div>

                <div class="col-md-3" style="padding-right:0px;">
                 <div class="form-group">
                  <label for="txtfechEntrega">Fecha de Entrega:</label>
                  <input type="text" class="form-control" id="txtfechEntrega" name="txtfechEntrega" placeholder="dd/mm/aaaa" onKeypress="return noEscribe(event);">
                </div>
                  </div>
                

               <div class="form-group">
                  <label for="txtContenido">Descripción de la Tarea:</label>
                  <textarea id="txtContenido" name="txtContenido" class="form-control" rows="6"></textarea>

                  <script type="text/javascript">
                    $('#txtfechEntrega').datepicker({
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
                

                <button type="button" class="btn btn-primary" onclick="registrartarea();" id="btnSaveTarea"><i class="fa fa-home" aria-hidden="true" ></i> Registrar y Enviar Tarea</button>

                <button type="button" class="btn btn-default" onclick="limpiartarea();" id="btnLimTarea"> Limpiar</button>

                <div id="divCarga0" style="display: inline-block;"><div id="dcarga0" style="display: none;"><img src="{{ asset('/img/ajax-loader.gif')}}"/></div></div>
              </div>
           

          </div>
          </div>

          <div id="divEval02"></div>
@endforeach