@foreach($alumno  as $key => $dato)
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Enviar Mensaje de Correo a: {{$dato->nombres}} {{$dato->apellidos}}</h3>
              <button style="float: right;" type="button" class="btn btn-default" onclick="home();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

            <input type="hidden" name="idPerMsj" id="idPerMsj" value="{{$idP}}">
            <input type="hidden" name="emailMsj" id="emailMsj" value="{{$dato->email}}">
            <!-- /.box-header -->
            <!-- form start -->
            <form action="send" method="post">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="txtAsunto">Asunto</label>
                  <input type="text" class="form-control" id="txtAsunto" name="txtAsunto" placeholder="Ingrese Asunto" onkeyup="EscribeLetras(event,this);">
                </div>
                <div class="form-group">
                  <label for="txtemail">Email de Destino</label>
                  <input type="email" class="form-control" id="txtemail" name="txtemail" placeholder="Ingrese Email" readonly="true" onkeypress="return noEscribe(event);" value="{{$dato->email}}"> 
                </div>

                <div class="form-group">
                  <label for="txtmsj">Mensaje</label>
                  <textarea id="txtmsj" name="txtmsj" class="form-control" rows="6"></textarea>
                </div>

{{--  
                <div class="form-group">
                  <label for="fileAdjunto">Archivo Adjunto (Opcional)</label>
                  <input type="file" id="fileAdjunto" name="fileAdjunto">
                </div>

              </div>--}}
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="button" class="btn btn-primary" onclick="enviarMSj();" id="btnEnviarMsj"><i class="fa fa-envelope-o" aria-hidden="true" ></i> Enviar Mensaje</button>
                <div id="divCarga0" style="display: inline-block;"><div id="dcarga0" style="display: none;"><img src="{{ asset('/img/ajax-loader.gif')}}"/></div></div>
              </div>
            </form>

          </div>
@endforeach