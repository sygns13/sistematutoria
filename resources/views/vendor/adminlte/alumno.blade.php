@extends('adminlte::layouts.appAlumnoLogin')
@section('htmlheader_title')
  Inicio
@endsection
@section('main-content')
<style type="text/css">
    #mdialTamanio{
  width: 70% !important;
}
#mdialTamanio1{
  width: 70% !important;
}#mdialTamanio2{
  width: 70% !important;
}
</style>
 <input type="hidden" name="_token" value="{{csrf_token()}} " id="tokenLaravel">
<div class="container-fluid spark-screen">
    <div class="row">
        @if(accesoUser([4]))
        <div class="col-md-3" id="divTama3">
            @include('adminlte::alumnoPerfil0')
        </div>

        <div class="col-md-9" id="divTama9">
            @include('adminlte::alumnoPerfil1')
        </div>

        <div id="divEval"></div>
        <div id="divChatAlum"></div>
        @endif
    </div>
</div>
@endsection
