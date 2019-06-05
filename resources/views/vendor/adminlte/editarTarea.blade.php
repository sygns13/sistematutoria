@foreach($tarea  as $key => $dato)
<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title" style="text-decoration: underline;" id="tituloEval">Modificar la Tarea para el Alumno:</h3>
              <button style="float: right;" type="button" class="btn btn-default" onclick="homeTarea();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

            <input type="hidden" name="txtidTarea" id="txtidTarea" value="{{$dato->idTarea}}">
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
                  <label for="txtAsuntoE">Título de la Tarea:</label>
                  <input type="text" class="form-control" id="txtAsuntoE" name="txtAsuntoE" placeholder="Ingrese Título de la Tarea" onkeyup="EscribeLetras(event,this);" value="{{$dato->nombreTar}}">
                </div>
                </div>

                <div class="col-md-3" style="padding-right:0px;">
                 <div class="form-group">
                  <label for="txtfechEntregaE">Fecha de Entrega:</label>
                  <input type="text" class="form-control" id="txtfechEntregaE" name="txtfechEntregaE" placeholder="dd/mm/aaaa" onKeypress="return noEscribe(event);" value="{{pasFechaVista($dato->fechatarea)}}">
                </div>
                  </div>
                

               <div class="form-group">
                  <label for="txtContenidoE">Descripción de la Tarea:</label>
                  <textarea id="txtContenidoE" name="txtContenidoE" class="form-control" rows="6">{{$dato->desctarea}}</textarea>

                  <script type="text/javascript">
                    $('#txtfechEntregaE').datepicker({
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
                

                <button type="button" class="btn btn-success" onclick="editarTareaSave();" id="btnEditTarea"><i class="fa fa-edit" aria-hidden="true" ></i> Modificar Tarea</button>

                <button type="reset" class="btn btn-default" onclick="limpiarEditTarea();" id="btnLimEditTarea"> Limpiar</button>

                <div id="divCarga2" style="display: inline-block;"><div id="dcarga2" style="display: none;"><img src="{{ asset('/img/ajax-loader.gif')}}"/></div></div>
              </div>
           
              </form>
          </div>
          </div>


@endforeach
