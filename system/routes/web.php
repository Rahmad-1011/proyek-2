<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;


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

Route::get('/maok/login', [AuthController::class, 'showLogin']);
Route::post('/maok/login', [AuthController::class, 'LoginProcess']);
Route::get('maok/logout', [AuthController::class, 'logout']);
Route::get('Admin/registrasi', [UserController::class, 'createAdmin']);
Route::resource('Admin/user', UserController::class);

Route::get('Toko/registrasi', [UserController::class, 'createToko']);
Route::resource('Toko/user', UserController::class);

Route::get('Pembeli/registrasi', [UserController::class, 'createPembeli']);
Route::resource('Pembeli/user', UserController::class);



Route::group(['middleware'=>['auth']], function(){
	Route::group(['middleware'=>['CheckLogin:0']], function(){
		Route::prefix('Admin')->group(function(){
			Route::get('beranda', [AdminController::class, 'beranda']);
			Route::get('profil', [AdminController::class, 'profil']);
			Route::resource('kategori', KategoriController::class);
			Route::get('user', [UserController::class, 'beranda']);
		});
	});
	Route::group(['middleware'=>['CheckLogin:1']], function(){
		Route::prefix('Toko')->group(function(){
			Route::get('beranda', [TokoController::class, 'beranda']);
			Route::resource('produk', ProdukController::class);
			Route::get('profile', [TokoController::class, 'Profile']);
			Route::post('profile', [TokoController::class, 'Update']);
		});
	});
	Route::group(['middleware'=>['CheckLogin:2']], function(){
		Route::get('beranda', [ClientController::class, 'Beranda']);
		Route::get('produk', [ClientController::class, 'ListProduk']);
		Route::get('produk/{produk}', [ClientController::class, 'DetailProduk']);
		Route::post('produk/{produk}', [ClientController::class, 'Pesanan']);
		Route::get('checkout', [ClientController::class, 'Checkout']);
		Route::delete('checkout/{id}', [ClientController::class, 'DeleteCheckout']);
		Route::get('konfirmasi-checkout', [ClientController::class, 'KonfirmasiCheckout']);
		Route::get('profile', [ProfileController::class, 'Profile']);
		Route::post('profile', [ProfileController::class, 'Update']);
		Route::get('/list-produk', function () {
		    return view('Pembeli.list-produk');
		});
	});
});



