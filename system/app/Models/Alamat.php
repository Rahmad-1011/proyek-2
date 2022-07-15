<?php

namespace App\Models;

use App\Models\Traits\Attributes\ProdukAttributes;
use App\Models\Traits\Relations\ProdukRelations;
use App\Models\User;

class Alamat extends Model{

	use ProdukAttributes, ProdukRelations;

	protected $table = 'alamat';
	protected $guarded = ['id'];

	protected $casts = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime',
	];

	function pembeli(){
        return $this->belongsTo(User::class);
    }
	
}