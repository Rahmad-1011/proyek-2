<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Courier;

class CouriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['id' => '1', 'code' => 'jne', 'title' => 'JNE'],
        	['id' => '2', 'code' => 'pos', 'title' => 'POS'],
        	['id' => '3', 'code' => 'tiki', 'title' => 'TIKI']
        ];
        Courier::insert($data);
    }
}
