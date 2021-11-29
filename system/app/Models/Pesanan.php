<?php

namespace App\Models;
use App\Models\PesananDetail;
use App\Models\User;

class Pesanan extends Model{
	protected $table = 'pesanan';

	function user(){
		return $this->belongsTo(User::class, 'user_id', 'id');
	}

	function pesanan_detail(){
		return $this->hasMany(PesananDetail::class, 'pesanan_id', 'id');
	}
}