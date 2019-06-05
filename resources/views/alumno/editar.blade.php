      @foreach($alumnosEdit as $dato)
      <div class="col-md-8" style="border-right: 3px solid rgba(60, 141, 188, 0.48);">
        <div class="box box-info">
            <div class="box-header with-border" >

            
              <h3 class="box-title" id="nombreAlumE">Alumno: {{$dato->nombres}} {{$dato->apellidos}}</h3>

      
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">


              
                <div class="form-group">
                  <label for="txtcodE" class="col-sm-2 control-label">Código:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtcodE" placeholder="Código" value="{{$dato->codigo}}">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtDNIE" class="col-sm-2 control-label">DNI:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtDNIE" placeholder="DNI" value="{{$dato->DNI}}" onkeypress="return soloNumeros(event);">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtnomE" class="col-sm-2 control-label">Nombres:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtnomE" placeholder="Nombres" value="{{$dato->nombres}}">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtapeE" class="col-sm-2 control-label">Apellidos:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtapeE" placeholder="Apellidos" value="{{$dato->apellidos}}">
                  </div>
                </div>


                <div class="form-group">
                  <label for="cbugeneroE" class="col-sm-2 control-label">Genero:*</label>

                  <div class="col-sm-10">
                  <select class="form-control" id="cbugeneroE">
                    <option value="0">Seleccione...</option>
                  @if($dato->genero=="1")
                    <option value="1" selected>Varón</option>
                    <option value="2">Mujer</option>
                  @else
                    <option value="1" >Varón</option>
                    <option value="2" selected>Mujer</option>
                  @endif

                  </select>
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtsemeE" class="col-sm-2 control-label">Semestre que cursa:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtsemeE" placeholder="I,II,..." value="{{$dato->semestre}}">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txttelfE" class="col-sm-2 control-label">Teléfono:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txttelfE" placeholder="Ej. 999 9999" value="{{$dato->telf}}">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtdirE" class="col-sm-2 control-label">Dirección:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtdirE" placeholder="Av. Jr. Psje." value="{{$dato->direccion}}">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtmailE" class="col-sm-2 control-label">Email:*</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="txtmailE" placeholder="email@dominio.com/net" value="{{$dato->correo}}" required>
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtuserE" class="col-sm-2 control-label">Usuario:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtuserE" placeholder="username" value="{{$dato->username}}">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtpswE" class="col-sm-2 control-label">Password:*</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="txtpswE" placeholder="password">
                  </div>
                </div>

                <input type="hidden" id="idPerE" value="{{$dato->idper}}">
                <input type="hidden" id="idAluE" value="{{$dato->idalum}}">
                <input type="hidden" id="idUsuE" value="{{$dato->idusu}}">

                

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-info" onclick="GuardarE1();">Guardar</button>

                <button type="button" class="btn btn-default" onclick="CerrarE();">Cancelar</button>
                
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

      </div>


      <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-body box-profile">


              @if($dato->imagen=="")

                        @if($dato->genero=="1")
                          <img src="{{ asset('/img/av3.png')}}" class="profile-user-img img-responsive img-circle" alt="User Image" style="height: 80px;width: 80px;" id="imgEdit" />

                        @elseif($dato->genero=="2")
                          <img src="{{ asset('/img/av2.jpg')}}" class="profile-user-img img-responsive img-circle" alt="User Image" style="height: 80px;width: 80px;" id="imgEdit" />
                        @endif
                       @else
                         <img src="{{ asset($dato->imagen)}}" class="profile-user-img img-responsive img-circle" alt="User Image" style="height: 80px;width: 80px;" id="imgEdit" />
                       @endif

 

              <h3 class="profile-username text-center">Foto de Perfil</h3>

              <p class="text-muted text-center">Alumno.</p>



          <form enctype="multipart/form-data" class="formarchivo2" id="formulario2" name="formulario2">
          <input name="archivo2" type="file" id="archivo2" class="archivo form-control" onchange="cambiarFoto();"
          accept=".png, .jpg, .jpeg, .gif, .PNG, .JPG, .JPEG, .GIF"/><br /><br />

          <input type="hidden" name="ocudni2" id="ocudni2" value="{{$dato->DNI}}" >
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <input type="hidden" name="idPerEimg" id="idPerEimg" value="{{$dato->idper}}">
          <input type="hidden" name="idAluEimg" id="idAluEimg" value="{{$dato->idalum}}">
          <input type="hidden" name="idUsuEimg" id="idUsuEimg" value="{{$dato->idusu}}">

          <div class="col-sm-12" id="msjEditFoto"></div>

          
             </form>

          <button type="button" class="btn btn-info" onclick="GuardarE2();">Guardar</button>

          <button type="button" class="btn btn-default" onclick="CerrarE();">Cancelar</button>
            </div>

            <!-- /.box-body -->
          </div>

      </div>
@endforeach