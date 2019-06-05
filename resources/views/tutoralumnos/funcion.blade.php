        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Lista de Alumnos que en el Presente Semestre aun no cuentan con Tutor</h3>
          </div>
          <div class="box-body">
             <table class="table table-bordered table-hover" id="tabla2" style="font-size: 14px;">
                <caption>Alumnos</caption>
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
                  @foreach($alumnosGen as $dato)
                  @if($dato->tutorAlumno=='0')
                    <tr>
                      <td>{{$cont}}</td>
                      <td>{{$dato->codigo}}</td>
                      <td>{{$dato->nombres}}</td>
                      <td>{{$dato->apellidos}}</td>
                      <td>{{$dato->semestre}}</td>
                      <td>{{$dato->telf}}</td>
                      <td>{{$dato->correo}}</td>
                
                      <td>
                        <center>
                          <button class="btn btn-success" type="button" onclick="agreAlum({{$dato->idper}},{{$dato->idalum}},{{$dato->idusu}});" data-placement="top" data-toggle="tooltip" title="Asignar al Alumno bajo la Tutoría del Docente"><i class="fa fa-check-square-o"></i></button>
                        </center>

                      </td>
                   </tr>
                   <?php
                   $cont++;
                   ?>
                   @endif
                  @endforeach


                </tbody>
              </table>

          </div>

        </div>
