<?php

namespace App\Models;
use App\Models\PesananDetail;
use App\Models\User;
use App\Models\Pembayaran;
use App\Models\Transaksi;
use Illuminate\Support\Str;

class Pesanan extends Model{
	protected $table = 'pesanan';

	function user(){
		return $this->belongsTo(User::class, 'user_id', 'id');
	}

	function pesanan_detail(){
		return $this->hasMany(PesananDetail::class, 'pesanan_id');
	}

	function kurir(){
		return $this->belongsTo(Kurir::class, 'kurir_id', 'id');
	}

	function pembayaran(){
		return $this->belongsTo(Pembayaran::class);
	}


	function handleUploadFoto(){
		if(request()->hasFile('foto')){
			$foto = request()->file('foto');
			$destination = "images/pesanan";
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