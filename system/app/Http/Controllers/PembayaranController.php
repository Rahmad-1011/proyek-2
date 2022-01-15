<?php
namespace App\Http\Controllers;
use App\Models\Pembayaran;

class PembayaranController extends Controller{
	
	function index(){
		$data['list_pembayaran'] = Pembayaran::all();
		return view('Admin.Pembayaran.index', $data);
	}

	function create(){
		return view('Admin.Pembayaran.create');

	}

	function store(){
		$pembayaran = new Pembayaran;
		$pembayaran-> nama = request('nama');
		$pembayaran-> rekening = request('rekening');
		$pembayaran-> atas_nama = request('atas_nama');
		$pembayaran-> pajak = request('pajak');
		$pembayaran->handleUploadFoto();
		$pembayaran-> save();

		return redirect ('Admin/pembayaran')-> with ('success', 'Metode Pembayaran berhasil ditambahkan');

	}

	function show(Pembayaran $pembayaran){
		$data['pembayaran'] = $pembayaran;
		return view('Admin.Pembayaran.show', $data);

	}

	function edit(Pembayaran $pembayaran){
		$data['pembayaran'] = $pembayaran;
		return view('Admin.Pembayaran.edit', $data);
	}

	function update(Pembayaran $pembayaran){
		$pembayaran-> nama = request('nama');
		$pembayaran-> rekening = request('rekening');
		$pembayaran-> atas_nama = request('atas_nama');
		$pembayaran-> pajak = request('pajak');
		$pembayaran->handleUploadFoto();
		$pembayaran-> save();

		return redirect ('Admin/pembayaran')-> with('success', 'Metode Pembayaran berhasil diedit');

	}

	function destroy(Pembayaran $pembayaran){
		$pembayaran->handleDeleteFoto();
		$pembayaran->delete();

		return redirect ('Admin/pembayaran')-> with ('danger', 'Metode Pembayaran berhasil dihapus');
	}

}