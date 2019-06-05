<table class="table table-bordered table-hover" id="tabla2" style="font-size: 12px;">
                {{-- <caption>Relación de Alumnos</caption> --}}
                <thead>
                  <tr>
                    {{-- <th class="sorting_asc">id</th> --}}
                    <th width="10%">#</th>
                    <th>Pregunta</th>
                    <th width="25%">Dimensión</th>
                    <th width="15%">Agregar</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTable1">
                <?php
                $cont=1;
                ?>
                  @foreach($preguntas as $dato)
                    <tr>
                      <td>{{$cont}}</td>
                      <td>{{$dato->pregunta}}</td>
                      <td>{{$dato->dimension}}</td>
                      
                      <td>
                        <center>
 
                          <button class="btn btn-sm btn-primary" onclick="AgregarPreg('{{$dato->idPreg}}','{{$dato->pregunta}}','{{$dato->dimension}}');" data-placement="top" data-toggle="tooltip" title="Agregar Pregunta"><i class="fa fa-plus-square" aria-hidden="true"></i></button>  

                        </center>

                      </td>
                   </tr>
                   <?php
                   $cont++; 
                   ?>
                  @endforeach


                </tbody>
              </table>