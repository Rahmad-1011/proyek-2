<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Gambar;
use App\Models\Tarif;


class AdminController extends Controller
{
    public function beranda(User $user){
    	$data['user'] = $user;
        $data['produk'] = Produk::all();
        $data['toko'] = User::where('level',1)->get();
        $data['pembeli'] = User::where('level',2)->get();
        $data['kategori'] = Kategori::all();
        return view('Admin.beranda', $data);
    }

    public function profil(User $user){
    	$data['user'] = $user;
        return view('Admin.User.profil', $data);
    }

    public function Admin(){
        $data['list_user'] = User::where('level', 0)->get();
        return view('Admin.User.beranda', $data);
    }
    public function Toko(){
        $data['list_user'] = User::where('level', 1)->get();
        return view('Admin.User.beranda-toko', $data);
    }
    public function Pembeli(){
        $data['list_user'] = User::where('level', 2)->get();
        return view('Admin.User.beranda-pembeli', $data);
    }

    public function DetailAdmin(User $user){
        $data['user'] = $user;
        return view('Admin.User.detail', $data);
    }

    public function DetailToko(User $user){
        $data['user'] = $user;
        $data['list_produk'] = $user->produk;
        return view('Admin.User.show', $data);
    }

    public function DetailPembeli(User $user){
        $data['user'] = $user;
        return view('Admin.User.detail-pembeli', $data);
    }

    public function DetailProduk(Produk $produk){
        $data['produk'] = $produk;
        return view('Admin.User.produk', $data);
    }
    public function HapusProduk(Produk $produk){
        $produk->handleDeleteFoto();
        $produk->delete();

        return redirect()->back()-> with('danger', 'Data berhasil dihapus');
    }

    function tarif(){
        $data['list_tarif'] = Tarif::all();
        return view('Admin.Tarif.index', $data);
    }

    function simpantarif(){
        $alamat = new Tarif;
        $alamat->kode_asal = request('kode_asal');
        $alamat->kode_tujuan = request('kode_tujuan');
        $alamat->tarif = request('tarif');
        $alamat->save();

        return redirect()->back()->with('success', 'Data Tarif berhasil ditambahkan');
    }

}
