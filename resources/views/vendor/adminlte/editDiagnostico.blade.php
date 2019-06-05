        @foreach($evaluacion  as $key => $dato)
<div class="box box-warning" id="divEval01">
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;">Modificar el  Diagnóstico del Alumno </h3></center>
              <button style="float: right;" type="button" class="btn btn-default" onclick="homeEvaluacion();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

            <input type="hidden" name="txtidEval" id="txtidEval" value="{{$dato->id}}">



            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

                <form>

                  <p>
                    Evaluación: <strong style="text-decoration: underline;">{{$dato->deseval}}</strong>
                  </p>

                  <p>
                    Alumno: <strong>{{$dato->nomalumno}} {{$dato->apealumno}}</strong>
                  </p>

                  <p>
                    Nota Promedio: <strong>{{number_format($notaProm, 2, ',', ' ')}}</strong>
                    @if($notaProm>4)
                      Nota Promedio Totalmente Adecuada
                    @elseif($notaProm>3)
                      Nota Promedio Regularmente Adecuada
                    @elseif($notaProm>2)
                      Nota Promedio Medianamente Adecuada
                    @elseif($notaProm>1)
                      Nota Promedio no Adecuada
                    @elseif($notaProm>=0)
                      Nota Promedio Totalmente Inadecuada
                    @endif
                   
                  </p>

                  <div class="form-group">
                <button type="button" class="btn btn-success" onclick="verPregs();" id="btnVerPregs"><i class="fa fa-eye" aria-hidden="true" ></i> Ver las Preguntas y Respuestas de la Evaluación</button>
                <input type="hidden" name="ctrolBtnPregs" id="ctrolBtnPregs" value="0">
                </div>


                <div style="display: none;" id="divContentPregs">
                  <hr>
                                  @php
                $cont=1;
                @endphp
                @foreach($preguntas  as $pregs)

                <br>
                 <br>
                <strong> Preguntas: </strong>
                <div class="form-group">
                  <label for="txtPregunta{{$pregs->idDetPreg}}">{{$cont}}.- {{$pregs->pregunta}}</label>

                  
                  <p id="resp{{$pregs->idDetPreg}}" style="text-align: justify;">
                     <label style="font-weight: bold;text-decoration: underline;">Respuesta:</label> {{$pregs->resultado}}
                  </p>

                  <div class="col-sm-1">
                   <label for="califResp{{$pregs->idresult}}">Calificación: </label></div> 
                <div class="col-sm-4">


                    @if($pregs->calif=="5")
                        (5) Respuesta totalmente adecuada / muy buena
                    @elseif($pregs->calif=="4")
                        (4) Respuesta regularmente adecuada / buena
                    @elseif($pregs->calif=="3")
                        (3) Respuesta  medianamente adecuada / regular
                    @elseif($pregs->calif=="2")
                        (2) Respuesta no adecuada / erronea
                    @elseif($pregs->calif=="1")
                        (1) Respuesta Indadecuada / totalmente erronea

                        @endif                  


                </div>
                <br>
                <br>
                </div>

                @php
                $cont++;
                @endphp
                
                @endforeach

                <hr>
                </div>




                 <div class="form-group">
                  <center><h4>Complete la Información del Diagnóstico</h4></center>
                                  <p style="text-align:justify;"><br>
                 <strong style="text-decoration: underline;"> Instrucciones:</strong> Podrá modificar el diagnóstico que haya realizado del alumno, solo en el caso de que a partir de este diagnóstico aún no se hayan generado sesiones o tareas para los alumnos, en ese caso, ya no se podrá realziar la modificación de la evaluación
                 
                
                </p>
                </div>

                @foreach($diagnostico as $diag)

                            <input type="hidden" name="txtidDiag" id="txtidDiag" value="{{$diag->id}}">
                 <div class="form-group">
                  <label for="txtAsuntoD">Título o Asunto:</label>
                  <input type="text" class="form-control" id="txtAsuntoD" name="txtAsuntoD" placeholder="Ingrese Asunto" onkeyup="EscribeLetras(event,this);" value="{{$diag->nomdiag}}">
                </div>
                <div class="form-group">
                  <label for="txtAlum">Alumno:</label>
                  <input type="email" class="form-control" id="txtAlum" name="txtAlum" placeholder="Ingrese Email" readonly="true" onkeypress="return noEscribe(event);" value="{{$dato->nomalumno}} {{$dato->apealumno}}"> 
                </div>

                <div class="form-group">
                  <label for="txtContenido">Descripción del Informe:</label>
                  <textarea id="txtContenido" name="txtContenido" class="form-control" rows="6">{{$diag->descripcion}}</textarea>

                  <script type="text/javascript">
                    CKEDITOR.replace( 'txtContenido' );
                  </script>
                </div>

                @endforeach


              <div class="box-footer">
                

                <button type="button" class="btn btn-primary" onclick="SaveEditDiagnost();" id="btnRegDiag"><i class="fa fa-save" aria-hidden="true" ></i> Modificar Diagnóstico</button>

                <button type="reset" class="btn btn-default" onclick="LimpiarDiagnost();" id="btnLimRespEval"> Limpiar</button>

                <div id="divCarga2" style="display: inline-block;"><div id="dcarga0" style="display: none;"><img src="{{ asset('/img/ajax-loader.gif')}}"/></div></div>
              </div>
           
</form>
          </div>
          </div>

          <div id="divEval02"></div>
@endforeach