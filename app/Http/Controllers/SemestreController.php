<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Semestre;
use DB;
use Illuminate\Http\Response;

class SemestreController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sem = Semestre::where('borrado','=','0')->get();
       // return response()->json($per);

        return view('semestre.index',['semestre'=> $sem]);

        //return view('semestre.index');
    }

    public function indexGet($request)
    {
       //$html="";
       $idSem = $request;

       $idsem="";
       $nomsem="";
       $fechaini="";
       $fechafin="";

       //echo $periodo;

       $sem= Semestre::where('id','=',$idSem)->get();

        
        foreach ($sem as $dato) {
               $idsem= "{$dato->id}";
               $nomsem="{$dato->nomsem}";
               $fechaini="{$dato->inisem}";
               $fechafin="{$dato->finsem}";
        }

        $fechai=substr($fechaini, -2).'/'.substr($fechaini, -5,2).'/'.substr($fechaini, -10,4);

        $fechaf=substr($fechafin, -2).'/'.substr($fechafin, -5,2).'/'.substr($fechafin, -10,4);

        echo json_encode(array("nom" => $nomsem, "fini" => $fechai, "ffin" => $fechaf,"seme" => $idsem));
                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function verificar($request){

        $sem= Semestre::where('activo','=','1')
              ->where('borrado','=', '0')->count();

        echo json_encode(array('seme' => $sem));


    }
    public function create($id,$nom,$ddi,$mmi,$aaai,$ddf,$mmf,$aaaf)
    {
        $fechaini=$aaai.'-'.$mmi.'-'.$ddi;
        $fechafin=$aaaf.'-'.$mmf.'/'.$ddf;

        $seme =new Semestre;

        $seme ->nomsem = $nom;
        $seme ->inisem = $fechaini;
        $seme ->finsem = $fechafin;
        $seme ->activo = "1";
        $seme ->borrado = "0";

        $seme->save();

        $seme1 =Semestre::where('borrado','=','0')->get();

        $html="";

        foreach($seme1 as $dato) {
        $html.='<tr>';
        $html.='<td>'."{$dato->nomsem}".'</td>';

        $fechai=substr($dato->inisem, -2).'/'.substr($dato->inisem, -5,2).'/'.substr($dato->inisem, -10,4);
        $fechaf=substr($dato->finsem, -2).'/'.substr($dato->finsem, -5,2).'/'.substr($dato->finsem, -10,4);

        $html.='<td>'.$fechai.'</td>
                <td>'.$fechaf.'</td>';

            if($dato->activo==0){
              $html.='<td>
              <center><span class="label label-primary">Cerrado</span></center>
              </td>';
              $html.='<td>
              <button class="btn btn-warning" id="btnEditar" onclick="editarSem('."{$dato->id}".');"><i class="fa fa-cogs"></i></button>
              <button class="btn btn-danger" id="btnDelete" onclick="deleteSem('."{$dato->id}".');"><i class="fa fa-trash"></i></button>

              </td>';
            }

            else{
              $html.='<td>
              <center><span class="label label-success">Activo</span></center>
              </td>';
              $html.='<td>
              <button class="btn btn-warning" id="btnEditar" onclick="editarSem('."{$dato->id}".');"><i class="fa fa-cogs"></i></button>
              <button class="btn btn-danger" id="btnDelete" onclick="deleteSem('."{$dato->id}".');"><i class="fa fa-trash"></i></button>
              <button class="btn btn-info" id="btnCerrar" onclick="cerrarSem('."{$dato->id}".');">Cerrar</button></td>';
            }

                      

                   

        $html.='</tr>';
                  }


        echo json_encode(array("Semestre 0" => $seme,"Semestre 1" => $seme1, "html" =>$html));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function cerrar($id){

        $seme =Semestre::find($id);

        $seme ->activo = "0";

        $seme->save();

        $seme1 =Semestre::where('borrado','=','0')->get();

        $html="";

        foreach($seme1 as $dato) {
        $html.='<tr>';
        $html.='<td>'."{$dato->nomsem}".'</td>';

        $fechai=substr($dato->inisem, -2).'/'.substr($dato->inisem, -5,2).'/'.substr($dato->inisem, -10,4);
        $fechaf=substr($dato->finsem, -2).'/'.substr($dato->finsem, -5,2).'/'.substr($dato->finsem, -10,4);

        $html.='<td>'.$fechai.'</td>
                <td>'.$fechaf.'</td>';

            if($dato->activo==0){
              $html.='<td>
              <center><span class="label label-primary">Cerrado</span></center>
              </td>';
              $html.='<td>
              <button class="btn btn-warning" id="btnEditar" onclick="editarSem('."{$dato->id}".');"><i class="fa fa-cogs"></i></button>
              <button class="btn btn-danger" id="btnDelete" onclick="deleteSem('."{$dato->id}".');"><i class="fa fa-trash"></i></button>
              </td>';
            }

            else{
              $html.='<td>
              <center><span class="label label-success">Activo</span></center>
              </td>';
              $html.='<td>
              <button class="btn btn-warning" id="btnEditar" onclick="editarSem('."{$dato->id}".');"><i class="fa fa-cogs"></i></button>
              <button class="btn btn-danger" id="btnDelete" onclick="deleteSem('."{$dato->id}".');"><i class="fa fa-trash"></i></button>
              <button class="btn btn-info" id="btnCerrar" onclick="cerrarSem('."{$dato->id}".');">Cerrar</button></td>';
            }

                      

                   

        $html.='</tr>';
                  }








        echo json_encode(array("Semestre 0" => $seme,"Semestre 1" => $seme1, "html" =>$html));


    }


    public function delete($id){

        $seme =Semestre::find($id);

        $seme ->borrado = "1";

        $seme->save();

        $seme1 =Semestre::where('borrado','=','0')->get();

        $html="";

        foreach($seme1 as $dato) {
        $html.='<tr>';
        $html.='<td>'."{$dato->nomsem}".'</td>';

        $fechai=substr($dato->inisem, -2).'/'.substr($dato->inisem, -5,2).'/'.substr($dato->inisem, -10,4);
        $fechaf=substr($dato->finsem, -2).'/'.substr($dato->finsem, -5,2).'/'.substr($dato->finsem, -10,4);

        $html.='<td>'.$fechai.'</td>
                <td>'.$fechaf.'</td>';

            if($dato->activo==0){
              $html.='<td>
              <center><span class="label label-primary">Cerrado</span></center>
              </td>';
              $html.='<td>
              <button class="btn btn-warning" id="btnEditar" onclick="editarSem('."{$dato->id}".');"><i class="fa fa-cogs"></i></button>
              <button class="btn btn-danger" id="btnDelete" onclick="deleteSem('."{$dato->id}".');"><i class="fa fa-trash"></i></button>
              </td>';
            }

            else{
              $html.='<td>
              <center><span class="label label-success">Activo</span></center>
              </td>';
              $html.='<td>
              <button class="btn btn-warning" id="btnEditar" onclick="editarSem('."{$dato->id}".');"><i class="fa fa-cogs"></i></button>
              <button class="btn btn-danger" id="btnDelete" onclick="deleteSem('."{$dato->id}".');"><i class="fa fa-trash"></i></button>
              <button class="btn btn-info" id="btnCerrar" onclick="cerrarSem('."{$dato->id}".');">Cerrar</button></td>';
            }

                      

                   

        $html.='</tr>';
                  }








        echo json_encode(array("Semestre 0" => $seme,"Semestre 1" => $seme1, "html" =>$html));


    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$nom,$ddi,$mmi,$aaai,$ddf,$mmf,$aaaf)
    {
        $fechaini=$aaai.'-'.$mmi.'-'.$ddi;
        $fechafin=$aaaf.'-'.$mmf.'/'.$ddf;

        $seme =Semestre::find($id);

        $seme ->nomsem = $nom;
        $seme ->inisem = $fechaini;
        $seme ->finsem = $fechafin;

        $seme->save();

        $seme1 =Semestre::where('borrado','=','0')->get();

        $html="";

        foreach($seme1 as $dato) {
        $html.='<tr>';
        $html.='<td>'."{$dato->nomsem}".'</td>';

        $fechai=substr($dato->inisem, -2).'/'.substr($dato->inisem, -5,2).'/'.substr($dato->inisem, -10,4);
        $fechaf=substr($dato->finsem, -2).'/'.substr($dato->finsem, -5,2).'/'.substr($dato->finsem, -10,4);

        $html.='<td>'.$fechai.'</td>
                <td>'.$fechaf.'</td>';

            if($dato->activo==0){
              $html.='<td>
              <center><span class="label label-primary">Cerrado</span></center>
              </td>';
              $html.='<td>
              <button class="btn btn-warning" id="btnEditar" onclick="editarSem('."{$dato->id}".');"><i class="fa fa-cogs"></i></button>
              <button class="btn btn-danger" id="btnDelete" onclick="deleteSem('."{$dato->id}".');"><i class="fa fa-trash"></i></button>
              </td>';
            }

            else{
              $html.='<td>
              <center><span class="label label-success">Activo</span></center>
              </td>';
              $html.='<td>
              <button class="btn btn-warning" id="btnEditar" onclick="editarSem('."{$dato->id}".');"><i class="fa fa-cogs"></i></button>
              <button class="btn btn-danger" id="btnDelete" onclick="deleteSem('."{$dato->id}".');"><i class="fa fa-trash"></i></button>
              <button class="btn btn-info" id="btnCerrar" onclick="cerrarSem('."{$dato->id}".');">Cerrar</button></td>';
            }

                      

                   

        $html.='</tr>';
                  }








        echo json_encode(array("Semestre 0" => $seme,"Semestre 1" => $seme1, "html" =>$html));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
