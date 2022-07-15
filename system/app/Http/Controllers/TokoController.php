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
use App\Models\Province;
use App\Models\City;
use App\Models\TokoTransaksi;
use App\Models\Pembayaran;

use RajaOngkir;
    

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

    function Profile(){
    	$data['user'] = User::where('id', Auth::user()->id)->first();
        // $data['provinces'] = Province::pluck('title', 'province_id');

        // naldy
        $data['list_provinsi'] = Province::pluck('title', 'province_id');
        
    	
        return view('Toko.User.profile', $data);
    }

    function GetCity($id){
        $city = City::where('province_id', $id)->pluck('title', 'city_id');
        return json_encode($city);
    }

    public function Update(Request $request){

    	$user = User::where('id', Auth::user()->id)->first();
    	$user->nama = request('nama');
    	$user->no_hp = request('no_hp');
    	$user->alamat = request('alamat');
		$user->email= request('email');
        $user->province_id = request('province_origin');
        $user->city_id = request('city_origin');
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
        ->join('kurir', 'kurir.id', '=', 'pesanan.kurir_id')
        ->join('users', 'users.id','=','pesanan.user_id')
        ->select('pesanan.*','produk.*','users.*','pesanan_detail.*','pesanan.nama_penerima as nama_pemesan', 'pesanan_detail.status as status_pesanan', 'produk.nama as nama_produk', 'pesanan.foto as bukti_pembayaran', 'kurir.nama as nama_kurir', 'pesanan_detail.bukti as bukti_barang_diterima', 'pesanan.id as id_pesanan', 'pesanan.alamat as alamat_tujuan', 'pesanan.no_hp as no_hp_pemesan')
        ->where('pesanan.status','>=', '3')
        ->where('produk.user_id', Auth::id())
        ->get();


        return view('Toko.Transaksi.pesanan', $data);
    }

    function DetailPesanan(Pesanan $pesanan){
        
        return view('Toko.Transaksi.detail-pesanan', $data);
    }

    public function statusPengiriman(PesananDetail $pesanan_detail){
        $pesanan_detail->status =4;
        $pesanan_detail->update();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        // dd($pesanan);
        $pesanan->status = 4;
        $pesanan->update();

        // $pesanan = Pesanan::where('id', request('id'))->first();

        // $pesanan_id = $pesanan->id;
        // $pesanan->status = 4;
        // $pesanan->update();

        // $pesanan_detail = PesananDetail::where('pesanan_id', $pesanan->id)->where('status', 3)->first();
        // $pesanan_detail->status =4;
        // $pesanan_detail->update();
        
        return redirect('Toko/pesanan')->with('success', 'Pesanan berhasil Di kirim');
    }

    function destroy($id){
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan_detail->delete();

        return back()->with('danger', 'Data Transaksi berhasil dihapus');
    }


}
