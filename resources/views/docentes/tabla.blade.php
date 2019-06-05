     
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Relación de Tutores</h3>
          </div>
          <div class="box-body">
             <table class="table table-bordered table-hover" id="tabla1" style="font-size: 14px;">
                {{-- <caption>Relación de Alumnos</caption> --}}
                <thead>
                  <tr>
                    {{-- <th class="sorting_asc">id</th> --}}
                    <th width="4%">#</th>
                    <th width="10%">DNI</th>
                    <th width="17%">Apellidos</th>
                    <th width="17%">Nombres</th>
                    <th width="17%">Especialidad</th>
                    <th width="10%">Teléf Cell</th>
                    <th width="10%">Estado en el Sistema</th>
                    <th width="15%">Gestión</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTable">
                <?php
                $cont=1;
                ?>
                  @foreach($tutors as $dato)
                    <tr>
                      <td>{{$cont}}</td>
                      <td>{{$dato->dni}}</td>
                      <td>{{$dato->apellidos}}</td>
                      <td>{{$dato->nombres}}</td>
                      <td>{{$dato->esptutor}}</td>
                      <td>{{$dato->telf}}</td>
                      <td>
                      @if($dato->tactivo=="1")
                      <span class="label label-success">Activo</span>
                      @elseif($dato->tactivo=="2")
                      <span class="label label-warning">Suspendido</span>
                      @elseif($dato->tactivo=="3")
                        <span class="label label-danger">De Baja</span>
                      @endif
                      </td>
                      {{-- 
                      <td>
                       @if($dato->imagen=="")

                        @if($dato->genero=="1")
                          <img src="{{ asset('/img/av3.png')}}" class="img-circle" alt="User Image" style="height: 80px;width: 80px;" />

                        @elseif($dato->genero=="2")
                          <img src="{{ asset('/img/av2.jpg')}}" class="img-circle" alt="User Image" style="height: 80px;width: 80px;" />
                        @endif
                       @else
                         <img src="{{ asset($dato->imagen)}}" class="img-circle" alt="User Image" style="height: 80px;width: 80px;" />
                       @endif

                    </td>--}}
                      <td>
                        <center>
                        <button class="btn btn-info" onclick="verMas('{{$dato->idper}}','{{$dato->idtutor}}','{{$dato->idusu}}');" data-placement="top" data-toggle="tooltip" title="Ver más"><i class="fa fa-eye" aria-hidden="true"></i></button>   

                        @if($dato->tactivo=="2" || $dato->tactivo=="3")
                          <button class="btn btn-success" onclick="darSubida('{{$dato->idper}}','{{$dato->idtutor}}','{{$dato->idusu}}','{{$dato->apellidos}}','{{$dato->nombres}}','{{$dato->dni}}');" data-placement="top" data-toggle="tooltip" title="Activar Docente"><i class="fa fa-user-plus" aria-hidden="true"></i></button>
                        @elseif($dato->tactivo=="1")
                         <button class="btn bg-navy" onclick="DarBaja('{{$dato->idper}}','{{$dato->idtutor}}','{{$dato->idusu}}','{{$dato->apellidos}}','{{$dato->nombres}}','{{$dato->dni}}');" data-placement="top" data-toggle="tooltip" title="Desactivar Docente"><i class="fa fa-user-times" aria-hidden="true"></i></button>  

                         @endif            
                          <button class="btn btn-warning" type="button" onclick="editar('{{$dato->idper}}','{{$dato->idtutor}}','{{$dato->idusu}}','{{$dato->apellidos}}','{{$dato->nombres}}','{{$dato->dni}}');" data-placement="top" data-toggle="tooltip" title="Editar Docente"><i class="fa fa-cogs"></i></button>
                          <button class="btn btn-danger" type="button" onclick="eliminar('{{$dato->idper}}','{{$dato->idtutor}}','{{$dato->idusu}}','{{$dato->apellidos}}','{{$dato->nombres}}','{{$dato->dni}}');" data-placement="top" data-toggle="tooltip" title="Borrar Docente"><i class="fa fa-trash"></i></button>
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

