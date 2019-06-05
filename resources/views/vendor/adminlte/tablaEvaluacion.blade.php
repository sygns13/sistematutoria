             <div class="col-md-12" id="divtablaEval">
             <div class="box">
          <div class="box-header">
            <h3 class="box-title" style="width: 100%;"><center><strong>RELACION DE EVALUACIONES AL ALUMNO:</strong></center>
              </h3>
          </div>
          <div class="box-body">

            <div style="font-size: 12px;"><strong style="text-decoration: underline;">Nota:</strong> Solo se podran editar y eliminar las evaluaciones que no hayan sido vistas o resueltas por los alumnos.</div>
             <table class="table table-bordered table-hover" id="tabla1" style="font-size: 14px;">
                {{-- <caption>Relación de Alumnos</caption> --}}
                <thead>
                  <tr>
                    {{-- <th class="sorting_asc">id</th> --}}
                    <th width="5%">#</th>
                    <th>Título de la Evaluación</th>
                    <th width="25%">Etapa de la Tutoría</th>
                    <th width="15%">Estado</th>
                    <th width="10%">Fecha</th>
                    <th width="15%">Gestión</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTable">
                <?php
                $cont=1;
                ?>
                  @foreach($evaluacions as $dato)
                    <tr>
                      <td>{{$cont}}</td>
                      <td>{{$dato->deseval}}</td>
                      <td>{{$dato->etapa}}</td>

                      <td>
                        @if(strval($dato->estado)=="1")
                        <span class="label label-warning">Evaluación Enviada</span>
                         @elseif(strval($dato->estado)=="2")
                        <span class="label label-info">Vista por el Alumno</span>
                        @elseif(strval($dato->estado)=="3")
                        <span class="label label-primary">Resuelta por el Alumno</span>
                        @elseif(strval($dato->estado)=="4")
                        <span class="label label-success">Evaluación Calificada</span>
                        @elseif(strval($dato->estado)=="5")
                        <span class="label bg-navy color-palette">Evaluación con Diagnóstico</span>
                        @endif

                      </td>

                      <td>{{pasFechaVista($dato->fechatomada)}}</td>
                      
                      <td>
                        <center>
 
                          <button class="btn btn-info" onclick="vermasEval('{{$dato->id}}','{{$dato->deseval}}');" data-placement="top" data-toggle="tooltip" title="Ver Evaluación"><i class="fa fa-eye" aria-hidden="true"></i></button>  

                          @if(strval($dato->estado)=="1")
                          <button class="btn btn-warning" type="button" onclick="editarEval('{{$dato->id}}','{{$dato->deseval}}');" data-placement="top" data-toggle="tooltip" title="Editar Evaluación"><i class="fa fa-cogs"></i></button>

                          <button class="btn btn-danger" type="button" onclick="eliminarEvaluacion('{{$dato->id}}','{{$dato->deseval}}');" data-placement="top" data-toggle="tooltip" title="Borrar Evaluación"><i class="fa fa-trash"></i></button>


                          @elseif(strval($dato->estado)=="3")
                          <button class="btn btn-primary" type="button" onclick="califEval('{{$dato->id}}','{{$dato->deseval}}');" data-placement="top" data-toggle="tooltip" title="Calificar Evaluación"><i class="fa fa-pencil-square-o"></i></button>

                           @elseif(strval($dato->estado)=="4")
                            

                          <button class="btn btn-primary" type="button" onclick="califEval('{{$dato->id}}','{{$dato->deseval}}');" data-placement="top" data-toggle="tooltip" title="Editar Calificación"><i class="fa fa-pencil-square-o"></i></button>

                          <button class="btn btn-success" type="button" onclick="diagnosticarEval('{{$dato->id}}','{{$dato->deseval}}');" data-placement="top" data-toggle="tooltip" title="Registrar Diagnóstico de la Evaluación"><i class="fa fa-list-alt"></i></button>

                          @elseif(strval($dato->estado)=="5")
                            <button class="btn btn-success" type="button" onclick="editDiagnosticoEval('{{$dato->id}}','{{$dato->deseval}}');" data-placement="top" data-toggle="tooltip" title="Editar Diagnóstico de la Evaluación"><i class="fa fa-list-alt"></i></button>
                        @endif
                          
                        </center>

                      </td>
                   </tr>
                   <?php
                   $cont++;
                   ?>
                  @endforeach


                </tbody>
              </table>

               

          </div>

        </div>
</div>
