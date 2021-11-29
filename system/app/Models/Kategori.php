<?php

namespace App\Models;
use App\Models\Produk;

class Kategori extends Model{
	protected $table = 'kategori';

	function produk(){
		return $this->hasMany(Produk::class, 'id_kategori');
	}
}