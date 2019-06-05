 @php
$aux="0";
@endphp
@foreach($evaluacions as $eval)
@php
$aux="1";
@endphp
  <option value="{{$eval->idDiag}}">{{$eval->deseval}}  -  {{$eval->nomdiag}}</option>
@endforeach


  @if($aux=="0")
    <option value="0">No hay Evaluaciones con Diagnósticos en la etapa de la tutoría elegida</option>
  @endif