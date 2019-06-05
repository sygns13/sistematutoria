@foreach($sesion  as $key => $dato)
<div class="box box-warning" >
            <div class="box-header with-border">
              <h3 class="box-title" style="text-decoration: underline;" id="tituloEval">Modificar la Sesión para el Alumno:</h3>
              <button style="float: right;" type="button" class="btn btn-default" onclick="homeSesion();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

            <input type="hidden" name="txtidSesion" id="txtidSesion" value="{{$dato->idSesion}}">
            <input type="hidden" name="txtidEta" id="txtidEta" value="{{$dato->ideta}}">
            <input type="hidden" name="txtidDiag" id="txtidDiag" value="{{$dato->idDiag}}">

            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

                <form>
                <div class="form-group">
                  <label for="txtAlumE">Alumno:</label>
                  <input type="text" class="form-control" id="txtAlumE" name="txtAlumE" placeholder="Alumno" readonly="true" onkeypress="return noEscribe(event);" value="{{$dato->nomalumno}} {{$dato->apealumno}}"> 
                </div>


                <div class="form-group">
                  <label for="cbsEtapaE">Etapa de la Tutoría:</label>
                  <select class="form-control" id="cbsEtapaE" onchange="changeEta2();">
                    @foreach($etapas as $etapa)
                      @if($dato->ideta==$etapa->id)
                        <option value="{{$etapa->id}}" selected>{{$etapa->nometapa}}</option>
                      @else
                        <option value="{{$etapa->id}}">{{$etapa->nometapa}}</option>
                      @endif
                      
                    @endforeach
                  </select>
                  
                </div>

                <div class="form-group">
                  <label for="cbsEvalDiagE">Evaluación - Diagnóstico Requerido como base de la Tarea:</label>
                  <select class="form-control" id="cbsEvalDiagE">
                    @foreach($evaluacions as $eval)
                    @if($dato->idDiag==$eval->idDiag)
                      <option value="{{$eval->idDiag}}" selected>{{$eval->deseval}}  -  {{$eval->nomdiag}}</option>
                    @else
                      <option value="{{$eval->idDiag}}">{{$eval->deseval}}  -  {{$eval->nomdiag}}</option>
                    @endif
                      
                    @endforeach
                  </select>
                  
                </div>



                <div class="col-md-9" style="padding-left:0px;">
                <div class="form-group">
                  <label for="txtAsuntoE">Título de la Convocatoria de la Sesión:</label>
                  <input type="text" class="form-control" id="txtAsuntoE" name="txtAsuntoE" placeholder="Ingrese Título de la Tarea" onkeyup="EscribeLetras(event,this);" value="{{$dato->nombresesion}}">
                </div>
                </div>

                <div class="col-md-3" style="padding-right:0px;">
                 <div class="form-group">
                  <label for="txtFechaSesionE">Fecha de Sesión:</label>
                  <input type="text" class="form-control" id="txtFechaSesionE" name="txtFechaSesionE" placeholder="dd/mm/aaaa" onKeypress="return noEscribe(event);" value="{{pasFechaVista($dato->fechasesion)}}">
                </div>
                  </div>

                  <div class="col-md-9" style="padding-left:0px;">
                <div class="form-group">
                  <label for="cbsTipoSesionE">Tipo de Sesión:</label>
                  <select class="form-control" id="cbsTipoSesionE">
                    @if(strval($dato->tiposesion)=="1")
                      <option value="1" selected>Presencial (Física) Indicar el lugar en la sección de Detalles de la Sesión</option>
                      <option value="2">Virtual Mediante la aplicación Chat en el Sistema</option>
                    @elseif(strval($dato->tiposesion)=="2")
                      <option value="1">Presencial (Física) Indicar el lugar en la sección de Detalles de la Sesión</option>
                      <option value="2" selected>Virtual Mediante la aplicación Chat en el Sistema</option>
                    @endif

                   
                  </select>
                  
                </div>
                </div>

                <div class="col-md-3" style="padding-right:0px;">
                 <div class="form-group">
                  <label for="txthoraSesionE">Hora de Sesión:</label>
                  <input type="time" class="form-control" id="txthoraSesionE" name="txthoraSesionE" placeholder="hh:mm" onkeyup="soloNumeros(event,this);" value="{{$dato->horasesion}}">
                </div>
                  </div>
                

               <div class="form-group">
                  <label for="txtContenidoE">Detalles de la Sesión:</label>
                  <textarea id="txtContenidoE" name="txtContenidoE" class="form-control" rows="6">{{$dato->detallesSesion}}</textarea>

                  <script type="text/javascript">
                    $('#txtFechaSesionE').datepicker({
                      autoclose: true,
                      language: 'es',
                      format: 'dd/mm/yyyy',
                      todayHighlight: true
                          });
                    CKEDITOR.replace( 'txtContenidoE' );
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
                

                <button type="button" class="btn btn-primary" onclick="registrarSesionEdit();" id="btnEditSesion"><i class="fa fa-edit" aria-hidden="true" ></i> Modificar el Comunicado de Sesión</button>

                <button type="reset" class="btn btn-default" onclick="limpiarSesionEdit();" id="btnLimSesionEdit"> Limpiar</button>

                <div id="divCarga2" style="display: inline-block;"><div id="dcarga2" style="display: none;"><img src="{{ asset('/img/ajax-loader.gif')}}"/></div></div>
              </div>
           
              </form>
          </div>
          </div>

         
@endforeach