<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use cursorPaginate;
use Paginate;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function Profile(){
        $data['list_kategori'] = Kategori::withCount('produk')->get();
        $data['list_pesanan'] = Pesanan::select('pesanan')
        ->join('pesanan_detail','pesanan_detail.pesanan_id','=','pesanan.id')
        ->join('produk','produk.id','=','pesanan_detail.produk_id')
        ->where('pesanan.user_id', Auth::id())
        ->where('pesanan.nama_penerima','>','1')
        ->select('pesanan.*','produk.*','pesanan_detail.*')
        ->paginate(3);
    	$data['user'] = User::where('id', Auth::user()->id)->first();
    	
        return view('Pembeli.profile', $data);
    }

    public function Update(Request $request){

    	$user = User::where('id', Auth::user()->id)->first();
    	$user->nama = request('nama');
    	$user->no_hp = request('no_hp');
    	$user->alamat = request('alamat');
        $user->handleUploadFoto();
		$user->email= request('email');
		$user-> update();
    	
        return redirect('profile')->with('success', 'Edit Profil Berhasil');
    }


    public function GantiPassword(){
        $data['list_kategori'] = Kategori::withCount('produk')->get();
        $data['user'] = User::where('id', Auth::user()->id)->first();

        return view('Pembeli.User.ganti-password', $data);
    }

    public function Store(Request $request){
        $request->validate([
            'baru' => 'required|min:8|max:255'
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
                        return redirect('maok/login')->with('warning', 'Masukan Password Baru');

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
