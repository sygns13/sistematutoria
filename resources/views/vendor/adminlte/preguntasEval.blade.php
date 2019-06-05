@foreach($alumno  as $key => $dato)
<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title" id="tituloEval">Evaluación:</h3>
              <button style="float: right;" type="button" class="btn btn-default" onclick="goEval01();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver Atrás</button>
            </div>


            <input type="hidden" name="txtetapanom" id="txtetapanom" value="{{$etapa->nometapa}}">
            <input type="hidden" name="txtfechaEval" id="txtfechaEval" value="{{$fecnow}}">
            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">

                <div class="form-group">
                  <label for="lbletapa">Etapa de la Tutoría: {{$etapa->nometapa}}</label>
                  
                </div>


                <div class="form-group">
                  <label for="txtAlumEval2">Alumno:</label>
                  <input type="text" class="form-control" id="txtAlumEval2" name="txtAlum" placeholder="Ingrese Alumno" readonly="true" onkeypress="return noEscribe(event);" value="{{$dato->nombres}} {{$dato->apellidos}}"> 
                </div>


              <hr>

              
                <div class="box-body">
               <div class="col-md-6" style="border-right: solid gray 1px;">
                <center>
                <h4 style="text-decoration: underline;">Banco de Preguntas</h4>
                </center>
              <div class="form-group">
                  <label for="lblDimension">Dimensión Personal:</label>
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
                  <label for="txtnewPreg">Ingresar una Pregunta Nueva:</label>

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
                <tbody id="cuerpoTable2">



                </tbody>
              </table>

               <div class="box-footer">
                

                <button type="button" class="btn btn-primary" onclick="Paso2Eval();" id="btnRegistrarEval"><i class="fa fa-save" aria-hidden="true" ></i> Registrar y Enviar Evaluación</button>

                <button type="button" class="btn btn-success" onclick="imprimirEval02();" id="btnlimInf"><i class="fa fa-print" aria-hidden="true" ></i> Imprimir</button>

                <div id="divCarga2" style="display: inline-block;"><div id="dcarga0" style="display: none;"><img src="{{ asset('/img/ajax-loader.gif')}}"/></div></div>
              </div>

          </div>

          </div>




              
           

          </div>
          </div>

          
@endforeach