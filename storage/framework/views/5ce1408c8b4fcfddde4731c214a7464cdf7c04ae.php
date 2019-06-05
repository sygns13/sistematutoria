<div class="row">

                <div class="col-md-12">
                  

              <div class="form-group"  style="padding-top: 40px;">
                  <label for="txtresBaja" class="col-sm-2 control-label">Documento o Título</label>

                  

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="txtdocBaja" placeholder="DOCUMENTO DE DESACTIVACIÓN (BAJA)" maxlength="200" onkeyup="EscribeLetras(event,this);">
                  </div>         
</div>

<div class="form-group" style="padding-top: 30px;">
                  <label for="txtfecEmiBaja" class="col-sm-2 control-label">Fecha Emisión del Documento</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="txtfecEmiBaja" placeholder="FECHA DE EMISIÓN DEL DOCUMENTO" maxlength="10" onkeypress="return noEscribe(event);" >
                  </div>         
</div>



<div class="form-group" style="padding-top: 30px;">
                <label for="cbuMotivo" class="col-sm-2 control-label">Motivo</label>
                <div class="col-sm-8">
                <select class="form-control" style="width: 100%;" id="cbuMotivo">
                  <option value="1">FALTA O SANCIÓN</option>
                  <option value="2">CESE DE LABORES</option>
                  <option value="3">DESTITUCIÓN</option>
                  <option value="4">DEFUNCIÓN</option>
                  <option value="6">OTRO</option>

                </select>
                </div>
</div>


<div class="form-group" style="padding-top: 30px;">
                <label for="cbuTipo" class="col-sm-2 control-label">Tipo</label>
                <div class="col-sm-8">
                <select class="form-control" style="width: 100%;" id="cbuTipo" onchange="">
                  <option value="2">SUSPENCIÓN</option>
                  <option value="3">BAJA DEFINITIVA</option>
                </select>
                </div>
</div>


<div class="form-group" style="padding-top: 30px;">
                  <label for="txtfecEmiBaja" class="col-sm-2 control-label">Observaciónes</label>

                  <div class="col-sm-8">
                    <textarea class="form-control" id="txtobsBaja" rows="6" placeholder="Ingrese Opcionalmente Observaciones ..." onkeyup="EscribeLetras(event,this);"></textarea>
                  </div>         
</div>


<div class="form-group"  style="padding-top: 40px;">

<div class="col-sm-12">
                  <h4>¿Estás seguro?</h4>

                  <p>Desea dar de desactivar al docente.</p>
                  <p><strong>Nota:</strong> Al dar de baja al docente, no podrá ingresar al sistema ni realizar ningún proceso de tutoría virtual. Hasta que sea activado.</p> 
              
</div>
           </div>

          </div>
                </div>