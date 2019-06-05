      @foreach($tutor as $dato)
     
        <div class="box box-info" style="border-bottom: 0px;">
             <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;">Mi Perfil</h3></center>
              <button style="float: right;" type="button" class="btn btn-default" onclick="homePerfil();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

                  <input type="hidden" id="idPerEdit" value="{{$dato->idper}}">
                  <input type="hidden" id="idTutEdit" value="{{$dato->idtutor}}">
                  <input type="hidden" id="idUsuEdit" value="{{$dato->idusu}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" id="idToken">
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body" style="border-bottom: 0px;">

                <div class="col-md-8" >
                  <form class="form-horizontal">
                <h3 class="profile-username text-center" style="padding-bottom: 40px;padding-top: 10px;">Datos Personales</h3>
              
           


                <div class="form-group">
                  <label for="cbutipodocE" class="col-sm-2 control-label">Tipo Doc:*</label>

                  <div class="col-sm-4">
                  <select class="form-control" id="cbutipodocE">

                  @if($dato->tipodoc=="1")
                    <option value="1">DNI</option>
                    <option value="2">Carnet de Extranjería</option>
                  @elseif($dato->tipodoc=="2")
                    <option value="1">DNI</option>
                    <option value="2" selected>Carnet de Extranjería</option>
                  @else
                    <option value="1">DNI</option>
                    <option value="2">Carnet de Extranjería</option>
                  @endif
                    
                  </select>
                   </div>
                  <label for="txtDNIE" class="col-sm-2 control-label">Número:*</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="txtDNIE" placeholder="DNI/CE" maxlength="15" onkeypress="return soloNumeros(event);" value="{{$dato->dni}}">
                  </div>
                 

                </div>

           


                <div class="form-group">
                  <label for="txtnomE" class="col-sm-2 control-label">Nombres:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtnomE" placeholder="Nombres" maxlength="500" value="{{$dato->nombres}}" onkeyup="EscribeLetras(event,this);">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtapeE" class="col-sm-2 control-label">Apellidos:*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtapeE" placeholder="Apellidos" maxlength="500" value="{{$dato->apellidos}}" onkeyup="EscribeLetras(event,this);">
                  </div>
                </div>


                <div class="form-group">
                  <label for="cbugeneroE" class="col-sm-2 control-label">Genero:*</label>

                  <div class="col-sm-4">
                  <select class="form-control" id="cbugeneroE">
                  @if($dato->genero=="1")
                    <option value="0">Seleccione...</option>
                    <option value="1" selected>Varón</option>
                    <option value="2">Mujer</option>
                  @elseif($dato->genero=="2")
                    <option value="0">Seleccione...</option>
                    <option value="1">Varón</option>
                    <option value="2" selected>Mujer</option>
                  @else
                    <option value="0">Seleccione...</option>
                    <option value="1">Varón</option>
                    <option value="2">Mujer</option>
                  @endif
                    
                  </select>
                  </div>
                

                <label for="txttelfE" class="col-sm-2 control-label">Teléfono:</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="txttelfE" placeholder="Ej. 043-123456" maxlength="50" value="{{$dato->telf}}" onkeyup="EscribeLetras(event,this);">
                  </div>

                  
                </div>


    




                <div class="form-group">
                  <label for="txtdirE" class="col-sm-2 control-label">Dirección:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtdirE" placeholder="Av. Jr. Psje." maxlength="500" value="{{$dato->direccion}}" onkeyup="EscribeLetras(event,this);">
                  </div>




                </div>


                <div class="form-group">
                  <label for="txtespE" class="col-sm-2 control-label">Especialidad.</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtespE" placeholder="Especialidad en su Carrera Universitaria" maxlength="500" value="{{$dato->esptutor}}" onkeyup="EscribeLetras(event,this);">
                  </div>         
                </div>


                <div class="form-group">
                  <label for="txtVideoE" class="col-sm-2 control-label">Video de Presentación:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtVideoE" placeholder="Iframe del Video" maxlength="2000" value="{{$dato->video}}">
                  </div>
                </div>

                <div class="form-group" style="margin-left: 20px;margin-top: 40px;">
                  <button type="button" class="btn btn-info" id="btnGuardarE1" onclick="seguroSave1();">Guardar</button>
                  <input type="reset" class="btn btn-default" id="btnCancelE1" value="Cancelar" >
                  
                </div>

               
                </form>
              </div>

              <div class="col-md-4" style="border-left: 3px solid rgba(60, 141, 188, 0.48);">
              <h3 class="profile-username text-center" style="padding-top: 10px;">Imagen De Perfil</h3>
  {{--           <img src="{{ asset('/img/av3.png')}}" id="imgPerfilE" class="profile-user-img img-responsive img-circle" alt="Imagen del usuario" style="height: 80px;width: 80px;"  />--}}

