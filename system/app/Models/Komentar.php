<?php

namespace App\Models;
use Illuminate\Support\Str;
use App\Models\Produk;
use App\Models\User;

class Komentar extends Model{
	protected $table = 'komentar';
	protected $guarded =['id'];


	public function komentar(){
		return $this->belongsTo(Produk::class, 'produk_id');
	}

	public function user(){
		return $this->belongsTo(User::class, 'users_id');
	}

	public function childs(){
		return $this->hasMany(Komentar::class, 'parent');
	}
}