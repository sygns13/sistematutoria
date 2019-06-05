
        <div class="box box-info" style="border-bottom: 0px;">
            


            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body" style="border-bottom: 0px;">

             
            
 <div class="col-md-12" >
                  <form class="form-horizontal">
         
        


                <div class="form-group">
                  <label for="txtnom" class="col-sm-2 control-label">Nombres:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtnomE" placeholder="Nombres" maxlength="500" onkeyup="EscribeLetras(event,this);" value="{{$dimension->nomdimen}}">
                  </div>
                </div>


                <div class="form-group">
                  <label for="txtape" class="col-sm-2 control-label">Descripción: (Opcional)</label>

                  <div class="col-sm-10">

                    <textarea class="form-control" rows="5" id="txtdescE" maxlength="2000">
                      @php
                      echo $dimension->desdimen;
                      @endphp
                    </textarea>
                    
                  </div>
                </div>



    

                
                </form>
              </div>

              
          </div>



      </div>
