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
    Route::post('persona/getdata', 'Admin\PersonalController@getInfo')->name('empleado.getInfo');

    /* Rutas de PERSONA */
    Route::post('persona/buscar', 'Admin\PersonalController@buscar')->name('persona.buscar');
    Route::get('persona/eliminar/{id}/{listarluego}', 'Admin\PersonalController@eliminar')->name('persona.eliminar');
    Route::resource('persona', 'Admin\PersonalController', array('except' => array('show')));
    /* Rutas de Cargo */
    Route::post('cargo/buscar', 'Admin\CargoController@buscar')->name('cargo.buscar');
    Route::get('cargo/eliminar/{id}/{listarluego}', 'Admin\CargoController@eliminar')->name('cargo.eliminar');
    Route::resource('cargo', 'Admin\CargoController', array('except' => array('show')));
    
    Route::post('area/buscar', 'Control\AreaController@buscar')->name('area.buscar');
    Route::get('area/eliminar/{id}/{listarluego}', 'Control\AreaController@eliminar')->name('area.eliminar');
    Route::resource('area', 'Control\AreaController', array('except' => array('show')));
    
    Route::post('compra/buscar', 'Control\ComprasController@buscar')->name('compra.buscar');
    Route::get('compra/eliminar/{id}/{listarluego}', 'Control\ComprasController@eliminar')->name('compra.eliminar');
    Route::resource('compra', 'Control\ComprasController', array('except' => array('show')));
    Route::post('compra/generarNumero', 'Control\ComprasController@generarNumero')->name('compra.generarnumero');
    Route::post('compraactivos/buscar', 'Control\ActivosController@buscar')->name('compraactivos.buscar');
    Route::get('compraactivos/eliminar/{id}/{listarluego}', 'Control\ActivosController@eliminar')->name('compraactivos.eliminar');
    Route::post('compraactivos/generarNumero', 'Control\ActivosController@generarNumero')->name('compraactivos.generarnumero');

    Route::resource('compraactivos', 'Control\ActivosController', array('except' => array('show')));
    Route::post('asesoria/buscar', 'Control\AsesoriaController@buscar')->name('asesoria.buscar');
    Route::get('asesoria/eliminar/{id}/{listarluego}', 'Control\AsesoriaController@eliminar')->name('asesoria.eliminar');
    Route::resource('asesoria', 'Control\AsesoriaController', array('except' => array('show')));
    Route::get('asesoria/listarAsesoria', 'Control\AsesoriaController@listarAsesoria')->name('asesoria.listarAsesoria');

    Route::post('nomina/buscar', 'Control\NominaController@buscar')->name('nomina.buscar');
    Route::get('nomina/eliminar/{id}/{listarluego}', 'Control\NominaController@eliminar')->name('nomina.eliminar');
    Route::resource('nomina', 'Control\NominaController', array('except' => array('show')));

    Route::post('venta/buscar', 'Control\VentaController@buscar')->name('venta.buscar');
    Route::get('venta/eliminar/{id}/{listarluego}', 'Control\VentaController@eliminar')->name('venta.eliminar');
    Route::resource('venta', 'Control\VentaController', array('except' => array('show')));
    Route::post('venta/generarNumero', 'Control\VentaController@generarNumero')->name('venta.generarnumero');
    Route::post('venta/getProducto', 'Control\VentaController@getProducto')->name('venta.getProducto');


    //inspeccion reporte
    Route::resource('reporteinventario', 'Reportes\ReporteInventarioController', array('except' => array('show')));
    Route::get('reporteinventario/pdfInventario', 'Reportes\ReporteInventarioController@pdfInventario')->name('reporteinventario.pdfInventario');
   
    /* EMPRESA COURIER*/
    Route::post('empresacourier/buscar', 'Control\EmpresacourierController@buscar')->name('empresacourier.buscar');
    Route::get('empresacourier/eliminar/{id}/{listarluego}', 'Control\EmpresacourierController@eliminar')->name('empresacourier.eliminar');
    Route::resource('empresacourier', 'Control\EmpresacourierController', array('except' => array('show')));
    Route::post('empresacourier/buscarRUC', 'Control\EmpresacourierController@buscarRUC')->name('empresacourier.buscarRUC');
   
});

    