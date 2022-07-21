<?php

namespace App\Models;
use Illuminate\Support\Str;
use App\Models\Produk;
use App\Models\User;

class Komentar extends Model{
	protected $table = 'komentar';
	protected $guarded =['id'];


	public function produk(){
		return $this->belongsTo(Produk::class, 'produk_id');
	}

	public function user(){
		return $this->belongsTo(User::class);
	}

	public function childs(){
		return $this->hasMany(Komentar::class, 'parent');
	}

	function handleUploadFoto(){
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