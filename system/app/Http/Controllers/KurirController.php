<?php
namespace App\Http\Controllers;
use App\Models\Kurir;
use App\Models\User;

class KurirController extends Controller{
	
	function index(){
		$data['list_kurir'] = Kurir::all();
		return view('Admin.Kurir.index', $data);
	}

	function create(){
		return view('Admin.Kurir.create');

	}

	function store(){
		$kurir = new Kurir;
		$kurir-> nama = request('nama');
		$kurir-> tarif = request('tarif');
		$kurir->handleUploadFoto();
		$kurir-> save();

		return redirect ('Admin/kurir')-> with ('success', 'Data Kurir berhasil ditambahkan');

	}

	function show(Kurir $kurir){
		$data['kurir'] = $kurir;
		return view('Admin.Kurir.show', $data);

	}

	function edit(Kurir $kurir){
		$data['kurir'] = $kurir;
		return view('Admin.Kurir.edit', $data);
	}

	function update(Kurir $kurir){
		$kurir-> nama = request('nama');
		$kurir-> tarif = request('tarif');
		$kurir->handleUploadFoto();
		$kurir-> save();

		return redirect ('Admin/kurir')-> with('success', 'Data Kurir berhasil diedit');

	}

	function destroy(Kurir $kurir){
		$kurir->handleDeleteFoto();
		$kurir->delete();

		return redirect ('Admin/kurir')-> with ('danger', 'Data Kurir berhasil dihapus');
	}

}