@php
$fotoe="";
@endphp

              @if($dato->imagen=="" || $dato->imagen==null)

                        @if($dato->genero=="1")
                          <img src="{{ asset('/img/av3.png')}}" class="profile-user-img img-responsive img-circle" alt="Imagen del usuario" style="height: 80px;width: 80px;" id="imgPerfilE" />
                          @php
                          $fotoe="av3.png";
                          @endphp

                        @elseif($dato->genero=="2")
                          <img src="{{ asset('/img/av2.jpg')}}" class="profile-user-img img-responsive img-circle" alt="Imagen del usuario" style="height: 80px;width: 80px;" id="imgPerfilE" />
                          @php
                          $fotoe="av2.jpg";
                          @endphp

                        @elseif($dato->genero==null)
                          <img src="{{ asset('/img/av3.png')}}" class="profile-user-img img-responsive img-circle" alt="Imagen del usuario" style="height: 80px;width: 80px;" id="imgPerfilE" />
                          @php
                          $fotoe="av3.png";
                          @endphp
                        @endif
                       @else
                        @php
                       $ruta="/img/perfilTutores/".$dato->imagen;
                        $fotoe=$dato->imagen;
                       @endphp
                         <img src="{{ asset($ruta)}}" class="profile-user-img img-responsive img-circle" alt="Imagen del usuario" style="height: 80px;width: 80px;" id="imgPerfilE" />
                       @endif


            

 

              

              <p class="text-muted text-center">Imagen De Perfil</p>



          <form enctype="multipart/form-data" class="formarchivoE" id="formularioE" name="formularioE">

          <input name="archivoE" type="file" id="archivoE" class="archivo form-control"
          accept=".png, .jpg, .jpeg, .gif, .PNG, .JPG, .JPEG, .GIF" onchange="cambioImagen();" /><br /><br />

          <input type="hidden" name="efoto" id="efoto" value="{{$fotoe}}">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <input type="hidden" name="nomImgE" id="nomImgE" value="{{$fotoe}}">
      
          <div class="form-group">  
             <button type="button" class="btn btn-info" id="btnGuardarE2" onclick="seguroSave3();">Guardar</button>
             <input type="reset" class="btn btn-default" id="btnCancel" value="Cancelar" onclick="cancelImg();">
          </div>

          <div class="col-sm-12" id="msjFileE"></div>

          
             </form>

             <hr>

             <form role="form">
             <h3 class="profile-username text-center">Datos De Usuario</h3>
              <div class="box-body">
                <div class="form-group">
                  <label for="txtmailE">Email:*</label>
                  <input type="text" class="form-control" id="txtmailE" placeholder="email@dominio.com/net" maxlength="500" value="{{$dato->email}}" onkeyup="EscribeLetras(event,this);">
                </div>
                <div class="form-group">
                  <label for="txtuserE">Usuario:*</label>
                  <input type="text" class="form-control" id="txtuserE" placeholder="username" maxlength="225" value="{{$dato->name}}" onkeyup="EscribeLetras(event,this);">
                </div>
                <div class="form-group">
                  <label for="txtpswE">Password:*</label>
                  <input type="password" class="form-control" id="txtpswE" placeholder="Password" maxlength="225" >
                </div>

                <div class="form-group" style="margin-top: 40px;">
                  <button type="button" class="btn btn-info" id="btnGuardarE3" onclick="seguroSave2();">Guardar</button>
                  <input type="reset" class="btn btn-default" id="btnCancelE3" value="Cancelar" >
                  
                </div>
  

              </div>
              <!-- /.box-body -->

   
            </form>


            </div>

          </div>

              <!-- /.box-body -->
            
              <!-- /.box-footer -->
           

          </div>

      </div>

      <script type="text/javascript">
        function seguroSave1() {
  swal({
  title: '¿Estás seguro?',
  text: "Desea editar este registro: ",
  type: 'info',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, editar'
}).then(function () {

        guardarEditar1();



})
}


