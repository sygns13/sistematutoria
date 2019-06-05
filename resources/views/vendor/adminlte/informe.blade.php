@foreach($alumno  as $key => $dato)
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informe del Alumno:</h3>
              <button style="float: right;" type="button" class="btn btn-default" onclick="home();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

            <input type="hidden" name="txtidTA" id="txtidTA" value="{{$idTA}}">
            <input type="hidden" name="txtidA" id="txtidA" value="{{$idA}}">
            <input type="hidden" name="txtidP" id="txtidP" value="{{$idP}}">

            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">
                <div class="form-group">
                  <label for="txtAsunto">Título:</label>
                  <input type="text" class="form-control" id="txtAsunto" name="txtAsunto" placeholder="Ingrese Asunto" onkeyup="EscribeLetras(event,this);">
                </div>
                <div class="form-group">
                  <label for="txtAlum">Alumno:</label>
                  <input type="email" class="form-control" id="txtAlum" name="txtAlum" placeholder="Ingrese Email" readonly="true" onkeypress="return noEscribe(event);" value="{{$dato->nombres}} {{$dato->apellidos}}"> 
                </div>

                <div class="form-group">
                  <label for="txtContenido">Contenido:</label>
                  <textarea id="txtContenido" name="txtContenido" class="form-control" rows="6"></textarea>

                  <script type="text/javascript">
                    CKEDITOR.replace( 'txtContenido' );
                  </script>
                </div>

{{--  
                <div class="form-group">
                  <label for="fileAdjunto">Archivo Adjunto (Opcional)</label>
                  <input type="file" id="fileAdjunto" name="fileAdjunto">
                </div>

              </div>--}}
              <!-- /.box-body -->

              <div class="box-footer">
                

                <button type="button" class="btn btn-primary" onclick="saveInf();" id="btnsaveInf"><i class="fa fa-save -o" aria-hidden="true" ></i> Registrar Informe</button>

                <button type="button" class="btn btn-default" onclick="limpiarInf();" id="btnlimInf"> Limpiar</button>

                <div id="divCarga0" style="display: inline-block;"><div id="dcarga0" style="display: none;"><img src="{{ asset('/img/ajax-loader.gif')}}"/></div></div>
              </div>
           

          </div>
          </div>
@endforeach