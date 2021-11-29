<?php

namespace App\Models;
use App\Models\Pesanan;
use App\Models\Produk;

class PesananDetail extends Model{
	protected $table = 'pesanan_detail';

	function produk(){
		return $this->belongsTo(Produk::class, 'produk_id', 'id');
	}

	function pesanan_detail(){
		return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
	}
}