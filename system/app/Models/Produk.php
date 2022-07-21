<?php

namespace App\Models;

use App\Models\Traits\Attributes\ProdukAttributes;
use App\Models\Traits\Relations\ProdukRelations;
use App\Models\User;
use App\Models\PesananDetail;

class Produk extends Model{

	use ProdukAttributes, ProdukRelations;

	protected $table = 'produk';
	protected $guarded = ['id'];

	protected $casts = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime',
	];

	function penjual(){
        return $this->belongsTo(User::class, 'user_id');
    }

    function pesanan_detail(){
    	return $this->hasMany(PesananDetail::class, 'produk_id');
    }

    function komentar(){
    	return $this->hasMany(Komentar::class, 'produk_id');
    }
	
}