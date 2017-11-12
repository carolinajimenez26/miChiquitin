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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'Facturacion'], function(){
  Route::get('EliminarArticulo/{id}/{cantidadActual}/{cantidadEliminar}/{idFactura}', [
    'uses' => 'Facturacion\ArticuloControlador@EliminarArticulo'
  ]);

  Route::get('CancelarCompra/{idFactura}', [
    'uses' => 'Facturacion\ArticuloControlador@CancelarCompra'
  ]);

  Route::get('metodoPago/{metodo}/{valorTotal}/{idCliente}/{idVendedor}/{NumeroCuotas}', [
    'uses' => 'Facturacion\MetodoDePago@metodoPago'
  ]);

  Route::get('/registrarProductos/{id_producto}/{cantidad}/{idFactura}', [
    'uses' => 'Facturacion\CompraProducto@registrarProductos'
  ]);

  Route::get('validacion', [
    'uses' => 'Facturacion\ValidarCliente@intermediar',
    'as' => 'factura.validacion.intermediar',
  ]);

  Route::get('index', [
    'uses' => 'Facturacion\ValidarCliente@index',
    'as' => 'factura.validacion.index',
  ]);

  Route::get('pagoDeuda/{id_factura}/{cuota}', [
    'uses' => 'Facturacion\pagoDeuda@pagar'
  ]);

  Route::get('FacturaImpresion', [
    'uses' => 'Facturacion\CompraProducto@imprimirFactura',
    'as' => 'factura.compra.impresion',
  ]);

  Route::get('reporte', [
    'uses' => 'Facturacion\Reporte@index',
    'as' => 'factura.reporte'
  ]);

  Route::get('reporteFiltro', [
    'uses' => 'Facturacion\Reporte@reporte',
    'as' => 'ReporteFiltro'
  ]);



  Route::get('compra/{cantidad}/{id_producto}', [
    'as' => 'compra',
    'uses' => 'Facturacion\CompraProducto@compra'

  ]);




  Route::get('reporteDetalle', [
    'uses' => 'Facturacion\Reporte@reporte_detalle',
    'as' => 'ReporteDetalle'
  ]);
});
