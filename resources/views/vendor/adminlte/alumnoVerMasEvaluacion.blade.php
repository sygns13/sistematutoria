        @foreach($evaluacion  as $key => $dato)
<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;">Detalles de la Evaluación</h3></center>
                            <button style="float: right;" type="button" class="btn btn-default" onclick="homePerfil1Alumno();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>

          <button style="float: right; margin-right: 10px;" type="button" class="btn btn-success" onclick="impEvaluacion();"><i class="fa fa-print" aria-hidden="true"></i> 
          Imprimir</button>
            </div>

            <input type="hidden" name="txtidEval" id="txtidEval" value="{{$dato->id}}">


            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body" id="divEvaluacion">
                 <center><h4>{{$dato->deseval}}</h4></center>

                <form>
                <p style="text-align:justify;">
                 <strong> Alumno: </strong> {{$dato->nomalumno}} {{$dato->apealumno}}

 

                 <p>
                  <strong>  Nota Promedio: {{number_format($notaProm, 2, ',', ' ')}}</strong>
                    @if($notaProm>4)
                      Nota Promedio Totalmente Adecuada
                    @elseif($notaProm>3)
                      Nota Promedio Regularmente Adecuada
                    @elseif($notaProm>2)
                      Nota Promedio Medianamente Adecuada
                    @elseif($notaProm>1)
                      Nota Promedio no Adecuada
                    @elseif($notaProm>0)
                      Nota Promedio Totalmente Inadecuada
                      @else
                      Evaluación no Calificada
                    @endif
                   
                  </p>
                <strong> Preguntas: </strong>
                </p>

                @php
                $cont=1;
                @endphp

                @foreach($preguntas  as $pregs)


                <div class="form-group col-sm-12">
                  <label for="txtPregunta{{$pregs->idDetPreg}}">{{$cont}}.- {{$pregs->pregunta}}</label>

                  
                  <p id="resp{{$pregs->idDetPreg}}" style="text-align: justify;">
                     <label style="font-weight: bold;text-decoration: underline;">Respuesta:</label> {{$pregs->resultado}}
                  </p>

                  <div class="col-sm-2">
                   <label for="califResp{{$pregs->idresult}}">Calificación: </label></div> 
                <div class="col-sm-10">
                    @if($pregs->calif=="0")
                        No calificada
                    @elseif($pregs->calif=="5")
                        Respuesta totalmente adecuada / muy buena
                    @elseif($pregs->calif=="4")
                        Respuesta regularmente adecuada / buena
                    @elseif($pregs->calif=="3")
                        Respuesta  medianamente adecuada / regular
                    @elseif($pregs->calif=="2")
                        Respuesta no adecuada / erronea
                    @elseif($pregs->calif=="1")
                        Respuesta Indadecuada / totalmente erronea

                        @endif                  

                </div>
        

                </div>

                @php
                $cont++;
                @endphp
                
                @endforeach



           
</form>
          </div>
          </div>

          <div id="divEval02"></div>
@endforeach