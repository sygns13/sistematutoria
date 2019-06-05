@extends('adminlte::layouts.appSemestre')

@section('htmlheader_title')
	Semestres
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">

     <div class="box">
        <div class="box-header">
          <h3 class="box-title"><i class="fa fa-calendar"></i> Gestión de Semestres Académicos</h3>
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




        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Lista de Semestres</h3>
          </div>
          <div class="box-body">
             <table class="table table-bordered table-hover" id="tabla1">
                <caption>Relación de Periodos</caption>
                <thead>
                  <tr>
                    {{-- <th class="sorting_asc">id</th> --}}
                    <th>Nombre</th>
                    <th>Fecha Inicial</th>
                    <th>Fecha Final</th>
                    <th>Estado</th>
                    <th width="16%">Gestión</th>
                  </tr>
                </thead>
                <tbody id="cuerpoTable">
                  @foreach($semestre as $dato)
                    <tr>
                      <td>{{$dato->nomsem}}</td>

                      <?php
                      $fechaini=substr($dato->inisem, -2).'/'.substr($dato->inisem, -5,2).'/'.substr($dato->inisem, -10,4);

                      $fechafin=substr($dato->finsem, -2).'/'.substr($dato->finsem, -5,2).'/'.substr($dato->finsem, -10,4);

                      echo'<td>'.$fechaini.'</td>
                           <td>'.$fechafin.'</td>';


                        if($dato->activo==0){
                          echo'<td>
                          <center><span class="label label-primary">Cerrado</span></center>
                          </td>';
                          echo'<td>
                          <button class="btn btn-warning" id="btnEditar" onclick="editarSem('.$dato->id.');"><i class="fa fa-cogs"></i></button>
                          <button class="btn btn-danger" id="btnDelete" onclick="deleteSem('.$dato->id.');"><i class="fa fa-trash"></i></button>

                          </td>';
                        }

                        else{
                          echo'<td>
                          <center><span class="label label-success">Activo</span></center>
                          </td>';
                          echo'<td>
                          <button class="btn btn-warning" id="btnEditar" onclick="editarSem('.$dato->id.');"><i class="fa fa-cogs"></i></button>
                          <button class="btn btn-danger" id="btnDelete" onclick="deleteSem('.$dato->id.');"><i class="fa fa-trash"></i></button>
                          <button class="btn btn-info" id="btnCerrar" onclick="cerrarSem('.$dato->id.');">Cerrar</button></td>';
                        }

                      ?>

                   

                    </tr>
                  @endforeach

                </tbody>
              </table>

          </div>

        </div>



     

		</div>
	</div>

  <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="mEditartitulo">Modal title</h4>
      </div>
      <div class="modal-body">
      <input type="hidden" id="seme" value="0">
      <div class="row">

        <div class="col-md-4">
          Nombre:
        </div>
        <div class="col-md-8">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Nombre del Semestre" id="txtnombre">
          </div>
        </div>

        <div class="col-md-4">
          Fecha de Inicio:
        </div>
        <div class="col-md-8">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="dd/mm/aaaa" id="txtfechaini" onKeyPress="return noEscribe(event);">
          </div>
        </div>

        <div class="col-md-4">
          Fecha Final:
        </div>
        <div class="col-md-8">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="dd/mm/aaaa" id="txtfechafin" onKeyPress="return noEscribe(event);">
          </div>
        </div>


      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarN">Guardar Nuevo</button>
        <button type="button" class="btn btn-primary" id="btnGuardarE">Guardar</button>
      </div>
    </div>
  </div>
</div>


@endsection
