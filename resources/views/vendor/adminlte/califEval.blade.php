        @foreach($evaluacion  as $key => $dato)
<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;">{{$dato->deseval}}</h3></center>
              <button style="float: right;" type="button" class="btn btn-default" onclick="homeEvaluacion();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

            <input type="hidden" name="txtidEval" id="txtidEval" value="{{$dato->id}}">


            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

                <form>
                <p style="text-align:justify;">
                 <strong style="text-decoration: underline;"> Instrucciones:</strong> Lea las respuestas de los alumnos por cada pregunta, e ingrese la calificación que a su criterio merece la respuesta, eligiendo por cada respuesta entre 05 valores posibles: <br><br> (5) Respuesta totalmente adecuada / muy buena, (4) Respuesta regularmente adecuada / buena, (3) Respuesta  medianamente adecuada / regular, (2) Respuesta no adecuada / erronea, (1) Respuesta Indadecuada / totalmente erronea.
                 <br>
                 <br>
                <strong> Preguntas: </strong>
                </p>

                @php
                $cont=1;
                @endphp

                @foreach($preguntas  as $pregs)


                <div class="form-group">
                  <label for="txtPregunta{{$pregs->idDetPreg}}">{{$cont}}.- {{$pregs->pregunta}}</label>

                  
                  <p id="resp{{$pregs->idDetPreg}}" style="text-align: justify;">
                     <label style="font-weight: bold;text-decoration: underline;">Respuesta:</label> {{$pregs->resultado}}
                  </p>

                  <div class="col-sm-1">
                   <label for="califResp{{$pregs->idresult}}">Calificación: </label></div> 
                <div class="col-sm-4">
                   <select class="cbsResp form-control" id="califResp{{$pregs->idresult}}">
                    @if($pregs->calif=="0")
                        <option value="0" selected>Seleccione...</option>
                        <option value="5">(5) Respuesta totalmente adecuada / muy buena</option>
                        <option value="4">(4) Respuesta regularmente adecuada / buena</option>
                        <option value="3">(3) Respuesta  medianamente adecuada / regular</option>
                        <option value="2">(2) Respuesta no adecuada / erronea</option>
                        <option value="1">(1) Respuesta Indadecuada / totalmente erronea</option>
                    @elseif($pregs->calif=="5")
                        <option value="0" >Seleccione...</option>
                        <option value="5" selected>(5) Respuesta totalmente adecuada / muy buena</option>
                        <option value="4">(4) Respuesta regularmente adecuada / buena</option>
                        <option value="3">(3) Respuesta  medianamente adecuada / regular</option>
                        <option value="2">(2) Respuesta no adecuada / erronea</option>
                        <option value="1">(1) Respuesta Indadecuada / totalmente erronea</option>
                    @elseif($pregs->calif=="4")
                        <option value="0" >Seleccione...</option>
                        <option value="5">(5) Respuesta totalmente adecuada / muy buena</option>
                        <option value="4" selected>(4) Respuesta regularmente adecuada / buena</option>
                        <option value="3">(3) Respuesta  medianamente adecuada / regular</option>
                        <option value="2">(2) Respuesta no adecuada / erronea</option>
                        <option value="1">(1) Respuesta Indadecuada / totalmente erronea</option>
                    @elseif($pregs->calif=="3")
                        <option value="0" >Seleccione...</option>
                        <option value="5">(5) Respuesta totalmente adecuada / muy buena</option>
                        <option value="4">(4) Respuesta regularmente adecuada / buena</option>
                        <option value="3" selected>(3) Respuesta  medianamente adecuada / regular</option>
                        <option value="2">(2) Respuesta no adecuada / erronea</option>
                        <option value="1">(1) Respuesta Indadecuada / totalmente erronea</option>
                    @elseif($pregs->calif=="2")
                        <option value="0" >Seleccione...</option>
                        <option value="5">(5) Respuesta totalmente adecuada / muy buena</option>
                        <option value="4">(4) Respuesta regularmente adecuada / buena</option>
                        <option value="3">(3) Respuesta  medianamente adecuada / regular</option>
                        <option value="2" selected>(2) Respuesta no adecuada / erronea</option>
                        <option value="1">(1) Respuesta Indadecuada / totalmente erronea</option>
                    @elseif($pregs->calif=="1")
                        <option value="0" >Seleccione...</option>
                        <option value="5">(5) Respuesta totalmente adecuada / muy buena</option>
                        <option value="4">(4) Respuesta regularmente adecuada / buena</option>
                        <option value="3">(3) Respuesta  medianamente adecuada / regular</option>
                        <option value="2">(2) Respuesta no adecuada / erronea</option>
                        <option value="1" selected>(1) Respuesta Indadecuada / totalmente erronea</option>

                        @endif                  
                    
                  </select>

                </div>
                <br>
                <br>
                </div>

                @php
                $cont++;
                @endphp
                
                @endforeach


              <div class="box-footer">
                

                <button type="button" class="btn btn-primary" onclick="SaveCalif();" id="btnResponderEval"><i class="fa fa-save" aria-hidden="true" ></i> Registrar Evaluación</button>

                <button type="reset" class="btn btn-default" onclick="limpiarEval();" id="btnLimRespEval"> Limpiar</button>

                <div id="divCarga2" style="display: inline-block;"><div id="dcarga0" style="display: none;"><img src="{{ asset('/img/ajax-loader.gif')}}"/></div></div>
              </div>
           
</form>
          </div>
          </div>

          <div id="divEval02"></div>
@endforeach