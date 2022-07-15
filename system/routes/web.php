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
use App\Http\Controllers\KurirController;
use App\Http\Controllers\TransaksiController;


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
	Route::get('beranda', [ClientController::class, 'Beranda']);
		Route::get('produk', [ClientController::class, 'ListProduk']);
		Route::post('produk/cari', [ClientController::class, 'CariProduk']);
		Route::get('produk/{produk}', [ClientController::class, 'DetailProduk']);
		//Toko
		Route::get('toko', [ClientController::class, 'ListToko']);
		Route::get('toko/{user}', [ClientController::class, 'DetailToko']);
	

Route::get('/maok/login', [AuthController::class, 'showLogin']);
Route::post('/maok/login', [AuthController::class, 'LoginProcess']);
Route::get('maok/logout', [AuthController::class, 'logout']);
Route::get('maok/lupa-password', [AuthController::class, 'lupa-password']);


Route::get('Admin/registrasi', [UserController::class, 'createAdmin']);
Route::resource('Admin/user', UserController::class);

Route::post('maok/registrasi', [UserController::class, 'store']);


Route::group(['middleware'=>['auth']], function(){
	Route::group(['middleware'=>['CheckLogin:0']], function(){
		Route::prefix('Admin')->group(function(){
			Route::get('beranda', [AdminController::class, 'beranda']);
			Route::get('profil', [AdminController::class, 'profil']);
			Route::resource('kategori', KategoriController::class);
			Route::resource('kurir', KurirController::class);
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

			Route::get('transaksi', [TransaksiController::class, 'index']);
			Route::post('konfirmasi-transaksi/{pesanan}', [TransaksiController::class, 'konfirmasitransaksi']);
			Route::delete('transaksi/{id}', [TransaksiController::class, 'destroy']);
		});
	});

	//Toko
	Route::post('Toko/produk', [ProdukController::class, 'store']);
	Route::group(['middleware'=>['CheckLogin:1']], function(){
		Route::prefix('Toko')->group(function(){
			Route::get('beranda', [TokoController::class, 'beranda']);
			Route::resource('produk', ProdukController::class);
			Route::get('komentar', [KomentarController::class, 'Index']);
			Route::get('komentar/{produk}', [KomentarController::class, 'BalasKomentar']);
			Route::post('komentar/{produk}', [KomentarController::class, 'PostKomentar']);
			Route::get('profile', [TokoController::class, 'Profile']);
			Route::get('profile/{id}', [TokoController::class, 'GetCity']);
			Route::post('profile', [TokoController::class, 'Update']);
			Route::get('profile/ganti-password', [TokoController::class, 'GantiPassword']); 
			Route::post('profile/ganti-password', [ProfileController::class, 'Store']);
			Route::get('pesanan', [TokoController::class, 'Pesanan']);
			Route::put('pesanan/kirim/{pesanan_detail}', [TokoController::class, 'statusPengiriman']);
			Route::delete('pesanan/{id}', [TokoController::class, 'destroy']);

			Route::get('pembayaran', [TokoController::class, 'Pembayaran']);
			Route::post('pembayaran', [TokoController::class, 'SimpanPembayaran']);
		});
	});

	//Pembeli
		
		
	Route::group(['middleware'=>['CheckLogin:2']], function(){
		// Route::get('produk-kategori/{kategori:slug}', [ClientController::class, 'KategoriProduk']);
		Route::post('produk/{produk}/qty', [ClientController::class, 'Pesanan']);
		Route::post('produk/{produk}', [KomentarController::class, 'PostKomentar']);
		Route::post('produk/filter', [ClientController::class, 'Filter']);

		Route::get('produk/kategori/{kategori}', [ClientController::class, 'ListProdukKategori']);


		//Checkout
		Route::get('keranjang', [ClientController::class, 'Checkout']);
		Route::delete('keranjang/{id}', [ClientController::class, 'DeleteCheckout']);
		Route::post('konfirmasi-checkout', [ClientController::class, 'KonfirmasiCheckout']);


		//Profile
		Route::get('profile', [ProfileController::class, 'Profile']);
		Route::get('profile/pesanan-saya', [ProfileController::class, 'Pesanan']);
		Route::put('profile', [ProfileController::class, 'Update']);
		Route::get('profile/ganti-password', [ProfileController::class, 'GantiPassword']);
		Route::post('profile/ganti-password', [ProfileController::class, 'Store']);
		Route::get('profile/alamat', [ProfileController::class, 'Alamat']);
		Route::post('profile/alamat', [ProfileController::class, 'SimpanAlamat']);
		Route::delete('profile/alamat/{id}', [ProfileController::class, 'HapusAlamat']);

		//Pemesanan
		Route::get('pemesanan', [ClientController::class, 'Pemesanan']);
		Route::get('pemesanan/{id}', [ClientController::class, 'GetCity']);
		Route::post('pemesanan', [ClientController::class, 'check_ongkir']);
		Route::post('konfirmasi-pemesanan/{id}', [ClientController::class, 'KonfirmasiPemesanan']);

		//pembayaran
		Route::get('pembayaran/{pesanan_detail}', [ClientController::class, 'Pembayaran']);
		Route::post('konfirmasi-pembayaran/{pesanan}', [ClientController::class, 'KonfirmasiPembayaran']);

		//Konfirmasi Barang Sampai
		Route::post('konfirmasi-barang/{pesanan}', [ClientController::class, 'KonfirmasiBarangSampai']);


		Route::get('/list-produk', function () {
		    return view('Pembeli.list-produk');
		});
	});
});



