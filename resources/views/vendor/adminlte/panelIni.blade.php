<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Alumnos Asignados  <span class="label label-primary" style="font-size: 100%;">Semestre 2018-I</span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead><tr>
                  <th style="width: 4%">#</th>
                  <th style="width: 10%">Código</th>
                  <th style="width: 17%">Alumno</th>
                  <th style="width: 14%">Semestre del Alumno</th>
                  <th style="width: 13%">Teléfono</th>
                  <th style="width: 16%">Email</th>
                  <th style="width: 10%">Img. Perfil</th>
                  <th style="width: 8%">Comunicación</th>
                  <th style="width: 8%">Evaluación</th>

                </tr></thead>
                <tbody id="cuerpoTable">

                   <?php
                $cont=1;
                ?>
                  @foreach($alumnosTut as $dato)
                    <tr>
                      <td>{{$cont}}</td>
                      <td>{{$dato->codigo}}</td>
                      <td>{{$dato->apellidos}}, {{$dato->nombres}}</td>
                      <td>{{$dato->semestre}}</td>
                      <td>{{$dato->telf}}</td>
                      <td>{{$dato->correo}}</td>
                      <td>
                        @if($dato->imagen==""||$dato->imagen==null)

                        @if($dato->genero=="1")
                          <img src="{{ asset('/img/av3.png')}}" class="profile-user-img img-responsive img-circle" alt="User Image" style="height: 80px;width: 80px;" id="imgEdit" />

                        @elseif($dato->genero=="2")
                          <img src="{{ asset('/img/av2.jpg')}}" class="profile-user-img img-responsive img-circle" alt="User Image" style="height: 80px;width: 80px;" id="imgEdit" />
                        @endif
                       @else
                         <img src="{{ asset($dato->imagen)}}" class="profile-user-img img-responsive img-circle" alt="User Image" style="height: 80px;width: 80px;" id="imgEdit" />
                       @endif

                      </td>

                      <td>
                        <button type="button" class="btn btn-primary" style="margin-bottom: 5px; width: 130px;" onclick="chatAlumno('{{$dato->idper}}','{{$dato->idalum}}','{{$dato->idusu}}','{{$dato->idTA}}')">Iniciar Chat</button><br>
                        <button type="button" class="btn btn-primary" style="margin-bottom: 5px;width: 130px;" onclick="envMail('{{$dato->idper}}','{{$dato->idalum}}','{{$dato->idusu}}','{{$dato->idTA}}')">Enviar Mensaje</button><br>
                        <button type="button" class="btn btn-primary" style="width: 130px;" onclick="cargarInf('{{$dato->idper}}','{{$dato->idalum}}','{{$dato->idusu}}','{{$dato->idTA}}')">Guardar Informe</button>

                      </td>
                      <td>
                        <button type="button" class="btn btn-primary" style="margin-bottom: 5px;width: 139px;" onclick="nuevaEval('{{$dato->idper}}','{{$dato->idalum}}','{{$dato->idusu}}','{{$dato->idTA}}')">Evaluaciones</button><br>
                        <button type="button" class="btn btn-primary" style="margin-bottom: 5px;width: 139px;" onclick="nuevaTarea('{{$dato->idper}}','{{$dato->idalum}}','{{$dato->idusu}}','{{$dato->idTA}}')">Tareas</button><br>
                        <button type="button" class="btn btn-primary" style="width: 139px;" onclick="nuevaSesion('{{$dato->idper}}','{{$dato->idalum}}','{{$dato->idusu}}','{{$dato->idTA}}')">Sesiones</button>
                      </td>
                   </tr>
                   <?php
                   $cont++;
                   ?>
                  @endforeach

                  @if($cont==1)
                  <tr>
                    <td colspan="9">Para el presente semestre, el docente aun no tiene alumnos asignados para el proceso de tutoría</td>
                  </tr>

                  @endif





              </tbody></table>
            </div>
            <!-- /.box-body -->

          </div>


<div id="divChat"></div>