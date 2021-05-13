<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Admin\InicioController@index');
// Route::get('/', 'Seguridad\LoginController@index');

//auth
Route::get('auth/login', 'Seguridad\LoginController@index')->name('login');
Route::post('auth/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('auth/logout', 'Seguridad\LoginController@logout')->name('logout');

//middleware "root" es para el Usuario-> ADMINISTRADOR PRINCIAPAL, ID=1
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware'=>['auth', 'root']], function () {
    /* Rutas de ACCESO */
    Route::get('acceso', 'AccesoController@index')->name('acceso');
    Route::post('acceso', 'AccesoController@store')->name('store_acceso');
    /* Rutas de GRUPOMENU */
    Route::post('grupomenu/buscar', 'GrupoMenuController@buscar')->name('grupomenu.buscar');
    Route::get('grupomenu/eliminar/{id}/{listarluego}', 'GrupoMenuController@eliminar')->name('grupomenu.eliminar');
    Route::resource('grupomenu', 'GrupoMenuController', array('except' => array('show')));
    /* Rutas de OPCIONMENU */
    Route::post('opcionmenu/buscar', 'OpcionMenuController@buscar')->name('opcionmenu.buscar');
    Route::get('opcionmenu/eliminar/{id}/{listarluego}', 'OpcionMenuController@eliminar')->name('opcionmenu.eliminar');
    Route::resource('opcionmenu', 'OpcionMenuController', array('except' => array('show')));
    /* Rutas de ROL */
    Route::post('rol/buscar', 'RolController@buscar')->name('rol.buscar');
    Route::get('rol/eliminar/{id}/{listarluego}', 'RolController@eliminar')->name('rol.eliminar');
    Route::resource('rol', 'RolController', array('except' => array('show')));
    /* Rutas de ROLPERSONA */
    Route::get('rolpersona', 'RolPersonalController@index')->name('rolpersona');
    Route::post('rolpersona', 'RolPersonalController@store')->name('store_rolpersona');
    /* Rutas de TIPOUSUARIO */
    Route::post('tipousuario/buscar', 'TipoUsuarioController@buscar')->name('tipousuario.buscar');
    Route::get('tipousuario/eliminar/{id}/{listarluego}', 'TipoUsuarioController@eliminar')->name('tipousuario.eliminar');
    Route::resource('tipousuario', 'TipoUsuarioController', array('except' => array('show')));
    /* Rutas de USUARIO */
    Route::post('usuario/buscar', 'UsuarioController@buscar')->name('usuario.buscar');
    Route::get('usuario/eliminar/{id}/{listarluego}', 'UsuarioController@eliminar')->name('usuario.eliminar');
    Route::resource('usuario', 'UsuarioController', array('except' => array('show')));
});


