<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function createAdmin(){
    	return view ('Admin.User.registrasi');
    }
    public function createToko(){
        return view ('Toko.User.register');
    }
    public function createPembeli(){
        return view ('Pembeli.User.register');
    }
    public function store(){
		$user = new User;
        $user->level= request('level');
        $user->nama= request('nama');
        $user->email= request('email');
        $user->password= bcrypt(request('password'));
        $user-> save();

		return redirect('maok/login')->with('success', 'Registrasi berhasil Berhasil Ditambah');
	}
    public function beranda(){
        $data['list_user'] = User::orderBy('level')->get();
        return view('Admin.User.beranda', $data);
    }
}
