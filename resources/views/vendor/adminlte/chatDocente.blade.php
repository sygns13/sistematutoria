        <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Chat Directo Alumno: {{$alumno->apellidos}}, {{$alumno->nombres}}</h3>

              <div class="box-tools pull-right">
               {{--   <span data-toggle="tooltip" title="0 New Messages" class="badge bg-light-blue">0</span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                  <i class="fa fa-comments"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="padrePaneChat">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages" id="PanelChatDirecto">
                <!-- Message. Default to the left -->

@php
$auxFotoT="0";
$auxFotoA="0";

$abrioT="0";
$abrioA="0";

@endphp

@foreach($chat as $msj)



@if($msj->idtu=="4")

@if($auxFotoT=="1")
</div>
@endif

@if($auxFotoA=="0")

                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">{{$msj->nombre}}: {{$msj->apellidos}}, {{$msj->nombres}} </span>
                    <span class="direct-chat-timestamp pull-right">{{$msj->fecha}} {{$msj->hora}}</span>
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


@elseif($msj->idtu=="3")

@if($auxFotoA=="1")
</div>
@endif


@if($auxFotoT=="0")

  <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right">{{$msj->nombre}}: {{$msj->apellidos}}, {{$msj->nombres}}</span>
                    <span class="direct-chat-timestamp pull-left">{{$msj->fecha}} {{$msj->hora}}</span>
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





                  <!-- /.direct-chat-img -->
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



@endif

@endforeach

@if($auxFotoT=="1")
</div>
@endif
@if($auxFotoA=="1")
</div>
@endif




              </div>
              <!--/.direct-chat-messages-->

              <!-- Contacts are loaded here -->
              <div class="direct-chat-contacts">
                <ul class="contacts-list">
                  <li>
                    <a href="#">



                       <img class="contacts-list-img" src="{{ asset('/img/av3.png')}}" style="width: 40px;height: 40px;" alt="User Image">


                      <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              Count Dracula
                              <small class="contacts-list-date pull-right">2/28/2015</small>
                            </span>
                        <span class="contacts-list-msg">How have you been? I was...</span>
                      </div>
                      <!-- /.contacts-list-info -->
                    </a>
                  </li>
                  <!-- End Contact Item -->
                </ul>
                <!-- /.contatcts-list -->
              </div>
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            
                <div class="input-group">

<input type="hidden" name="chattxtidta" id="chattxtidta" value="{{$idTA}}">
<input type="hidden" name="idLastMsj" id="idLastMsj" value="{{$idLastMsj}}">

<input type="text" name="message" placeholder="Ingrese su Mensaje ..." class="form-control" id="txtMsjChat" onkeypress="enviarEnter(this,event);">
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-primary btn-flat" id="btnEnviarChat" onclick="enviarMsj();">Enviar</button>
                      </span>
                </div>
             
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
        </div>