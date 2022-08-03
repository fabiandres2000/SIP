<?php

Auth::routes();
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
Route::post('/usuarios/cambiarclave', 'UsuarioController@cambiarclave');
Route::post('/usuarios/buscar', 'UsuarioController@buscar');
Route::post('/usuarios/usuarioslog', 'UsuarioController@usuariosLog');
Route::post('/usuarios/usuarioslogbuscar', 'UsuarioController@usuariosLogBuscar');

Route::post('/usuarios/usuariosSubirImagen', 'UsuarioController@usuariosSubirImagen');
Route::post('/usuarios/usuariosEditarSubirImagen', 'UsuarioController@usuariosEditarSubirImagen');

Route::post('/barrios', 'BarrioController@gestion');
Route::post('/barrios/guardar', 'BarrioController@guardar');
Route::post('/barrios/eliminar', 'BarrioController@eliminar');
Route::post('/barrios/combo', 'BarrioController@combo');
Route::post('/barrios/exportar', 'BarrioController@exportar');

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
Route::post('/caracterizacion/eliminar', 'CaracterizacionController@eliminar');
Route::post('/caracterizacion/controlesRA', 'CaracterizacionController@controlesRA');
Route::post('/caracterizacion/buscarTablas', 'CaracterizacionController@buscarTablas');
Route::post('/caracterizacion/ControlRS', 'CaracterizacionController@ControlRS');

Route::post('/establecimientos/editar', 'EstablecimientosController@editar');
Route::post('/establecimientos/guardar', 'EstablecimientosController@guardar');
Route::post('/establecimientos/nuevo', 'EstablecimientosController@nuevo');
Route::post('/establecimientos', 'EstablecimientosController@gestion');
Route::post('/establecimientos/eliminar', 'EstablecimientosController@eliminar');

Route::post('/unidades/editar', 'UnidadesProductivasController@editar');
Route::post('/unidades/guardar', 'UnidadesProductivasController@guardar');
Route::post('/unidades/nuevo', 'UnidadesProductivasController@nuevo');
Route::post('/unidades', 'UnidadesProductivasController@gestion');
Route::post('/unidades/eliminar', 'UnidadesProductivasController@eliminar');

Route::post('/estadisticas', 'AdministracionController@estadisticas');

Route::post('/datosdashboard', 'DashboardController@datos_dashboard');

Route::post('/coordenadas', 'DashboardController@coordenadas');

Route::post('/indicadores/calcular', 'IndicadoresController@calcular');

Route::post('/indicadores/gestantes', 'IndicadoresController@gestantes');

Route::post('/indicadores/spa', 'IndicadoresController@spa');

Route::post('/indicadores/filtrospa', 'IndicadoresController@filtrospa');

Route::post('/vivienda/iniciales', 'ConsultasController@viviendas');

Route::post('/vivienda/listar', 'ConsultasController@viviendaslistar');

Route::post('/vivienda/listarpdf', 'ConsultasController@viviendaslistarpdf');

Route::post('/jefehogar/listar', 'ConsultasController@jefelistar');

Route::post('/jefehogar/listarpdf', 'ConsultasController@jefeslistarpdf');

Route::post('/entes/listar', 'soporteController@listarEntes');
Route::post('/entes/guardar', 'soporteController@guardarEntes');
Route::post('/entes/eliminar', 'soporteController@eliminarEntes');
Route::post('/entes/mostrar', 'soporteController@mostrarEntes');
Route::post('/entes/seleccionar', 'soporteController@seleccionarEntes');

Route::post('/usuarios/listar', 'soporteController@listarUsuarios');
Route::post('/usuarios/guardarSop', 'soporteController@guardarUsuarios');
Route::post('/usuarios/modificarSop', 'soporteController@modificarUsuarios');
Route::post('/usuarios/eliminarSop', 'soporteController@eliminarUsuarios');

Route::post('/reportes/gestantes', 'ReportesController@gestantes');
Route::post('/reportes/exportarGestantes', 'ReportesController@exportarGestantes');
Route::post('/reportes/nutricional', 'ReportesController@nutricional');
Route::post('/reportes/exportarNutricional', 'ReportesController@exportarNutricional');




Route::post('/reportes/cronicas', 'ReportesController@listarcronicas');
Route::post('/reportes/cronicaspdf', 'ReportesController@listarcronicaspdf');
Route::post('/reportes/migrantes', 'ReportesController@listarmigrantes');
Route::post('/reportes/migrantespdf', 'ReportesController@listarmigrantespdf');
Route::post('/informes/migrantes', 'InformesController@migrantes');

Route::post('/perfil', 'UsuarioController@perfil');
Route::post('/usuarios/guardarPerfil', 'UsuarioController@guardarPerfil');

Route::post('/caracterizacion/DetallesAmbiental', 'CaracterizacionController@DetallesAmbiental');
Route::post('/caracterizacion/DetallesControlAmbiental', 'CaracterizacionController@DetallesControlAmbiental');

Route::post('/caracterizacion/DetallesSalud', 'CaracterizacionController@DetallesSalud');
