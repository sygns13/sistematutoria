             <div class="col-md-12">
             <div class="box">
          <div class="box-header">
            <h3 class="box-title" style="width: 100%;"><center><strong>RELACION DE INFORMES DEL ALUMNO:</strong></center>
              </h3>
          </div>
          <div class="box-body">
             <table class="table table-bordered table-hover" id="tabla1" style="font-size: 14px;">
                {{-- <caption>Relación de Alumnos</caption> --}}
                <thead>
                  <tr>
                    {{-- <th class="sorting_asc">id</th> --}}
                    <th width="10%">#</th>
                    <th>Título de Informe</th>
                    <th width="15%">Gestión</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTable">
                <?php
                $cont=1;
                ?>
                  @foreach($informes as $dato)
                    <tr>
                      <td>{{$cont}}</td>
                      <td>{{$dato->titulo}}</td>
                      
                      <td>
                        <center>
 
                          <button class="btn btn-info" onclick="verMasInforme('{{$dato->id}}','{{$dato->titulo}}');" data-placement="top" data-toggle="tooltip" title="Ver Informe"><i class="fa fa-eye" aria-hidden="true"></i></button>  

                          <button class="btn btn-warning" type="button" onclick="editarInforme('{{$dato->id}}','{{$dato->titulo}}');" data-placement="top" data-toggle="tooltip" title="Editar Informe"><i class="fa fa-cogs"></i></button>

                          <button class="btn btn-danger" type="button" onclick="eliminarInforme('{{$dato->id}}','{{$dato->titulo}}');" data-placement="top" data-toggle="tooltip" title="Borrar Informe"><i class="fa fa-trash"></i></button>
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
