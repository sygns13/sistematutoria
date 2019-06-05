@foreach($sesion as $dato)




<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Evaluación Base de la Sesión:</strong>{{$dato->deseval}}
</div>

<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Diagnóstico Base de la Sesión:</strong>{{$dato->nomdiag}}
</div>

<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Fecha de la Sesión:</strong>{{pasFechaVista($dato->fechasesion)}}
</div>

<div class="col-md-12" style="padding-bottom: 10px;">
        <strong>Hora de la Sesión:</strong>{{$dato->horasesion}}
</div>

<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Estado de la Sesión:</strong>

	@if(strval($dato->estadosesion)=="1")

                            @if(strval($dato->sesionPasada)=="1")
                            Sesión Caducada Pendiente de Calificación
                            @else
                            Sesión Programada
                            @endif
                        
                         @elseif(strval($dato->estadosesion)=="2")
                                Sesión Realizada
                        @elseif(strval($dato->estadosesion)=="3")
                                Sesión Cancelada, debido a {{$dato->resultSesion}}
                        @elseif(strval($dato->estadosesion)=="0")
                                Sesión No Realizada, debido a {{$dato->resultSesion}}
                        @endif


</div>

<div class="col-md-12" style="padding-bottom: 10px;">
        <strong>Tipo de Sesión:</strong>
@if(strval($dato->tiposesion)=="1")
                        Presencial
                        @elseif(strval($dato->tiposesion)=="2")
                        Virtual Mediante la aplicación Chat en el Sistema
                        @endif


</div>

<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Detalles de la Sesión:</strong>
<br>
@php
echo $dato->detallesSesion;
@endphp
	
</div>
@endforeach