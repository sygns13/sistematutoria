@extends('adminlte::layouts.appAlumno')

@section('htmlheader_title')
	Alumnos
@endsection

<style type="text/css">         
          
#mdialTamanio{
  width: 80% !important;
}
</style>



@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">

     <div class="box">
        <div class="box-header">
          <h3 class="box-title"><i class="fa fa-users"></i> Gestión de Alumnos</h3>
          <a href="{{ URL::to('home') }}" style="float: right;"><button type="button" class="btn btn-default"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button></a>
        </div>
        <div class="box-body">
          <div class="row">

        <div class="col-lg-12 col-xs-12">
          <button type="button" class="btn btn-primary" id="btnNuevo">Nuevo</button>
 

   </div>
   

      
      
          </div>

        </div>

        <!-- /.box-body -->
      </div>



<div id="tabla">
  @include('alumno.tabla');
</div>

		</div>
	</div>

  <div class="modal fade" id="modalAlumno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="mTitulo">Modal title</h4>
      </div>
      <div class="modal-body">
      <input type="hidden" id="idalum" value="0">
      <div class="row">

      <div class="col-md-3">
          Código:*
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="código" id="txtcod" maxlength="30">
          </div>
        </div>

        <div class="col-md-1">
          DNI:*
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="DNI" id="txtdni" onkeypress="return soloNumeros(event);" maxlength="8">
          </div>
        </div>

        <div class="col-md-3">
          Nombres:*
        </div>
        <div class="col-md-9">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Nombres" id="txtnom" maxlength="224">
          </div>
        </div>

        <div class="col-md-3">
          Apellidos:*
        </div>
        <div class="col-md-9">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Apellidos" id="txtape" maxlength="224">
          </div>
        </div>

        <div class="col-md-3">
          Genero:*
        </div>
        <div class="col-md-9">
          <div class="form-group">
          <select id="cbugenero" class="form-control">
            <option value="0">Seleccione...</option>
            <option value="1">Varón</option>
            <option value="2">Mujer</option>
          </select>

          </div>
        </div>

        <div class="col-md-3">
          Semestre que cursa:*
        </div>
        <div class="col-md-9">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="I,II..." id="txtseme" maxlength="100">
          </div>
        </div>

        <div class="col-md-3">
          Teléfono:
        </div>
        <div class="col-md-9">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Ej. 999 9999" id="txtfono" maxlength="25">
          </div>
        </div>

        <div class="col-md-3">
          Dirección:
        </div>
        <div class="col-md-9">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Av. Jr. Psje." id="txtdir" maxlength="1000">
          </div>
        </div>

        <div class="col-md-3">
          email:*
        </div>
        <div class="col-md-9">
          <div class="form-group">
            <input type="email" class="form-control" placeholder="email@dominio.com/net" id="txtmail" required="true" maxlength="224">
          </div>
        </div>

        <div class="col-md-3">
          usuario:*
        </div>
        <div class="col-md-9">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="username" id="txtuser" maxlength="224">
          </div>
        </div>

        <div class="col-md-3">
          Password:*
        </div>
        <div class="col-md-9">
          <div class="form-group">
            <input type="password" class="form-control" placeholder="********" id="txtpsw" maxlength="224">
          </div>
        </div>

        <div class="col-md-3">
          Imagen de Perfil: (opcional) <br>
          85 X 85 pixeles
        </div>
        <div class="col-md-9">
          <div class="form-group">

        <div class="col-md-12">
          El tamaño máximo de la imagen es de 100 kb equivalente a 100 000 bytes.
        </div>
            <form enctype="multipart/form-data" class="formarchivo" id="formulario" name="formulario">
          <input name="archivo" type="file" id="archivo" class="archivo form-control"
          accept=".png, .jpg, .jpeg, .gif, .PNG, .JPG, .JPEG, .GIF"/><br /><br />

          <input type="hidden" name="ocudni" id="ocudni" value="0" >
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
             </form>
          </div>
        </div>

        <div class="col-xs-12" id="msjFile"></div>

      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarN">Guardar Nuevo</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="modalAlumnoE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" id="mdialTamanio">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="mTituloE">Modal title</h4>
      </div>
      <div class="modal-body">
      
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" id="tokenLaravel">
      <div class="row" id="formuEditar">



       
      </div>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>











@endsection
