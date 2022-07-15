<?php

namespace App\Models;

use App\Models\Traits\Attributes\ProdukAttributes;
use App\Models\Traits\Relations\ProdukRelations;
use App\Models\User;
use App\ModelsPesananDetail;

class Sementara extends Model{

	use ProdukAttributes, ProdukRelations;

	protected $table = 'sementara';
	protected $guarded = ['id'];

	protected $casts = [
		'created_at' => 'timestamp',
		'updated_at' => 'timestamp',
	];

	
}