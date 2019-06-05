<div class="box">
        <div class="box-header">
          <h3 class="box-title"><i class="fa fa-users"></i> Gestión de Asignación de Tutores</h3>
          <a href="{{ URL::to('home') }}" style="float: right;"><button type="button" class="btn btn-default"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button></a>
        </div>
        <div class="box-body">
          <div class="row">

        <div class="col-lg-12 col-xs-12">
          @php
            $auxS=0;
          @endphp

          @foreach($semestre as $dato)
          Semestre Académico Activo: <span class="label label-primary" style="font-size: 100%;">{{$dato->nomsem}}</span>
          @php
            $auxS=1;
          @endphp
          @endforeach
          

          @if($auxS==0)
            <span class="label label-danger" style="font-size: 100%;">No Existe semestre académico Activo, vaya a Gestión de Semestres: </span> <a href="{{ URL::to('semestres') }}">Gestión de Semestres</a>
          @endif

   </div>
   

      
      
          </div>

        </div>

        <!-- /.box-body -->
      </div>
