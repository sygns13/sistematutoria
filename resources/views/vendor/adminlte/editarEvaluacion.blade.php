@foreach($alumno  as $key => $dato)
@foreach($evaluacion  as $datoEval)
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title" id="tituloEval">Evaluación:</h3>
              <button style="float: right;" type="button" class="btn btn-default" onclick="goEval01();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver Atrás</button>
            </div>


            <input type="hidden" name="txtetapanom" id="txtetapanom" value="{{$etapa->nometapa}}">
            <input type="hidden" name="txtfechaEval" id="txtfechaEval" value="{{$fecnow}}">
            <input type="hidden" name="txtidEval" id="txtidEval" value="{{$datoEval->id}}">
            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

                <div class="form-group">
                  <label for="cbsEtapaE">Etapa de la Tutoría:</label>
                  <select class="form-control" id="cbsEtapaE">
                    @foreach($etapas as $etapa)
                        @if($etapa->id==$datoEval->idetapa)
                          <option value="{{$etapa->id}}" selected>{{$etapa->nometapa}}</option>
                        @else
                          <option value="{{$etapa->id}}">{{$etapa->nometapa}}</option>
                        @endif
                      
                    @endforeach
                  </select>
                  
                </div>


                <div class="form-group">
                  <label for="txtAsuntoE">Título:</label>
                  <input type="text" class="form-control" id="txtAsuntoE" name="txtAsuntoE" placeholder="Ingrese Título de la Evalaución" onkeyup="EscribeLetras(event,this);" value="{{$datoEval->deseval}}">
                </div>


                <div class="form-group">
                  <label for="txtAlumEval2E">Alumno:</label>
                  <input type="text" class="form-control" id="txtAlumEval2E" name="txtAlumEval2E" placeholder="Ingrese Alumno" readonly="true" onkeypress="return noEscribe(event);" value="{{$dato->nombres}} {{$dato->apellidos}}"> 
                </div>


              <hr>

              
                <div class="box-body">
               <div class="col-md-6" style="border-right: solid gray 1px;">
                <center>
                <h4 style="text-decoration: underline;">Banco de Preguntas</h4>
                </center>
              <div class="form-group">
                  <label for="cbsDimension">Dimensión Personal:</label>
                  <select class="form-control" id="cbsDimension" onchange="cambiarDimen();">
                    @foreach($dimensiones as $dimension)
                      <option value="{{$dimension->id}}">{{$dimension->nomdimen}}</option>
                    @endforeach
                  </select>
                  
                </div>

                <div id="divBancoPreguntas">
             @include('adminlte::bancoPreguntas')
                </div>
                <hr>
                <div class="form-group">
                  <label for="txtnewPregE">Ingresar una Pregunta Nueva:</label>

                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="txtnewPreg" name="txtnewPreg" placeholder="Nueva Pregunta" onkeyup="EscribeLetras(event,this);">
                  </div>
                  <div class="col-sm-2">
                  <button type="button" class="btn btn-primary" onclick="agreNewpregunta();" id="btnsaveInf"><i class="fa  fa-plus-square-o" aria-hidden="true" ></i> Ingresar</button>
                  </div>
                </div>
               

          </div>

          <div class="col-md-6" >
            <center>
                <h4 style="text-decoration: underline;">Preguntas de la Evaluación</h4>
            </center>

             <div class="form-group">
                  <label for="lblNota">Nota:</label>
                  <p style="text-align: justify;">Las preguntas consideradas en la evaluación se enviarán al alumno, una vez el alumno haya confirmado la recepción de la evaluación, ya no se podrá realizar ninguna modificación ni eliminación de la evalaución, o de sus preguntas.</p>
                  
                  
                </div>

             <table class="table table-bordered table-hover" id="tabla3" style="font-size: 12px;">
                {{-- <caption>Relación de Alumnos</caption> --}}
                <thead>
                  <tr>
                    {{-- <th class="sorting_asc">id</th> --}}
                    <th width="10%">#</th>
                    <th>Pregunta</th>
                    <th width="25%">Dimensión</th>
                    <th width="15%">Quitar</th>
                  </tr>
                </thead>
                <?php
                $cont=1;
                ?>
                <tbody id="cuerpoTable2">
                   @foreach($preguntasEval as $pregs)
                    <tr class="filaPregs" id="idPreg-{{$pregs->idpreg}}">
                      <td>{{$cont}}</td>
                      <td>{{$pregs->pregunta}}</td>
                      <td>{{$pregs->dimension}}</td>
                      <td class="colPlanilla"><center><buttton class="btn btn-sm btn-danger" onclick="quitarPreg(this,'+idPreg+')"><i class="fa fa-times" aria-hidden="true"></i></buttton></center></td>
                    </tr>
                    <?php
                   $cont++;
                   ?>
                    @endforeach



                </tbody>
              </table>

               <div class="box-footer">
                

                <button type="button" class="btn btn-info" onclick="Paso2EvalE();" id="btnmodificarEval"><i class="fa fa-pencil" aria-hidden="true" ></i> Modificar Evaluación</button>

                <button type="button" class="btn btn-success" onclick="imprimirEval02E();" id="btnlimInf"><i class="fa fa-print" aria-hidden="true" ></i> Imprimir</button>

                <div id="divCarga2" style="display: inline-block;"><div id="dcarga2" style="display: none;"><img src="{{ asset('/img/ajax-loader.gif')}}"/></div></div>
              </div>

          </div>

          </div>




              
           

          </div>
          </div>

          
@endforeach
@endforeach