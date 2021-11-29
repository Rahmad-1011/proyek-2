<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function beranda(User $user){
    	$data['user'] = $user;
        return view('Admin.beranda', $data);
    }

    public function profil(User $user){
    	$data['user'] = $user;
        return view('Admin.User.profil', $data);
    }
}
