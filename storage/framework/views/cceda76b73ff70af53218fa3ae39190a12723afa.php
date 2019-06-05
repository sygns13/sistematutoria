<div class="box box-primary" id="divEval01">
            <div class="box-header with-border">
              <center><h3 class="box-title" style="text-decoration: underline;">Perfil del Tutor Asignado</h3></center>
              <button style="float: right;" type="button" class="btn btn-default" onclick="homeAlumno();"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</button>
            </div>

    

 <div class="box-body">

           <?php $__currentLoopData = $tutor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="width: 18cm;padding-left: 0px;" class="panel panel-defaultPrint container-fluid spark-screen" id='printarea'>
            <div style="width: 18cm">
                
                <div style="width: 18cm;">

                

                <div style="width: 18.2cm;">




                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 3.2cm;text-align: center;padding-top: 20px;">
                                <img src="<?php echo e(asset('/img/unasam.png')); ?>" style="width: 72px;">
                                </td>

                                <td style="width: 11.5cm;;text-align: center;padding-top: 20px;">
                                    <p style="margin-bottom: 0px;font-size: 19px"><strong>UNIVERSIDAD NACIONAL</strong></p>
                                    <p style="margin-bottom: 0px;font-size: 19px"><strong>SANTIAGO ANTÚNEZ DE MAYOLO</strong></p>
                                    <hr style="margin-top: 5px;margin-bottom: 5px;" class="hrP">
                                    <p><FONT FACE="Monotype Corsiva" SIZE=5 COLOR="#EDB23B">Una Nueva Universidad para el Desarrollo</FONT></p>
                                </td>
                               <td style="width: 3.52cm; text-align: center;padding-top: 20px;">
                                <?php if($dato->imagen=="" || $dato->imagen==null): ?>
                                <?php else: ?>             

                                    <?php 
                                    $ruta="/img/perfilTutores/".$dato->imagen;
                                     ?>
                                <img src="<?php echo e(asset($ruta)); ?>" style="width: 80px;height: 80px;" class="img img-responsive">
                                <?php endif; ?>
                                </td>                    
                            </tr>
                        </tbody>
                    </table>



                   
                </div>


                <div style="width: 18cm;">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 3.2cm; text-align: center;padding-top: 17px;">
                                
                                </td>

                                <td style="width: 11.5cm;text-align: center;padding-top: 15px;padding-bottom: 20px;">
                                    
                                    <p style="margin-bottom: 0px;font-size: 19px"><strong>DATOS DEL DOCENTE TUTOR ASIGNADO</strong></p>
                                  
                                </td>
                               <td style="width: 3.52cm; text-align: center;padding-top: 17px;">
                                
                                </td>                    
                            </tr>
                        </tbody>
                    </table>
                </div>


                


           


                <div style="width: 18cm;"> 
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 5.6cm; text-align: center; border: 1px;border-style: solid">
                                <p style="margin-bottom: 0px;font-size: 13px"><strong style="padding-left: 8px;"> 
                                <?php if($dato->tipodoc=="1"): ?>
                                DNI
                                <?php elseif($dato->tipodoc=="2"): ?>
                                CARNET DE EXTRANJERÍA
                                <?php endif; ?>

                                </strong>:</p>
                                </td>

                                <td style="width: 70%;text-align: center;padding-top: 17px;padding-bottom: 17px;border: 1px;border-style: solid;">
                                    
                                    <p  id="impArea" style="margin-bottom: 0px;font-size: 14px;text-align: justify;padding-left: 10px;padding-right: 10px;">
                                   <?php echo e($dato->dni); ?>

                                </p>
                                  
                                </td>
                                           
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="width: 18cm;"> 
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 5.6cm; text-align: center; border: 1px;border-style: solid">
                                <p style="margin-bottom: 0px;font-size: 13px"><strong style="padding-left: 8px;">DOCENTE</strong>:</p>
                                </td>

                                <td style="width: 70%;text-align: center;padding-top: 17px;padding-bottom: 17px;border: 1px;border-style: solid;">
                                    
                                    <p style="margin-bottom: 0px;font-size: 14px;text-align: justify;padding-left: 10px;padding-right: 10px;">
                                   <?php echo e($dato->apellidos); ?>, <?php echo e($dato->nombres); ?>

                                </p>
                                  
                                </td>
                                           
                            </tr>
                        </tbody>
                    </table>
                </div>

               

                <div style="width: 18cm;"> 
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 5.6cm; text-align: center; border: 1px;border-style: solid">
                                <p style="margin-bottom: 0px;font-size: 13px"><strong style="padding-left: 8px;">TELÉFONO</strong>:</p>
                                </td>

                                <td style="width: 70%;text-align: center;padding-top: 17px;padding-bottom: 17px;border: 1px;border-style: solid;">
                                    
                                    <p style="margin-bottom: 0px;font-size: 14px;text-align: justify;padding-left: 10px;padding-right: 10px;">
                                   <?php echo e($dato->telf); ?>

                                   </p>
                                  
                                </td>
                                           
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="width: 18cm;"> 
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 5.6cm; text-align: center; border: 1px;border-style: solid">
                                <p style="margin-bottom: 0px;font-size: 13px"><strong style="padding-left: 8px;">EMAIL</strong>:</p>
                                </td>

                                <td style="width: 70%;text-align: center;padding-top: 17px;padding-bottom: 17px;border: 1px;border-style: solid;">
                                    
                                    <p style="margin-bottom: 0px;font-size: 15px;text-align: left;padding-left: 10px;padding-right: 10px;">   
                                    <?php echo e($dato->email); ?></p>
                                  
                                </td>
                                           
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="width: 18cm;"> 
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 5.6cm; text-align: center; border: 1px;border-style: solid">
                                <p style="margin-bottom: 0px;font-size: 13px"><strong style="padding-left: 8px;">DIRECCIÓN</strong>:</p>
                                </td>

                                <td style="width: 70%;text-align: center;padding-top: 17px;padding-bottom: 17px;border: 1px;border-style: solid;">
                                    
                                    <p style="margin-bottom: 0px;font-size: 15px;text-align: left;padding-left: 10px;padding-right: 10px;">   
                                    <?php echo e($dato->direccion); ?></p>
                                  
                                </td>
                                           
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div style="width: 18cm;"> 
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 5.6cm; text-align: center; border: 1px;border-style: solid">
                                <p style="margin-bottom: 0px;font-size: 13px"><strong style="padding-left: 8px;">ESPECIALIDAD DEL TUTOR</strong>:</p>
                                </td>

                                <td style="width: 70%;text-align: center;padding-top: 17px;padding-bottom: 17px;border: 1px;border-style: solid;">
                                    
                                    <p style="margin-bottom: 0px;font-size: 14px;text-align: justify;padding-left: 10px;padding-right: 10px;">
                                    <?php echo e($dato->esptutor); ?>

                                </p>
                                  
                                </td>
                                           
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="width: 18cm;"> 
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 5.6cm; text-align: center; border: 1px;border-style: solid">
                                <p style="margin-bottom: 0px;font-size: 13px"><strong style="padding-left: 8px;">GENERO</strong>:</p>
                                </td>

                                <td style="width: 70%;text-align: center;padding-top: 17px;padding-bottom: 17px;border: 1px;border-style: solid;">
                                    
                                    <p style="margin-bottom: 0px;font-size: 14px;text-align: justify;padding-left: 10px;padding-right: 10px;">
                                    <?php echo e(genero(intval($dato->genero))); ?></p>
                                  
                                </td>
                                           
                            </tr>
                        </tbody>
                    </table>
                </div>

              

                <div style="width: 18cm;"> 
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 5.6cm; text-align: center; border: 1px;border-style: solid">
                                <p style="margin-bottom: 0px;font-size: 13px"><strong style="padding-left: 10px;">USUARIO DEL SISTEMA</strong>:</p>
                                </td>

                                <td style="width: 70%;text-align: center;padding-top: 17px;padding-bottom: 17px;border: 1px;border-style: solid;">
                                    
                                    <p style="margin-bottom: 0px;font-size: 14px;text-align: justify;padding-left: 10px;padding-right: 10px;">
                                    <?php echo e($dato->name); ?> </p>
                                  
                                </td>
                                           
                            </tr>
                        </tbody>
                    </table>
                </div>

                  <div style="width: 18cm;" class="Noimpre"> 
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 18cm; text-align: center; border: 1px;border-style: solid;">
                                    <H3>Video de Presentación</H3>

                                    <?php if(strlen($dato->video)==0): ?>
                                    <H4>Este docente aun no cuenta con un video de presentación registrado</H3>
                                    <?php else: ?>
                                    <center>
                                  <?php 
                                  echo $dato->video;
                                   ?>
                                  </center>
                                  <?php endif; ?>

                                  <div style="height: 25px;width: 100%;"></div>

                                </td>
                                           
                            </tr>
                        </tbody>
                    </table>
                </div>

          

                </div>

            </div>
        </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



</div>

          
          </div>

          <div id="divEval02"></div>
