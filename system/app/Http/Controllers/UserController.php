<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
    public function store(Request $request){

        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);

		$user = new User;
        $user->level= request('level');
        $user->nama= request('nama');
        $user->email= request('email');
        $user->password= bcrypt(request('password'));
        $user-> save();

		return redirect('maok/login')->with('success', 'Registrasi Berhasil Dilakukan');
	}
    function destroy(User $user){
        $user->handleDeleteFoto();
        $user->delete();

        return redirect()->back()-> with ('danger', 'Data berhasil dihapus');

    }
}
