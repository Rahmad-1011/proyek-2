<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Auth;
use App\Models\User;
use App\Models\Kategori;
 
class produkcontroller extends Controller {
	function index(){
		$data['user'] = User::where('id', Auth::user()->id)->first();
		$user = request()->user();
		$data['list_produk'] = $user->produk;
		$data['list_kategori'] = Kategori::all();
		return view('Toko.Produk.index', $data);
	}

	function create(){
		$data['user'] = User::where('id', Auth::user()->id)->first();
		$data['list_kategori'] = Kategori::all();
		return view('Toko.Produk.create', $data);

	}

	function store(){
		$produk = new produk;
		$produk-> user_id = request()->user()->id;
		$produk-> nama = request('nama');
		$produk-> id_kategori = request('id_kategori');
		$produk-> harga = request('harga');
		$produk-> berat = request('berat');
		$produk-> stok = request('stok');
		$produk-> deskripsi = request('deskripsi');
		$produk->handleUploadFoto();

		$produk-> save();


		return redirect ('Toko/produk')-> with ('success', 'Data Produk berhasil ditambahkan');

	}

	function show(Produk $produk){
		$data['user'] = User::where('id', Auth::user()->id)->first();
		$data['produk'] = $produk;
		return view('Toko.Produk.show', $data);

	}

	function edit(Produk $produk){
		$data['user'] = User::where('id', Auth::user()->id)->first();
		$data['list_kategori'] = Kategori::all();
		$data['produk'] = $produk;
		return view('Toko.Produk.edit', $data);
	}

	function update(Produk $produk){
		$produk-> nama = request('nama');
		$produk-> harga = request('harga');
		$produk-> berat = request('berat');
		$produk-> stok = request('stok');
		$produk-> deskripsi = request('deskripsi');
		$produk->handleUploadFoto();
		$produk-> save();


		return redirect ('Toko/produk')-> with ('success', 'Data Produk berhasil diedit');

	}

	function destroy(Produk $produk){
		$produk->handleDeleteFoto();
		$produk->delete();

		return redirect ('Toko/produk')-> with ('danger', 'Data Produk berhasil dihapus');

	}

	function filter(){
		$kategori = request ('id_kategori');
		$data['id_kategori'] = $kategori;
		$data['list_kategori'] = Kategori::all();
		$data['harga_min'] = $harga_min = request('harga_min');
		$data['harga_max'] = $harga_max = request('harga_max');
		$data['list_produk'] = Produk::where('id_kategori', "$kategori")->whereBetween('harga', [$harga_min, $harga_max])->get();
		return view('Toko.Produk.index', $data);
	}

	function cari(){
		$nama = request('nama');
		$data['nama'] = $nama;
		$data['list_produk'] = Produk::where('nama', 'like', "%$nama%")->get();
		return view('Toko.Produk.index', $data);
	}

}