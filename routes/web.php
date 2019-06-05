<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::group(['middleware' => 'auth'], function () {


Route::resource('chat','ChatController');	
Route::get('messages', 'ChatController@fetch');
Route::post('messages', 'ChatController@sentMessage');

	
	Route::resource('alumnos','AlumnoController');
	Route::POST('alumnos/imagen','AlumnoController@subirimagen');
	Route::get('alumnos/nuevoAlumno/{v1}/{v2}/{v3}/{v4}/{v5}/{v6}/{v7}/{v8}/{v9}/{v10}/{ruta}/{v11}','AlumnoController@nuevoAlumno');
	Route::POST('alumnos/imagen2','AlumnoController@editimagen');
	Route::POST('alumnos/cargar','AlumnoController@cargar');
	Route::POST('alumnos/editar','AlumnoController@editar');
	Route::POST('alumnos/delete','AlumnoController@delete');



	Route::resource('tutors','TutorController');
	Route::POST('tutors/imagen','TutorController@subirimagen');
	Route::POST('tutors/borrarimagen','TutorController@borrarimagen');
	Route::POST('tutors/create','TutorController@create');
	Route::POST('tutors/imagen2','TutorController@editimagen');
	
	Route::POST('tutors/cargar','TutorController@cargar');
	Route::POST('tutors/edit1','TutorController@edit1');
	Route::POST('tutors/edit2','TutorController@edit2');
	Route::POST('tutors/edit3','TutorController@edit3');
	Route::POST('tutors/imagenE','TutorController@subirimagenE');
	Route::POST('tutors/destroy','TutorController@destroy');
	Route::POST('tutors/vermas','TutorController@vermas');
	Route::POST('tutors/baja','TutorController@baja');
	Route::POST('tutors/alta','TutorController@alta');
	Route::POST('tutors/buscarAgreFun','TutorController@buscarAgreFun');


	Route::resource('tutores','TutoralumnoController');
	Route::POST('tutores/asignar','TutoralumnoController@asignar');
	Route::POST('tutores/asignarAlumno','TutoralumnoController@asignarAlumno');
	Route::POST('tutores/quitarAlumno','TutoralumnoController@quitarAlumno');

	Route::resource('dimensions','DimensionpersonaController');
	Route::POST('dimensions/create','DimensionpersonaController@create');
	Route::POST('dimensions/cargar','DimensionpersonaController@cargar');
	Route::POST('dimensions/edit1','DimensionpersonaController@edit1');
	Route::POST('dimensions/destroy','DimensionpersonaController@destroy');

	Route::resource('etapas','EtapaController');
	Route::POST('etapas/create','EtapaController@create');
	Route::POST('etapas/cargar','EtapaController@cargar');
	Route::POST('etapas/edit1','EtapaController@edit1');
	Route::POST('etapas/destroy','EtapaController@destroy');

	Route::resource('bancopreguntas','PreguntaController');
	Route::POST('bancopreguntas/cbuchange','PreguntaController@cbuchange');
	Route::POST('bancopreguntas/create','PreguntaController@create');
	Route::POST('bancopreguntas/cargar','PreguntaController@cargar');
	Route::POST('bancopreguntas/edit1','PreguntaController@edit1');
	Route::POST('bancopreguntas/destroy','PreguntaController@destroy');


	Route::resource('chats','ChatController');
	Route::resource('chats_has_users','Chat_has_userController');
	Route::resource('detallepreguntas','DetallepreguntasController');
	Route::resource('diagnosticos','DiagnosticosController');
	
	
	Route::resource('evaluacions','EvaluacionController');
	Route::resource('personas','PersonaController');
	
	Route::resource('resultados','ResultadoController');
	Route::resource('semestres','SemestreController');
	Route::get('semestres/cargar/{id}','SemestreController@indexGet');
	Route::get('semestres/editar/{id}/{nom}/{ddi}/{mmi}/{aaai}/{ddf}/{mmf}/{aaaf}','SemestreController@edit');
	Route::get('semestres/verificar/{aux}','SemestreController@verificar');
	Route::get('semestres/nuevo/{id}/{nom}/{ddi}/{mmi}/{aaai}/{ddf}/{mmf}/{aaaf}','SemestreController@create');
	Route::get('semestres/cerrar/{id}','SemestreController@cerrar');
	Route::get('semestres/delete/{id}','SemestreController@delete');


	Route::resource('sesions','SesionController');
	Route::resource('tareas','TareaController');
	Route::resource('tipousers','TipouserController');
	Route::resource('tutoralumnos','TutoralumnoController');
	Route::resource('users','UserController');



	/**************************************Tutores*************************************************/


	Route::POST('HomeController/mensaje','HomeController@mensaje');
	Route::POST('HomeController/home','HomeController@home');
	Route::post('send','mailController@send');


	Route::POST('HomeController/cargarInf','HomeController@cargarInf');
	Route::POST('HomeController/saveInf','HomeController@saveInf');

	Route::POST('HomeController/verMasInforme','HomeController@verMasInforme');
	Route::POST('HomeController/cargar','HomeController@cargar');

	Route::POST('HomeController/editInf','HomeController@editInf');
	Route::POST('HomeController/destroy','HomeController@destroy');

	Route::POST('HomeController/cargarEval','HomeController@cargarEval');
	Route::POST('HomeController/cargarPreguntasEval','HomeController@cargarPreguntasEval');
	
	Route::POST('HomeController/cambiarDimen','HomeController@cambiarDimen');
	
	Route::POST('HomeController/saveEval','HomeController@saveEval');
	Route::POST('HomeController/vermasEval','HomeController@vermasEval');
	Route::POST('HomeController/destroyEval','HomeController@destroyEval');

	
	Route::POST('HomeController/editarEval','HomeController@editarEval');
	Route::POST('HomeController/editEval','HomeController@editEval');
	Route::POST('HomeController/califEval','HomeController@califEval');
	Route::POST('HomeController/savecalifEval','HomeController@savecalifEval');
	
	Route::POST('HomeController/diagnosticarEval','HomeController@diagnosticarEval');
	Route::POST('HomeController/saveDiag','HomeController@saveDiag');
	Route::POST('HomeController/editdiagnosticarEval','HomeController@editdiagnosticarEval');
	Route::POST('HomeController/saveDiagEdit','HomeController@saveDiagEdit');


	Route::POST('HomeController/cargarTarea','HomeController@cargarTarea');
	Route::POST('HomeController/cargarEvalsTarea','HomeController@cargarEvalsTarea');
	Route::POST('HomeController/saveTarea','HomeController@saveTarea');
	Route::POST('HomeController/vermasTarea','HomeController@vermasTarea');
	Route::POST('HomeController/destroyTarea','HomeController@destroyTarea');
	Route::POST('HomeController/editarTarea','HomeController@editarTarea');
	Route::POST('HomeController/saveTareaEdit','HomeController@saveTareaEdit');
	Route::POST('HomeController/califTarea','HomeController@califTarea');
	Route::POST('HomeController/saveCalifTarea','HomeController@saveCalifTarea');

	
	Route::POST('HomeController/cargarSesion','HomeController@cargarSesion');
	Route::POST('HomeController/saveSesion','HomeController@saveSesion');
	Route::POST('HomeController/verMasSesion','HomeController@verMasSesion');
	Route::POST('HomeController/destroySesion','HomeController@destroySesion');
	Route::POST('HomeController/editarSesion','HomeController@editarSesion');
	Route::POST('HomeController/saveSesionEdit','HomeController@saveSesionEdit');
	Route::POST('HomeController/cancelSesion','HomeController@cancelSesion');
	Route::POST('HomeController/saveCancelSesion','HomeController@saveCancelSesion');
	Route::POST('HomeController/califSesion','HomeController@califSesion');
	Route::POST('HomeController/saveCalifSesion','HomeController@saveCalifSesion');

	
	Route::POST('HomeController/cargarChat','HomeController@cargarChat');
	Route::POST('HomeController/enviarChat','HomeController@enviarChat');
	Route::POST('HomeController/cargarMsjs','HomeController@cargarMsjs');


	Route::POST('tutors/Myperfil','TutorController@Myperfil');





	/**************************************Alumnos*************************************************/

	Route::POST('Evaluacion/verEval','EvaluacionController@verEval');
	Route::POST('Evaluacion/homeAlumno','EvaluacionController@homeAlumno');
	Route::POST('Evaluacion/responderEval','EvaluacionController@responderEval');


	Route::POST('Tarea/verTarea','TareaController@verTarea');
	Route::POST('Tarea/imagen','TareaController@imagen');
	Route::POST('Tarea/borrarimagen','TareaController@borrarimagen');
	Route::POST('Tarea/responderTarea','TareaController@responderTarea');

	Route::POST('Sesion/verSesion','SesionController@verSesion');
	Route::POST('Sesion/saveParticipacion','SesionController@saveParticipacion');
	Route::POST('Sesion/soliCancelacion','SesionController@soliCancelacion');


	Route::POST('Alumno/Myperfil','AlumnoController@Myperfil');
	Route::POST('Alumno/editarPerfil','AlumnoController@editarPerfil');
	Route::POST('Tutor/VerPerfilTutor','TutorController@VerPerfilTutor');

	Route::POST('Sesion/verMasSesion','SesionController@verMasSesion');
	Route::POST('Tarea/verMasTarea','TareaController@verMasTarea');
	Route::POST('Evaluacion/verMasEvaluacion','EvaluacionController@verMasEvaluacion');
	
	Route::POST('Sesion/homePerfil1Alumno','SesionController@homePerfil1Alumno');


	Route::POST('Chat/cargarChat','ChatController@cargarChat');
	Route::POST('Chat/enviarChat','ChatController@enviarChat');
	Route::POST('Chat/cargarMsjs','ChatController@cargarMsjs');






    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
