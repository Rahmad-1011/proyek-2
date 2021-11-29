<?php
namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\User;

class KategoriController extends Controller{
	
	function index(){
		$data['list_kategori'] = Kategori::all();
		return view('Admin.Kategori.index', $data);
	}

	function create(){
		return view('Admin.Kategori.create');

	}

	function store(){
		$kategori = new kategori;
		$kategori-> nama = request('nama');
		$kategori-> save();

		return redirect ('Admin/kategori')-> with ('success', 'Kategori berhasil ditambahkan');

	}

	function show(Kategori $kategori){
		$data['kategori'] = $kategori;
		return view('Admin.Kategori.show', $data);

	}

	function edit(Kategori $kategori){
		$data['kategori'] = $kategori;
		return view('Admin.Kategori.edit', $data);
	}

	function update(Kategori $kategori){
		$kategori-> nama = request('nama');
		$kategori-> save();

		return redirect ('Admin/kategori')-> with ('success', 'Kategori berhasil diedit');

	}

	function destroy(Kategori $kategori){
		$kategori->delete();

		return redirect ('Admin/kategori')-> with ('danger', 'Kategori berhasil dihapus');
	}

}