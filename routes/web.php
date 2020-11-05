<?php
Route::get('/index', 'UsuarioController@index');
Route::post('/login', 'UsuarioController@login');
// Route::post('/{login?}', 'UsuarioController@login')->where('login', '.*');
Route::get('/', 'UsuarioController@administracion');
Route::post('/usuarios', 'UsuarioController@gestion');
Route::post('/usuarios/guardar', 'UsuarioController@guardar');
Route::post('/usuarios/eliminar', 'UsuarioController@eliminar');
Route::post('/usuarios/modificar', 'UsuarioController@modificar');
Route::post('/logout', 'UsuarioController@logout');
Route::post('/usuarios/iniciar', 'UsuarioController@iniciar');

Route::post('/barrios', 'BarrioController@gestion');
Route::post('/barrios/guardar', 'BarrioController@guardar');
Route::post('/barrios/eliminar', 'BarrioController@eliminar');
Route::post('/barrios/combo', 'BarrioController@combo');

Route::post('/corregimientos', 'CorregimientoController@gestion');
Route::post('/corregimientos/guardar', 'CorregimientoController@guardar');
Route::post('/corregimientos/eliminar', 'CorregimientoController@eliminar');

Route::post('/etnias', 'EtniaController@gestion');
Route::post('/etnias/guardar', 'EtniaController@guardar');
Route::post('/etnias/eliminar', 'EtniaController@eliminar');
Route::post('/etnias/guardar', 'EtniaController@guardar');
Route::post('/etnias/guardarClasificacion', 'EtniaController@guardarClasificacion');
Route::post('/etnias/listarClasificacion', 'EtniaController@listarClasificacion');

Route::post('/ocupaciones', 'OcupacionController@gestion');
Route::post('/ocupaciones/guardar', 'OcupacionController@guardar');
Route::post('/ocupaciones/eliminar', 'OcupacionController@eliminar');

Route::post('/parentescos', 'ParentescoController@gestion');
Route::post('/parentescos/guardar', 'ParentescoController@guardar');
Route::post('/parentescos/eliminar', 'ParentescoController@eliminar');

Route::post('/estadocivil', 'EstadoCivilController@gestion');
Route::post('/estadocivil/guardar', 'EstadoCivilController@guardar');
Route::post('/estadocivil/eliminar', 'EstadoCivilController@eliminar');

Route::post('/escolaridad', 'EscolaridadController@gestion');
Route::post('/escolaridad/guardar', 'EscolaridadController@guardar');
Route::post('/escolaridad/eliminar', 'EscolaridadController@eliminar');

Route::post('/veredas', 'VeredaController@gestion');
Route::post('/veredas/guardar', 'VeredaController@guardar');
Route::post('/veredas/eliminar', 'VeredaController@eliminar');

Route::post('/morbilidad_nacer', 'MorbilidadNacerController@gestion');
Route::post('/morbilidad_nacer/guardar', 'MorbilidadNacerController@guardar');
Route::post('/morbilidad_nacer/eliminar', 'MorbilidadNacerController@eliminar');

Route::post('/morbilidad', 'MorbilidadController@gestion');
Route::post('/morbilidad/guardar', 'MorbilidadController@guardar');
Route::post('/morbilidad/eliminar', 'MorbilidadController@eliminar');

Route::post('/metodos', 'MetodosController@gestion');
Route::post('/metodos/guardar', 'MetodosController@guardar');
Route::post('/metodos/eliminar', 'MetodosController@eliminar');

Route::post('/motivos', 'MotivosController@gestion');
Route::post('/motivos/guardar', 'MotivosController@guardar');
Route::post('/motivos/eliminar', 'MotivosController@eliminar');

Route::post('/grupos', 'GrupoController@gestion');
Route::post('/grupos/guardar', 'GrupoController@guardar');
Route::post('/grupos/eliminar', 'GrupoController@eliminar');

Route::post('/enfermedadesCro', 'EnfermedadesCroController@gestion');
Route::post('/enfermedadesCro/guardar', 'EnfermedadesCroController@guardar');
Route::post('/enfermedadesCro/eliminar', 'EnfermedadesCroController@eliminar');

Route::post('/enfermedadesInf', 'EnfermedadesInfController@gestion');
Route::post('/enfermedadesInf/guardar', 'EnfermedadesInfController@guardar');
Route::post('/enfermedadesInf/eliminar', 'EnfermedadesInfController@eliminar');

Route::post('/religion', 'ReligionController@gestion');
Route::post('/religion/guardar', 'ReligionController@guardar');
Route::post('/religion/eliminar', 'ReligionController@eliminar');

Route::post('/colegios', 'ColegioController@gestion');
Route::post('/colegios/guardar', 'ColegioController@guardar');
Route::post('/colegios/eliminar', 'ColegioController@eliminar');
Route::post('/colegios/combo', 'ColegioController@combo');

Route::post('/actividad', 'ActividadController@gestion');
Route::post('/actividad/guardar', 'ActividadController@guardar');
Route::post('/actividad/eliminar', 'ActividadController@eliminar');


Route::post('/caracterizacion', 'CaracterizacionController@gestion');
Route::post('/caracterizacion/nuevo', 'CaracterizacionController@nuevo');
Route::post('/caracterizacion/editar', 'CaracterizacionController@editar');
Route::post('/caracterizacion/guardar', 'CaracterizacionController@guardar');
Route::post('/caracterizacion/validar', 'CaracterizacionController@validar');
Route::post('/caracterizacion/eliminar', 'CaracterizacionController@eliminar');
Route::post('/caracterizacion/exportar', 'CaracterizacionController@exportar');
Route::post('/caracterizacion/exportar2', 'CaracterizacionController@exportar2');
Route::post('/caracterizacion/validarJefe', 'CaracterizacionController@validarJefe');
Route::post('/caracterizacion/actualizar', 'CaracterizacionController@actualizar');

