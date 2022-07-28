<?php

namespace App\Models;

use App\Models\Traits\Attributes\ProdukAttributes;
use App\Models\Traits\Relations\ProdukRelations;
use App\Models\User;

class Tarif extends Model{

	use ProdukAttributes, ProdukRelations;

	protected $table = 'tarif';
	protected $guarded = ['id'];

	protected $casts = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime',
	];

	function pembeli(){
        return $this->belongsTo(User::class);
    }
	
}