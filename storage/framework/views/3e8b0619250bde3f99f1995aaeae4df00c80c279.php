
        <div class="box box-info">
            <div class="box-header with-border" >

              <h3 class="box-title" id="tituloAgregar">Nuevo Docente Tutor</h3>

            </div>


            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">

                <div class="col-md-8" >
                  <form class="form-horizontal">
                <h3 class="profile-username text-center" style="padding-bottom: 40px;padding-top: 10px;">Datos Personales</h3>
              

         

                <div class="form-group">
                  <label for="cbutipodoc" class="col-sm-2 control-label">Tipo Doc:*</label>

                  <div class="col-sm-4">
                  <select class="form-control" id="cbutipodoc">
                    <option value="1">DNI</option>
                    <option value="2">Carnet de Extranjería</option>
                  </select>
                   </div>
                  <label for="txtDNI" class="col-sm-2 control-label">Número:*</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="txtDNI" placeholder="DNI/CE" maxlength="15" onkeypress="return soloNumeros(event);">
                  </div>
                 

                </div>

           


                <div class="form-group">
                  <label for="txtnom" class="col-sm-2 control-label">Nombres:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtnom" placeholder="Nombres" maxlength="500" onkeyup="EscribeLetras(event,this);">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtape" class="col-sm-2 control-label">Apellidos:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtape" placeholder="Apellidos" maxlength="500" onkeyup="EscribeLetras(event,this);">
                  </div>
                </div>


                <div class="form-group">
                  <label for="cbugenero" class="col-sm-2 control-label">Genero:*</label>

                  <div class="col-sm-4">
                  <select class="form-control" id="cbugenero">
                    <option value="0">Seleccione...</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                  </select>
                  </div>
                 

  <label for="txttelf" class="col-sm-2 control-label">Teléfono:</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="txttelf" placeholder="Ej. 043-123456" maxlength="50" onkeyup="EscribeLetras(event,this);">
                  </div>
                  
                </div>


    


               


                <div class="form-group">
                  <label for="txtdir" class="col-sm-2 control-label">Dirección:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtdir" placeholder="Av. Jr. Psje." maxlength="500" onkeyup="EscribeLetras(event,this);">
                  </div>
                </div>


                 <div class="form-group">
                  <label for="txtesp" class="col-sm-2 control-label">Especialidad:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtesp" placeholder="Especialidad en su Carrera Universitaria" maxlength="500" onkeyup="EscribeLetras(event,this);">
                  </div>
                </div>





           <div class="form-group">
                  <label for="txtVideo" class="col-sm-2 control-label">Video de Presentación:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtVideo" placeholder="Iframe del Video" maxlength="2000">
                  </div>
                </div>

 <div class="form-group">
                  <div class="col-sm-12">
              

              <div class="callout callout-info">
                <h4>Nota</h4>

                <p>Copie Adecuadamente el Iframe del video de Youtube, o deje el espacio en blanco.</p>
              </div>


              </div>
                </div>

             

              

                <input type="hidden" id="idPer" value="">
                <input type="hidden" id="idTuto" value="">
                <input type="hidden" id="idUsu" value="">

                
                </form>
              </div>

              <div class="col-md-4" style="border-left: 3px solid rgba(60, 141, 188, 0.48);">
              <h3 class="profile-username text-center" style="padding-top: 10px;">Imagen De Perfil</h3>
            <img src="<?php echo e(asset('/img/av3.png')); ?>" id="imgPerfil" class="profile-user-img img-responsive img-circle" alt="Imagen del usuario" style="height: 80px;width: 80px;" id="imgEdit" />


 

              

              <p class="text-muted text-center">Tutor</p>



          <form enctype="multipart/form-data" class="formarchivo" id="formulario" name="formulario">

          <input name="archivo" type="file" id="archivo" class="archivo form-control"
          accept=".png, .jpg, .jpeg, .gif, .PNG, .JPG, .JPEG, .GIF"/><br /><br />

 
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <input type="hidden" name="nomImg" id="nomImg" value="">
      

          <div class="col-sm-12" id="msjFile"></div>

          
             </form>

             <form role="form">
             <h3 class="profile-username text-center">Datos De Usuario</h3>
              <div class="box-body">
                <div class="form-group">
                  <label for="txtmail">Email:*</label>
                  <input type="text" class="form-control" id="txtmail" placeholder="email@dominio.com/net" maxlength="500" onkeyup="EscribeLetras(event,this);">
                </div>
                <div class="form-group">
                  <label for="txtuser">Usuario:*</label>
                  <input type="text" class="form-control" id="txtuser" placeholder="username" maxlength="225" onkeyup="EscribeLetras(event,this);">
                </div>
                <div class="form-group">
                  <label for="txtpsw">Password:*</label>
                  <input type="password" class="form-control" id="txtpsw" placeholder="Password" maxlength="225">
                </div>

                
  

              </div>
              <!-- /.box-body -->

   
            </form>


            </div>

          </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-info" id="btnGuardar">Guardar</button>

                <button type="button" class="btn btn-default" id="btnCancel">Cancelar</button>
                
              </div>
              <!-- /.box-footer -->
           

          </div>



     