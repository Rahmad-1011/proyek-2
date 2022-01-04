<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;

class TokoController extends Controller
{
    public function beranda(){
        $data['user'] = User::where('id', Auth::user()->id)->first();
        $data['produk'] = $data['user']->produk;
        $data['kategori'] = Kategori::all();
    	
        return view('Toko.beranda', $data);
    }

    public function BalasKomentar(){
        return view('Toko.Komentar.index');
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
		$user-> update();
    	
        return redirect('Toko/profile')->with('success', 'Edit Profil Berhasil');
    }

    public function GantiPassword(){
        $data['user'] = User::where('id', Auth::user()->id)->first();

        return view('Toko.User.ganti-password');
    }

    public function Store(Request $request){
        $request->validate([
            'password' => 'required|min:8|max:255'
        ]);
        $data = request()->all();

        if(request('lama')){
            if(request('lama')){
                $user = Auth::user();
                $check = Hash::check(request('lama'), $user->password);
                if($check){
                    if(request('baru') == request('konfirmasi')){

                        $user->password = bcrypt(request('baru'));
                        $user->save();

                        Auth::logout();
                        return redirect('maok/logout')->with('warning', 'Masukan Password Baru');

                    }else{
                        return back()->with('danger', 'Konfirmasi Password Tidak Sesuai');
                    }
            }else{
                return back()->with('danger', 'Password Lama Anda Salah');
            }
        }else{
            return back()->with('danger', 'Password Lama Kosong');
            }
        }
    }
}
