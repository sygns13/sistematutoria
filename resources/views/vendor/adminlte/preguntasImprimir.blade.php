@php
$cont=1;
@endphp


@foreach($preguntas as $dato)

<p>{{$cont}}.- {{$dato->pregunta}}</p>
@php
$cont++;
@endphp

@endforeach