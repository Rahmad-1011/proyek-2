<?php

namespace App\Models;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\Pembayaran;

class Transaksi extends Model{
	protected $table = 'transaksi';


	function pesanan(){
		return $this->belongsTo(Pesanan::class, 'pesanan_id');
	}

	function handleUploadFoto(){
		if(request()->hasFile('foto')){
			$foto = request()->file('foto');
			$destination = "images/transaksi";
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

}