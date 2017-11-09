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

  Route::get('metodoPago/{metodo}/{valorTotal}/{idCliente}/{NumeroCuotas}/{idFactura}', [
    'uses' => 'Facturacion\MetodoDePago@metodoPago'
  ]);

  Route::get('/registrarProductos/{id_producto}/{cantidad}/{idFactura}', [
    'uses' => 'Facturacion\CompraProducto@registrarProductos'
  ]);

  Route::get('validacion', [
    'uses' => 'Facturacion\ValidarCliente@validar',
    'as' => 'factura.validacion.validar',  
  ]);

  Route::get('indexFactura', [
    'uses' => 'Facturacion\ValidarCliente@index',
    'as' => 'factura.validacion.index',
  ]);

  Route::get('Factura', [
    'uses' => 'Facturacion\CompraProducto@index',
    'as' => 'factura.compra.index',
  ]);

  Route::get('FacturaImpresion', [
    'uses' => 'Facturacion\CompraProducto@imprimirFactura',
    'as' => 'factura.compra.impresion',
  ]);


});

//Cartera::reoutes();
