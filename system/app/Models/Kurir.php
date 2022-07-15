<?php

namespace App\Models;
use Illuminate\Support\Str;

class Kurir extends Model{
	protected $table = 'kurir';
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
		return true;
	}

	function pesanan(){
		return $this->hasMany(Pesanan::class, 'kurir_id');
	}
}