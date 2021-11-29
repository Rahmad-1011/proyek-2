<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function Profile(){
    	$data['user'] = User::where('id', Auth::user()->id)->first();
    	
        return view('Pembeli.profile', $data);
    }

    public function Update(Request $request){

    	$user = User::where('id', Auth::user()->id)->first();
    	$user->nama = request('nama');
    	$user->no_hp = request('no_hp');
    	$user->alamat = request('alamat');
		$user->email= request('email');
		if(request('password')) $user->password = bcrypt(request('password'));
		$user-> update();
    	
        return redirect('profile')->with('success', 'Edit Profil Berhasil');
    }
}
