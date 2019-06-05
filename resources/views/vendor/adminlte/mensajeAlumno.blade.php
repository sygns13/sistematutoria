@php
$auxFotoT="0";
$auxFotoA="0";

$abrioT="0";
$abrioA="0";

@endphp

@foreach($chat as $msj)



@if($msj->idtu=="3")

@if($auxFotoA=="1")
</div>
@endif

@if($auxFotoT=="0")

                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">{{$msj->nombre}}: {{$msj->apellidos}}, {{$msj->nombres}} </span>
                    <span class="direct-chat-timestamp pull-right">{{$msj->fecha}} {{$msj->hora}}</span>
                  </div>
                  <!-- /.direct-chat-info -->


                    @if($msj->imagen=="" || $msj->imagen==null)
  @if($msj->genero=="1")
<img class="direct-chat-img" src="{{ asset('/img/av3.png')}}" style="width: 40px;height: 40px;"  alt="Message User Image">
  @elseif($msj->genero=="2")
<img class="direct-chat-img" src="{{ asset('/img/av2.png')}}" style="width: 40px;height: 40px;" alt="Message User Image">
  @elseif($msj->genero==null)
<img class="direct-chat-img" src="{{ asset('/img/av3.png')}}" style="width: 40px;height: 40px;"  alt="Message User Image">
  @endif
 @else

  @php
 $ruta="/img/perfilTutores/".$msj->imagen;
 @endphp

 <img class="direct-chat-img" src="{{ asset($ruta)}}" style="width: 40px;height: 40px;"  alt="Message User Image">

 @endif


                  


 <div class="direct-chat-text">
{{$msj->mensaje}}
</div>

@php
$auxFotoA="0";
$auxFotoT="1";
@endphp


@else
 <div class="direct-chat-text">
{{$msj->mensaje}}
</div>

@endif


@elseif($msj->idtu=="4")

@if($auxFotoT=="1")
</div>
@endif


@if($auxFotoA=="0")

  <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right">{{$msj->nombre}}: {{$msj->apellidos}}, {{$msj->nombres}}</span>
                    <span class="direct-chat-timestamp pull-left">{{$msj->fecha}} {{$msj->hora}}</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  

                     


@if($msj->imagen==""|| $msj->imagen==null)

                        @if($msj->genero=="1")

                        <img class="direct-chat-img" src="{{ asset('/img/av3.png')}}" style="width: 40px;height: 40px;"  alt="Message User Image">
                

                        @elseif($msj->genero=="2")

                        <img class="direct-chat-img" src="{{ asset('/img/av2.jpg')}}" style="width: 40px;height: 40px;"  alt="Message User Image">
                          @elseif($msj->genero==null)
                            <img class="direct-chat-img" src="{{ asset('/img/av3.png')}}" style="width: 40px;height: 40px;"  alt="Message User Image">
                        @endif
                       @else

                       <img class="direct-chat-img" src="{{ asset($msj->imagen)}}" style="width: 40px;height: 40px;"  alt="Message User Image">

                       @endif



                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    {{$msj->mensaje}}
                  </div>

@php
$auxFotoT="0";
$auxFotoA="1";
@endphp


@else
 <div class="direct-chat-text">
                    {{$msj->mensaje}}
                  </div>

@endif



@endif

@endforeach

@if($auxFotoT=="1")
</div>
@endif
@if($auxFotoA=="1")
</div>
@endif
