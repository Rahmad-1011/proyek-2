<?php

namespace App\Models;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Support\Str;

class PesananDetail extends Model{
	protected $table = 'pesanan_detail';

	function produk(){
		return $this->belongsTo(Produk::class, 'produk_id', 'id');
	}

	function pesanan(){
		return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
	}

	function handleUploadBukti(){
		if(request()->hasFile('bukti')){
			$bukti = request()->file('bukti');
			$destination = "images/bukti/pesanan";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr.".".$bukti->extension();
			$url = $bukti->storeAs($destination, $filename);
			$this->bukti = "app/".$url;
			$this->save;
		}
	}
	function handleDeleteFoto(){
		$bukti = $this->bukti;
		return true;
	}

}