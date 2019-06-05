<div class="box">
        <div class="box-header">
          <h3 class="box-title"><i class="fa fa-cogs"></i> Gestión del banco de Preguntas</h3>
          <a href="{{ URL::to('home') }}" style="float: right;"><button type="button" class="btn btn-default"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button></a>
        </div>
        <div class="box-body">
          <div class="row">

        <div class="form-group">
        <div class="col-sm-12">

        @if($auxE==0)
        No se han creado las Etapas de la Tutoria, Para gestionar el banco de Preguntas es necesario crearlas:  <a href="{{ URL::to('etapas') }}"><span class="label label-danger" style="font-size: 100%;">Gestión de Etapas</span></a>
        @elseif($auxD==0)
        No se han creado las Dimensiones Personales de la Tutoria, Para gestionar el banco de Preguntas es necesario crearlas  <a href="{{ URL::to('dimensions') }}"><span class="label label-danger" style="font-size: 100%;">Gestión de Dimensiones</span></a>
        @else

        <div class="form-group" style="padding-bottom: 50px;">
            <label for="cbutipodoc" class="col-sm-2 control-label">ETAPA:</label>
           <div class="col-sm-10">
            <select class="form-control" style="width: 100%;" id="cbuEtapa" onchange="selEtapa();">
                 @foreach($etapas as $dato)
                  @if($idE==$dato->id)
                 <option value="{{$dato->id}}" selected>{{$dato->nometapa}}</option>
                 @else
                  <option value="{{$dato->id}}">{{$dato->nometapa}}</option>
                 @endif
                 @endforeach
                </select>

          </div>
          </div>


          <div class="form-group" style="padding-bottom: 50px;">
            <label for="cbutipodoc" class="col-sm-2 control-label">Dimension:</label>
           <div class="col-sm-10">
            <select class="form-control" style="width: 100%;" id="cbuDimension" onchange="selDimension();">
                 @foreach($dimensiones as $dato)
                  @if($idD==$dato->id)
                 <option value="{{$dato->id}}" selected>{{$dato->nomdimen}}</option>
                 @else
                  <option value="{{$dato->id}}">{{$dato->nomdimen}}</option>
                 @endif
                 @endforeach
                </select>

          </div>
          </div>

          <input type="hidden" name="idE" id="idE" value="{{$idE}}">
          <input type="hidden" name="idD" id="idD" value="{{$idD}}">
          <div class="form-group">
           <div class="col-sm-3">
          <button type="button" class="btn btn-primary" id="btnNuevo" onclick="nuevaPregunta();">Nueva Pregunta</button>
          </div>
          </div>
         
  @endif

   </div>
   </div>
   

      
      
          </div>

        </div>

        <!-- /.box-body -->
      </div>