function guardarEditar1()
{

    var v1=$("#cbutipodocE").val();
    var v2=$("#txtDNIE").val();
    var v3=$("#txtnomE").val();
    var v4=$("#txtapeE").val();
    var v5=$("#cbugeneroE").val();
    var v6=$("#txttelfE").val();
    var v7=$("#txtdirE").val();
    var v8=$("#txtespE").val();
    var v9=$("#txtVideoE").val();


   

    if(v2.length<8){
                    swal({
                      title: '',
                      text: 'Ingrese el número de DNI o CE del Docente',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                $("#txtDNIE").focus();
                }

                else{

                    if(v3.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese el nombre del Docente',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                    $("#txtnomE").focus();
                    }

                    else{

                      if(v4.length=="0"){
                        swal({
                      title: '',
                      text: 'Ingrese el apellido del Docente',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                    $("#txtapeE").focus();

                      }
                        else{
                            if(v5==0){
                        swal({
                          title: '',
                          text: 'Seleccione el género del Docente',
                          type: 'warning',
                          confirmButtonText: 'Aceptar'
                        });
                            $("#cbugeneroE").focus();
                            }

                            else{

                                if(v8.length==0){
                                    swal({
                                      title: '',
                                      text: 'Ingrese la Especialidad del Docente',
                                      type: 'warning',
                                      confirmButtonText: 'Aceptar'
                                    });
                                $("#txtespE").focus();
                                }

                                else{

                                    
                                           
 
//alert("eureca");

saveEdit1(v1,v2,v3,v4,v5,v6,v7,v8,v9);
                                                    

     


                                    }


                                    }


                            }


                    }


                }

      

} 


function saveEdit1(v1,v2,v3,v4,v5,v6,v7,v8,v9) {

  var idPer=$("#idPerEdit").val();
  var idTuto=$("#idTutEdit").val();
  var idUsu=$("#idUsuEdit").val();
  
   var datosPersonal = [];

   datosPersonal[0]=v1;//Tipo de Doc
   datosPersonal[1]=v2;//DNI
   datosPersonal[2]=v3;//nombres
   datosPersonal[3]=v4;//apellidos
   datosPersonal[4]=v5;//genero
   datosPersonal[5]=v6;//telf
   datosPersonal[6]=v7;//dir
   datosPersonal[7]=v8;//esp
   datosPersonal[8]='';//video
   datosPersonal[9]=idPer;//idPersona
   datosPersonal[10]=idTuto;//idTutor
   datosPersonal[11]=idUsu;//iduser



   var array1 = JSON.stringify(datosPersonal);
  var token=$("#idToken").val();
  var buscar=$("#txtBuscar").val();
  var posi=$("#txtposi").val();
  $.post( "tutors/edit1", {array:array1, v:v9, _token:token}).done(function(data) {



                if(data.html=="0")
                {
                
                swal({
                      title: 'Actualizado',
                      text: 'Se modificaron los Datos Personales Satisfactoriamente',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

                }

                if(data.html=="1")  
                {
                    swal({
                      title: '',
                      text: data.msj,
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                    $(data.selector).focus();
                }



       

    });

}


function seguroSave2() {
  swal({
  title: '¿Estás seguro?',
  text: "Desea editar este registro: ",
  type: 'info',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, editar'
}).then(function () {

        guardarEditar2();



})
}

function guardarEditar2()
{
    var v1=$("#txtmailE").val();
    var v2=$("#txtuserE").val();
    var v3=$("#txtpswE").val();


     if(v1.length==0){

                swal({
              title: '',
              text: 'Ingrese email del Docente',
              type: 'warning',
              confirmButtonText: 'Aceptar'
            });
                $("#txtmailE").focus();
            }
            else{

                if(v2.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese el nombre de usuario del Docente',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                $("#txtuserE").focus();
                }

                else{

                    if(v3.length==0){
                    swal({
                      title: '',
                      text: 'Ingrese el password del Docente',
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                    $("#txtpswE").focus();
                    }

                    else{//aca


  var token=$("#idToken").val();

  var idPer=$("#idPerEdit").val();
  var idTuto=$("#idTutEdit").val();
  var idUsu=$("#idUsuEdit").val();
  

  $.post( "tutors/edit2", {idp:idPer, idt:idTuto,idU:idUsu,mail:v1, user:v2, psw:v3, _token:token}).done(function(data) {



                if(data.html=="0")
                {
                
                swal({
                      title: 'Actualizado',
                      text: 'Se modificaron los Datos Satisfactoriamente',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

                }

                if(data.html=="1")  
                {
                    swal({
                      title: '',
                      text: data.msj,
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                    $(data.selector).focus();
                }



       

    });
                     
                    }


                }

            }

} 

function cambioImagen()
{
  var rutaimg="";

     fileExtension = ""; 
     fileName = ""; 
     fileSize ="";
        //obtenemos un array con los datos del archivo
        var file = $("#archivoE")[0].files[0];
        //obtenemos el nombre del archivo
        fileName = file.name;
        //obtenemos la extensión del archivo
        fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
        //obtenemos el tamaño del archivo
        fileSize= file.size;
        //obtenemos el tipo de archivo image/png ejemplo
        var fileType = file.type;
        //mensaje con la información del archivo
        //$("#msjHC").html("<span class='info'>Imagen para subir: "+fileName+", peso total: "+fileSize+" bytes.</span>");

        var tamañoMostrar=redondear(parseFloat(fileSize)/1000);


        var formData = new FormData($("#formularioE")[0]);

if(isImage(fileExtension)){
    if(fileSize<=2048000){


        $.ajax({
            url: 'tutors/imagenE',  
            type: 'POST',
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
                $("#msjFileE").html(''+
              '<div class="alert alert-warning alert-dismissable">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Imagen:</strong> Subiendo la imagen, por favor espere...</div></div>');
                        
            },
            //una vez finalizado correctamente
            success: function(data){

              //res=$.parseJSON(data);
              //rutaimg=data;

               /* $("#msjFile").html(''+
              '<div class="alert alert-success alert-dismissible">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Exito:</strong> Documentp subido exitosamente '+rutaimg+'</div></div>');*/

                alertify.success('Imagen subida Exitosamente');

                $("#imgPerfilE").attr("src","/img/perfilTutores/"+data+"");



                $("#msjFileE").html(''+
'<div class="alert alert-info alert-dismissable">'+
'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
'<strong>Imagen de Perfil:</strong> '+fileName+', peso total: '+parseFloat(tamañoMostrar).toFixed(2)+' Kb.</div></div>');
               
        
                $("#nomImgE").val(data);

                
            },
            //si ha ocurrido un error
            error: function(data){
                 $("#msjFileE").html(''+
              '<div class="alert alert-danger alert-dismissable">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Error:</strong> del sistema, no se subio el archivo</div></div>'+data);

                 $('#formularioE').each (function(){                            
                              this.reset();                            
            });
                    
            }
        });








  }
      else{

        $("#msjFileE").html(''+
              '<div class="alert alert-danger alert-dismissable">'+
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                '<strong>Error:</strong> no se subio el archivo. El peso de la imagen '+fileName+' es superior a los 2 mb</div></div>');
        $('#formularioE').each (function(){                            
                              this.reset();                            
            });

      }


  }

  else{
      swal({
          title: '',
          text: 'El archivo '+fileName+' no es una imagen',
          type: 'warning',
          confirmButtonText: 'Aceptar'
        });

      $('#formularioE').each (function(){                            
                              this.reset();                            
            });
}
}


$('#modalEditar').on('hidden.bs.modal', function () {

       // $("body").css({ "overflow-y": "hidden" });
       cancelImg();

        });

function cancelImg()
{
  var fotoe=$("#efoto").val();
  var nomimg=$("#nomImgE").val();


  if(fotoe!=nomimg)
  {
    var token=$("#idToken").val();
    $("#imgPerfilE").attr("src","/img/perfilTutores/"+fotoe+"");
   $.post( "tutors/borrarimagen", {img:nomimg, _token:token}).done(function(data) {
    $("#nomImgE").val(fotoe);

  });
  }
}

function seguroSave3() {
  swal({
  title: '¿Estás seguro?',
  text: "Desea editar la imagen de perfil: ",
  type: 'info',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, editar'
}).then(function () {

        guardarEditar3();



})
}

function guardarEditar3()
{
                
  var fotoe=$("#efoto").val();
  var nomimg=$("#nomImgE").val();

  var token=$("#idToken").val();
  var idPer=$("#idPerEdit").val();
  var idTuto=$("#idTutEdit").val();
  var idUsu=$("#idUsuEdit").val();
  


  $.post( "tutors/edit3", {idp:idPer, idt:idTuto,idU:idUsu,foto:nomimg,  _token:token}).done(function(data) {

       if(fotoe!=nomimg)
          {

            if(fotoe!="av2.jpg" && fotoe!="av3.png"){

   $.post( "tutors/borrarimagen", {img:fotoe, _token:token}).done(function(data) {
    $("#efoto").val(nomimg);

          });

   }
          }

                if(data.html=="0")
                {


                 $('#formularioE').each (function(){                            
                              this.reset();                            
            });
                
                swal({
                      title: 'Actualizado',
                      text: 'Se modificó la imagen de perfil correctamente',
                      type: 'success',
                      confirmButtonText: 'Aceptar'
                    });

                }

                if(data.html=="1")  
                {
                    swal({
                      title: '',
                      text: data.msj,
                      type: 'warning',
                      confirmButtonText: 'Aceptar'
                    });
                    $(data.selector).focus();
                }



       

    });
                     

                


} 

        
      </script>

     
@endforeach