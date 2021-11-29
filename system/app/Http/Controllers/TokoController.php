<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function beranda(){
    	
        return view('Toko.beranda');
    }

    public function Profile(){
    	$data['user'] = User::where('id', Auth::user()->id)->first();
    	
        return view('Toko.User.profile', $data);
    }

    public function Update(Request $request){

    	$user = User::where('id', Auth::user()->id)->first();
    	$user->nama = request('nama');
    	$user->no_hp = request('no_hp');
    	$user->alamat = request('alamat');
		$user->email= request('email');
		$user->handleUploadFoto();
		if(request('password')) $user->password = bcrypt(request('password'));
		$user-> update();
    	
        return redirect('Toko/profile')->with('success', 'Edit Profil Berhasil');
    }
}
