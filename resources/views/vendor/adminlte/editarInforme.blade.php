
<div class="box box-success">
           <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">
                <div class="form-group">
                  <label for="txtAsuntoE">Título:</label>
                  <input type="text" class="form-control" id="txtAsuntoE" name="txtAsuntoE" placeholder="Ingrese Asunto" onkeyup="EscribeLetras(event,this);" value="{{$informe->titulo}}">
                </div>
                <div class="form-group">
                  <label for="txtAlumE">Alumno:</label>
                  <input type="text" class="form-control" id="txtAlumE" name="txtAlumE" placeholder="Ingrese Email" readonly="true" onkeypress="return noEscribe(event);" value="{{$persona->nombres}} {{$persona->apellidos}}"> 
                </div>

                <div class="form-group">
                  <label for="txtContenidoE">Contenido:</label>
                  <textarea id="txtContenidoE" name="txtContenidoE" class="form-control" rows="6"></textarea>

                  <script type="text/javascript">
                    

                  </script>
                </div>


          </div>

</div>
