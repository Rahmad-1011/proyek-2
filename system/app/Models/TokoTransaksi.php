<?php

namespace App\Models;
use Illuminate\Support\Str;
use App\Models\Produk;
use App\Models\User;
use App\Models\Pembayaran;

class TokoTransaksi extends Model{
	protected $table = 'toko_transaksi';
	protected $guarded =['id'];


	public function penjual(){
		return $this->hasMany(User::class, 'user_id');
	}

	public function pembayaran(){
		return $this->belongsTo(Pembayaran::class, 'pembayaran_id');
	}
}