<?php

namespace App\Models;
use Illuminate\Support\Str;
use App\Models\Produk;

class Kategori extends Model{
	protected $table = 'kategori';
	protected $guarded =['id'];


	public function produk(){
		return $this->hasMany(Produk::class, 'id_kategori');
	}
}