<?php

namespace App\Models\Traits\Relations;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Komentar;

use App\Models\PesananDetail;


trait ProdukRelations{
	function seller(){
		return $this->belongsTo(User::class, 'user_id');
	}
	function kategori(){
		return $this->belongsTo(Kategori::class, 'id_kategori');
	}
	function pesanan_detail(){
		return $this->hasMany(PesananDetail::class, 'produk_id', 'id');
	}
	function komentar(){
		return $this->hasMany(Komentar::class, 'produk_id', 'id');
	}
}