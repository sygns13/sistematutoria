     
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
                    <th width="15%">Apellidos</th>
                    <th width="15%">Nombres</th>
                    <th width="16%">Especialidad</th>
                    <th width="10%">Teléf Cell</th>
                    <th width="10%">Estado en el Sistema</th>
                    <th width="10%">N° de Alumnos Tutoreados</th>
                    <th width="10%">Asignar</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTable">
                <?php
                $cont=1;
                ?>
                  @foreach($tutorAlumno as $dato)
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
                     <td>{{$dato->totalAsesorados}}</td>
                      <td>

          @php
            $auxS2=0;
          @endphp

          @foreach($semestre as $data)
          @php
            $auxS2=1;
          @endphp
          @endforeach
                @if($auxS2=='1')
                          <center>
                        <button class="btn btn-primary" onclick="asignarTut('{{$dato->idper}}','{{$dato->idtutor}}','{{$dato->idusu}}');" data-placement="top" data-toggle="tooltip" title="Asignar Alumnos para Tutoría"><i class="fa fa-user-plus" aria-hidden="true"></i></button>  </center>
                  @elseif($auxS2=='0')
                  No existe Semestre Activo.
                  @endif
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

