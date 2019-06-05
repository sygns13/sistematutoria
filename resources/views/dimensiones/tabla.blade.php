     
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Relación de Dimensiones Personales</h3>
          </div>
          <div class="box-body">
             <table class="table table-bordered table-hover" id="tabla1" style="font-size: 14px;">
                {{-- <caption>Relación de Alumnos</caption> --}}
                <thead>
                  <tr>
                    {{-- <th class="sorting_asc">id</th> --}}
                    <th width="4%">#</th>
                    <th width="20%">Nombre</th>
                    <th>Descripción</th>
                    <th width="15%">Gestión</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTable">
                <?php
                $cont=1;
                ?>
                  @foreach($dimensiones as $dato)
                    <tr>
                      <td>{{$cont}}</td>
                      <td>{{$dato->nomdimen}}</td>
                      <td>@php echo $dato->desdimen; @endphp</td>
                      
                      <td>
                        <center>
 
           
                          <button class="btn btn-warning" type="button" onclick="editar('{{$dato->id}}','{{$dato->nomdimen}}');" data-placement="top" data-toggle="tooltip" title="Editar Dimensión"><i class="fa fa-cogs"></i></button>
                          <button class="btn btn-danger" type="button" onclick="eliminar('{{$dato->id}}','{{$dato->nomdimen}}');" data-placement="top" data-toggle="tooltip" title="Borrar Dimensión"><i class="fa fa-trash"></i></button>
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