//aca las demas rutas
Route::group(['middleware' => ['auth', 'acceso']], function () {
    /*Dashboard Principal*/
    Route::get('dashboard', function(){
        return view('theme.lte.layout');
    })->name('dashboard');
    //Route::get('dashboard', 'Gestion\TramiteController@index')->name('dashboard');
    

    /* Rutas Perfil & Cambio Contraseña */
    Route::get('persona/perfil', 'Admin\UsuarioController@perfil')->name('usuario.perfil');
    Route::post('persona/password/{id}', 'Admin\UsuarioController@cambiarpassword')->name('usuario.cambiarpassword');
    Route::post('persona/buscarRUC', 'Admin\PersonalController@buscarRUC')->name('persona.buscarRUC');

    /* Rutas de PERSONA */
    Route::post('persona/buscar', 'Admin\PersonalController@buscar')->name('persona.buscar');
    Route::get('persona/eliminar/{id}/{listarluego}', 'Admin\PersonalController@eliminar')->name('persona.eliminar');
    Route::resource('persona', 'Admin\PersonalController', array('except' => array('show')));
    /* Rutas de Cargo */
    Route::post('cargo/buscar', 'Admin\CargoController@buscar')->name('cargo.buscar');
    Route::get('cargo/eliminar/{id}/{listarluego}', 'Admin\CargoController@eliminar')->name('cargo.eliminar');
    Route::resource('cargo', 'Admin\CargoController', array('except' => array('show')));
    /* MOTIVOS RECHAZO*/
    Route::post('motivorechazo/buscar', 'Control\MotivorechazoController@buscar')->name('motivorechazo.buscar');
    Route::get('motivorechazo/eliminar/{id}/{listarluego}', 'Control\MotivorechazoController@eliminar')->name('motivorechazo.eliminar');
    Route::resource('motivorechazo', 'Control\MotivorechazoController', array('except' => array('show')));
    /* MOTIVOS COURIER*/
    Route::post('motivocourier/buscar', 'Control\MotivocourierController@buscar')->name('motivocourier.buscar');
    Route::get('motivocourier/eliminar/{id}/{listarluego}', 'Control\MotivocourierController@eliminar')->name('motivocourier.eliminar');
    Route::resource('motivocourier', 'Control\MotivocourierController', array('except' => array('show')));
    /* AREAS*/
    Route::post('area/buscar', 'Control\AreaController@buscar')->name('area.buscar');
    Route::get('area/eliminar/{id}/{listarluego}', 'Control\AreaController@eliminar')->name('area.eliminar');
    Route::resource('area', 'Control\AreaController', array('except' => array('show')));
    /* ARCHIVADOR*/
    Route::post('archivador/buscar', 'Control\ArchivadorController@buscar')->name('archivador.buscar');
    Route::get('archivador/eliminar/{id}/{listarluego}', 'Control\ArchivadorController@eliminar')->name('archivador.eliminar');
    Route::resource('archivador', 'Control\ArchivadorController', array('except' => array('show')));
    /* TIPODOCUMENTO*/
    Route::post('tipodocumento/buscar', 'Control\TipoDocumentoController@buscar')->name('tipodocumento.buscar');
    Route::get('tipodocumento/eliminar/{id}/{listarluego}', 'Control\TipoDocumentoController@eliminar')->name('tipodocumento.eliminar');
    Route::resource('tipodocumento', 'Control\TipoDocumentoController', array('except' => array('show')));
    /* PROCEDIMIENTOS*/
    Route::post('procedimiento/buscar', 'Control\ProcedimientoController@buscar')->name('procedimiento.buscar');
    Route::get('procedimiento/eliminar/{id}/{listarluego}', 'Control\ProcedimientoController@eliminar')->name('procedimiento.eliminar');
    Route::resource('procedimiento', 'Control\ProcedimientoController', array('except' => array('show')));
    
    /* EMPRESA COURIER*/
    Route::post('empresacourier/buscar', 'Control\EmpresacourierController@buscar')->name('empresacourier.buscar');
    Route::get('empresacourier/eliminar/{id}/{listarluego}', 'Control\EmpresacourierController@eliminar')->name('empresacourier.eliminar');
    Route::resource('empresacourier', 'Control\EmpresacourierController', array('except' => array('show')));
    Route::post('empresacourier/buscarRUC', 'Control\EmpresacourierController@buscarRUC')->name('empresacourier.buscarRUC');
    /* TRAMITES*/
    Route::post('tramite/buscar', 'Gestion\TramiteController@buscar')->name('tramite.buscar');
    Route::get('tramite/eliminar/{id}/{listarluego}', 'Gestion\TramiteController@eliminar')->name('tramite.eliminar');
    Route::resource('tramite', 'Gestion\TramiteController', array('except' => array('show')));
    
    Route::get('tramite/listarprocedimientos', 'Gestion\TramiteController@listarProcedimientos')->name('tramite.listarprocedimientos');
    Route::get('tramite/listarempresascourier', 'Gestion\TramiteController@listarEmpresascourier')->name('tramite.listarempresascourier');
    Route::get('tramite/listarareas', 'Gestion\TramiteController@listarAreas')->name('tramite.listarareas');
    Route::get('tramite/listararchivadores', 'Gestion\TramiteController@listarArchivadores')->name('tramite.listararchivadores');
    Route::get('tramite/listartramites', 'Gestion\TramiteController@listarTramites')->name('tramite.listartramites');
    Route::get('tramite/listarpersonal', 'Gestion\TramiteController@listarPersonal')->name('tramite.listarpersonal');
    Route::post('tramite/generarNumero', 'Gestion\TramiteController@generarNumero')->name('tramite.generarnumero');
    
    
    Route::get('tramite/confirmacion/{id}/{listarluego}/{accion}', 'Gestion\TramiteController@confirmacion')->name('tramite.confirmacion');
    Route::post('tramite/accion/{id}/{accion}', 'Gestion\TramiteController@accion')->name('tramite.accion');
    Route::get('tramite/seguimiento/pdf/{id}', 'Gestion\TramiteController@printseguimiento')->name('tramite.printseguimiento');
    
    Route::get('tramite/ticket/pdf', 'Gestion\TramiteController@generarTicket')->name('tramite.ticket');

    //tramite reportes
    Route::resource('reportetramite', 'Reportes\ReportetramiteController', array('except' => array('show')));
    Route::get('reportetramite/pdftramites', 'Reportes\ReportetramiteController@pdfTramites')->name('reportetramite.pdftramites');
    //inspeccion reporte
    Route::resource('reporteInspeccion', 'Reportes\ReporteInspeccionController', array('except' => array('show')));
    Route::get('reporteInspeccion/pdfInspeccion', 'Reportes\ReporteInspeccionController@pdfInspeccion')->name('reporteinspeccion.pdfInspeccion');

//SEGUNDA PARTE 

    //ORDEN PAGO
    Route::post('ordenpago/buscar', 'Gestion\OrdenpagoController@buscar')->name('ordenpago.buscar');
    Route::get('ordenpago/eliminar/{id}/{listarluego}', 'Gestion\OrdenpagoController@eliminar')->name('ordenpago.eliminar');
    Route::resource('ordenpago', 'Gestion\OrdenpagoController', array('except' => array('show')));  
    Route::get('ordenpago/pdf/{id}', 'Gestion\OrdenpagoController@pdf')->name('ordenpago.pdf');
    Route::post('ordenpago/generarNumero', 'Gestion\OrdenpagoController@generarNumero')->name('ordenpago.generarnumero');
    Route::get('ordenpago/listarsubtipostramite', 'Control\SubtipotramitenodocController@listarSubtipos')->name('ordenpago.listarsubtipos');
    //FIN ORDEN PAGO

    //INSPECCION
    Route::post('inspeccion/buscar', 'Gestion\InspeccionController@buscar')->name('inspeccion.buscar');
    Route::get('inspeccion/eliminar/{id}/{listarluego}', 'Gestion\InspeccionController@eliminar')->name('inspeccion.eliminar');

    Route::resource('inspeccion', 'Gestion\InspeccionController', array('except' => array('show'))); 
    Route::get('inspeccion/pdf/{id}', 'Gestion\InspeccionController@pdfInspeccion')->name('inspeccion.pdfInspeccion');
    Route::get("inspeccion/archivo/{nombre}",'Gestion\InspeccionController@descargar')->name('inspeccion.descargar');
    Route::post('inspeccion/generarNumero', 'Gestion\InspeccionController@generarNumero')->name('inspeccion.generarnumero');
    Route::put('inspeccion/observaciones', 'Gestion\InspeccionController@levantarObservaciones')->name('inspeccion.levantarObservaciones');

    //FIN INSPECCION

    /* RESOLUCIÓN*/
    Route::post('resolucion/buscar', 'Gestion\ResolucionController@buscar')->name('resolucion.buscar');
    Route::get('resolucion/eliminar/{id}/{listarluego}', 'Gestion\ResolucionController@eliminar')->name('resolucion.eliminar');
    Route::resource('resolucion', 'Gestion\ResolucionController', array('except' => array('show')));
    Route::get('resolucion/listarInspeccion', 'Gestion\ResolucionController@listarInspeccion')->name('resolucion.listarInspeccion');
    Route::get('resolucion/listarOrdenpago', 'Gestion\ResolucionController@listarOrdenpago')->name('resolucion.listarOrdenpago');
    Route::get('resolucion/pdf/{id}/{blanco?}', 'Gestion\ResolucionController@pdfResolucion')->name('resolucion.pdfResolucion');
    Route::post('resolucion/generarNumero', 'Gestion\ResolucionController@generarNumero')->name('resolucion.generarnumero');

    //Tipo tramite
    Route::post('tipotramitenodoc/buscar', 'Control\TipotramitenodocController@buscar')->name('tipotramitenodoc.buscar');
    Route::get('tipotramitenodoc/eliminar/{id}/{listarluego}', 'Control\TipotramitenodocController@eliminar')->name('tipotramitenodoc.eliminar');
    Route::resource('tipotramitenodoc', 'Control\TipotramitenodocController', array('except' => array('show')));
   //Sub tipo tramite
    Route::post('subtipotramitenodoc/buscar', 'Control\SubtipotramitenodocController@buscar')->name('subtipotramitenodoc.buscar');
    Route::get('subtipotramitenodoc/eliminar/{id}/{listarluego}', 'Control\SubtipotramitenodocController@eliminar')->name('subtipotramitenodoc.eliminar');
    Route::resource('subtipotramitenodoc', 'Control\SubtipotramitenodocController', array('except' => array('show')));

    //SOLICITUD
    Route::post('solicitud/buscar', 'Gestion\SolicitudController@buscar')->name('solicitud.buscar');
    Route::get('solicitud/eliminar/{id}/{listarluego}', 'Gestion\SolicitudController@eliminar')->name('solicitud.eliminar');
    Route::resource('solicitud', 'Gestion\SolicitudController', array('except' => array('show')));  
    Route::get('solicitud/pdf/{id}', 'Gestion\SolicitudController@pdf')->name('solicitud.pdf');
    Route::post('solicitud/generarNumero', 'Gestion\SolicitudController@generarNumero')->name('solicitud.generarnumero');

    //FIN SOLICITUD

    //CARTA
    Route::post('carta/buscar', 'Gestion\CartaController@buscar')->name('carta.buscar');
    Route::get('carta/eliminar/{id}/{listarluego}', 'Gestion\CartaController@eliminar')->name('carta.eliminar');
    Route::resource('carta', 'Gestion\CartaController', array('except' => array('show')));  
    Route::get('carta/pdf/{id}', 'Gestion\CartaController@pdf')->name('carta.pdf');
    Route::post('carta/generarNumero', 'Gestion\CartaController@generarNumero')->name('carta.generarnumero');

    //FIN CARTA

//FIN SEGUNDA PARTE
});

    