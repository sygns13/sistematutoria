        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Lista de Alumnos</h3>
          </div>
          <div class="box-body">
             <table class="table table-bordered table-hover" id="tabla1" style="font-size: 14px;">
                <caption>Relación de Alumnos</caption>
                <thead>
                  <tr>
                    {{-- <th class="sorting_asc">id</th> --}}
                    <th width="5%">#</th>
                    <th width="8%">Código</th>
                    <th width="20%">Nombres</th>
                    <th width="20%">Apellidos</th>
                    <th width="5%">Ciclo</th>
                    <th width="7%">Teléfono</th>
                    <th width="20%">Correo</th>
                   {{--  <th width="9%">Imagen</th>--}}
                    <th width="15%">Gestión</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTable">
                <?php
                $cont=1;
                ?>
                  @foreach($alumnos as $dato)
                    <tr>
                      <td>{{$cont}}</td>
                      <td>{{$dato->codigo}}</td>
                      <td>{{$dato->nombres}}</td>
                      <td>{{$dato->apellidos}}</td>
                      <td>{{$dato->semestre}}</td>
                      <td>{{$dato->telf}}</td>
                      <td>{{$dato->correo}}</td>
                   {{--    <td>
                       @if($dato->imagen=="")

                        @if($dato->genero=="1")
                          <img src="{{ asset('/img/av3.png')}}" class="img-circle" alt="User Image" style="height: 80px;width: 80px;" />

                        @elseif($dato->genero=="2")
                          <img src="{{ asset('/img/av2.jpg')}}" class="img-circle" alt="User Image" style="height: 80px;width: 80px;" />
                        @endif
                       @else
                         <img src="{{ asset($dato->imagen)}}" class="img-circle" alt="User Image" style="height: 80px;width: 80px;" />
                       @endif

                      </td>
                    --}}

                      <td>
                        <center>
                          <button class="btn btn-warning" type="button" onclick="editar({{$dato->idper}},{{$dato->idalum}},{{$dato->idusu}});" data-placement="top" data-toggle="tooltip" title="Editar Alumno"><i class="fa fa-cogs"></i></button>
                          <button class="btn btn-danger" type="button" onclick="deleteAlum({{$dato->idper}},{{$dato->idalum}},{{$dato->idusu}});" data-placement="top" data-toggle="tooltip" title="Eliminar Alumno"><i class="fa fa-trash"></i></button>
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
