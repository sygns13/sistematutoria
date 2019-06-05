@foreach($tarea as $dato)




<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Evaluación Base de la Tarea:</strong>{{$dato->deseval}}
</div>

<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Diagnóstico Base de la Tarea:</strong>{{$dato->nomdiag}}
</div>

<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Fecha Máxima de Entrega :</strong>{{pasFechaVista($dato->fechatarea)}}
</div>

<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Estado de la Tarea:</strong>

	@if(strval($dato->tareaestado)=="1")
                        Tarea Enviada al Alumno, El alumno aún no revisa la tarea.
                         @elseif(strval($dato->tareaestado)=="2")
                        Tarea Vista por el Alumno, Tarea sin envío de respuesta del alumno.
                        @elseif(strval($dato->tareaestado)=="3")
                        Tarea Resuelta por el Alumno, Sin Calificación del Tutor.
                        @elseif(strval($dato->tareaestado)=="4")
                         Tarea Resuelta por el Alumno, Calificada por el Tutor.
                        @endif


</div>

<div class="col-md-12" style="padding-bottom: 10px;">
	<strong>Descripción de la Tarea:</strong>
<br>
@php
echo $dato->desctarea;
@endphp
	
</div>
@endforeach