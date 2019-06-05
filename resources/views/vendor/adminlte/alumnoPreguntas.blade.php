        @foreach($evaluacion  as $key => $dato)
<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;">{{$dato->deseval}}</h3></center>
              <button style="float: right;" type="button" class="btn btn-default" onclick="homeAlumno();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

            <input type="hidden" name="txtidEval" id="txtidEval" value="{{$dato->id}}">


            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

                <form>
                <p style="text-align:justify;">
                 <strong style="text-decoration: underline;"> Instrucciones:</strong> Conteste Todas las preguntas, con la mayor sinceridad posible y escriba una descripción breve y sencilla de porque considera esa respuesta. Siendo este un proceso para poder brindarle ayuda, o usted mismo descubra en que puede mejorar personalmente.
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

                  <textarea class="txtRespuesta form-control" rows="3" id="txtPregunta{{$pregs->idDetPreg}}" name="txtPregunta{{$pregs->idDetPreg}}" placeholder="Ingrese su Respuesta"></textarea>
                </div>

                @php
                $cont++;
                @endphp
                
                @endforeach


              <div class="box-footer">
                

                <button type="button" class="btn btn-primary" onclick="SaveEval();" id="btnResponderEval"><i class="fa fa-check" aria-hidden="true" ></i> Enviar Respuestas</button>

                <button type="reset" class="btn btn-default" onclick="limpiarEval();" id="btnLimRespEval"> Limpiar</button>

                <div id="divCarga2" style="display: inline-block;"><div id="dcarga0" style="display: none;"><img src="{{ asset('/img/ajax-loader.gif')}}"/></div></div>
              </div>
           
</form>
          </div>
          </div>

          <div id="divEval02"></div>
@endforeach