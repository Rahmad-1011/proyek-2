<?php

namespace App\Models;
use Illuminate\Support\Str;

class Pembayaran extends Model{
	protected $table = 'pembayaran';
	protected $guarded =['id'];


	function handleUploadFoto(){
		if(request()->hasFile('foto')){
			$foto = request()->file('foto');
			$destination = "images/pembayaran";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr.".".$foto->extension();
			$url = $foto->storeAs($destination, $filename);
			$this->foto = "app/".$url;
			$this->save;
		}
	}
	function handleDeleteFoto(){
		$foto = $this->foto;
		$path = public_path($foto);
		if(file_exists($path)){
			unlink($path);
		}
		return true;
	}

	function pesanan(){
		return $this->hasMany(Pesanan::class, 'pembayaran_id');
	}
}