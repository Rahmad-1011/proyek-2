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
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\KomentarController;


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
	Route::get('maok', [ClientController::class, 'BerandaGuest']);
	Route::get('maok/produk', [ClientController::class, 'ListProdukGuest']);
	Route::post('maok/produk/cari', [ClientController::class, 'CariProdukGuest']);
	Route::get('maok/produk-kategori/{kategori:slug}', [ClientController::class, 'KategoriProdukGuest']);
	Route::get('maok/produk/{produk}', [ClientController::class, 'DetailProdukGuest']);

	//Toko
	Route::get('maok/toko', [ClientController::class, 'ListTokoGuest']);
	Route::get('maok/toko/{user}', [ClientController::class, 'DetailToko']);
	

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
			Route::resource('pembayaran', PembayaranController::class);
			Route::post('pembayaran/{pembayaran}', [PembayaranController::class, 'update']);
			Route::get('0', [AdminController::class, 'Admin']);
			Route::get('0/{user}', [AdminController::class, 'DetailAdmin']);
			Route::get('toko', [AdminController::class, 'Toko']);
			Route::get('toko/{user}', [AdminController::class, 'DetailToko']);
			Route::get('toko/detail-produk/{produk}', [AdminController::class, 'DetailProduk']);
			Route::delete('toko/hapus-produk/{produk}', [AdminController::class, 'HapusProduk']);
			Route::get('pembeli', [AdminController::class, 'Pembeli']);
			Route::get('pembeli/{pembeli}', [AdminController::class, 'DetailPembeli']);
			Route::get('slider', [AdminController::class, 'Slider']);
			Route::post('edit-slider', [AdminController::class, 'EditSlider']);
		});
	});

	//Toko
	Route::group(['middleware'=>['CheckLogin:1']], function(){
		Route::prefix('Toko')->group(function(){
			Route::get('beranda', [TokoController::class, 'beranda']);
			Route::resource('produk', ProdukController::class);
			Route::get('komentar', [KomentarController::class, 'Index']);
			Route::get('komentar/{produk}', [KomentarController::class, 'BalasKomentar']);
			Route::post('komentar/{produk}', [KomentarController::class, 'PostKomentar']);
			Route::get('profile', [TokoController::class, 'Profile']);
			Route::post('profile', [TokoController::class, 'Update']);
			Route::get('profile/ganti-password', [TokoController::class, 'GantiPassword']); 
			Route::post('profile/ganti-password', [ProfileController::class, 'Store']);
			Route::get('pesanan', [TokoController::class, 'Pesanan']);
			Route::get('pesanan/{pesanan}', [TokoController::class, 'DetailPesanan']);
			Route::put('pesanan/{pesanan_detail}/kirim', [TokoController::class, 'statusPengiriman']);
		});
	});

	//Pembeli
	Route::group(['middleware'=>['CheckLogin:2']], function(){
		Route::get('beranda', [ClientController::class, 'Beranda']);
		Route::get('produk', [ClientController::class, 'ListProduk']);
		Route::post('produk/cari', [ClientController::class, 'CariProduk']);
		Route::get('produk-kategori/{kategori:slug}', [ClientController::class, 'KategoriProduk']);
		Route::get('produk/{produk}', [ClientController::class, 'DetailProduk']);
		Route::post('produk/{produk}/qty', [ClientController::class, 'Pesanan']);
		Route::post('produk/{produk}', [KomentarController::class, 'PostKomentar']);
		Route::post('produk/filter', [ClientController::class, 'Filter']);

		//Toko
		Route::get('toko', [ClientController::class, 'ListToko']);
		Route::get('toko/{user}', [ClientController::class, 'DetailToko']);

		//Checkout
		Route::get('keranjang', [ClientController::class, 'Checkout']);
		Route::delete('keranjang/{id}', [ClientController::class, 'DeleteCheckout']);
		Route::get('konfirmasi-checkout', [ClientController::class, 'KonfirmasiCheckout']);


		//Profile
		Route::get('profile', [ProfileController::class, 'Profile']);
		Route::put('profile', [ProfileController::class, 'Update']);
		Route::get('ganti-password', [ProfileController::class, 'GantiPassword']);
		Route::post('ganti-password', [ProfileController::class, 'Store']);

		//Pemesanan
		Route::get('pemesanan', [ClientController::class, 'Pemesanan']);
		Route::post('konfirmasi-pemesanan', [ClientController::class, 'KonfirmasiPemesanan']);

		//pembayaran
		Route::get('pembayaran', [ClientController::class, 'Pembayaran']);
		Route::post('konfirmasi-pembayaran', [ClientController::class, 'KonfirmasiPembayaran']);


		Route::get('/list-produk', function () {
		    return view('Pembeli.list-produk');
		});
	});
});



