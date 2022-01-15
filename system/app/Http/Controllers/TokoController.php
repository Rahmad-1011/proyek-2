<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\PesananDetail;

class TokoController extends Controller
{
    public function beranda(){
        $data['user'] = User::where('id', Auth::user()->id)->first();
        $data['produk'] = $data['user']->produk;
        $data['pesanan'] = Pesanan::select('pesanan')
        ->join('pesanan_detail','pesanan_detail.pesanan_id','=','pesanan.id')
        ->join('produk','produk.id','=','pesanan_detail.produk_id')
        ->join('users', 'users.id','=','pesanan.user_id')
        ->select('pesanan.*','produk.*','users.*','pesanan_detail.*','users.nama as nama_pemesan')
        ->where('pesanan.status',3)
        ->where('produk.user_id', Auth::id())
        ->get();
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

    function Pesanan(){
        $data['login'] = Auth::id();
        $data['list_pesanan'] = Pesanan::select('pesanan')
        ->join('pesanan_detail','pesanan_detail.pesanan_id','=','pesanan.id')
        ->join('produk','produk.id','=','pesanan_detail.produk_id')
        ->join('users', 'users.id','=','pesanan.user_id')
        ->select('pesanan.*','produk.*','users.*','pesanan_detail.*','users.nama as nama_pemesan', 'pesanan_detail.status as status_pesanan')
        ->where('pesanan.status',3)
        ->where('produk.user_id', Auth::id())
        ->get();
        return view('Toko.Transaksi.pesanan', $data);
    }

    function DetailPesanan(Pesanan $pesanan){
        $data['pesanan'] = $pesanan;
        if(!empty($data['pesanan'])){
            $data['pesanan_details'] = PesananDetail::where('pesanan_id', $data['pesanan']->id)->get();
        }
        return view('Toko.Transaksi.detail-pesanan', $data);
    }

    function statusPengiriman(PesananDetail $pesanan_detail){
        $pesanan_detail->status =  request('status');
        $pesanan_detail->save();
        
        return redirect('Toko/pesanan')->with('success', 'Pesanan berhasil Di kirim');
    }
}
