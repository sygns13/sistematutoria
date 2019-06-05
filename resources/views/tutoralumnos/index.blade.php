@extends('adminlte::layouts.appTutores')

@section('htmlheader_title')
	Gestión del Banco de Preguntas
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
  @include('tutoralumnos.controles')
</div>   


<div id="tabla">
  @include('tutoralumnos.tabla')
</div>

		</div>
	</div>




@endsection
