@extends('adminlte::layouts.appEtapas')

@section('htmlheader_title')
	Gestión de Etapas
@endsection

<style type="text/css">         
          
#mdialTamanio{
  width: 80% !important;
}
</style>



@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
<input type="hidden" name="_token" value="{{csrf_token()}}" id="idToken">
 <div id="controles">
  @include('etapas.controles')
</div>   

<div id="formDatos" style="display: none;">
  @include('etapas.formulario')
</div> 




<div id="tabla">
  @include('etapas.tabla')
</div>

		</div>
	</div>

<div class="modal fade bs-example-modal-lg" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document" id="mdialTamanio">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="desEditarTitulo" style="font-weight: bold;text-decoration: underline;">EDITAR ETAPA: </h4>

      </div> 
      <div class="modal-body">
      <input type="hidden" id="idEta" value="0">


      <div class="row">

      <div class="box" id="o" style="border:0px; box-shadow:none;" >
            <div class="box-header with-border">
              <h3 class="box-title" id="boxTitulo">ETAPA: </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="FormularioEditar"> 
                {{-- -@include('persona.formulario') --}}
            </div>
          </div>



      </div>
      </div>
      <div class="modal-footer" >
        <button type="button" class="btn btn-info" id="btnGuardarE" onclick="seguroSave1();">Guardar</button>

      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar</button>

      </div>
    </div>
  </div>
</div>




@endsection
