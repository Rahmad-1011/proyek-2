<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Auth;
use Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Kategori;

class ClientController extends Controller
{
	function Beranda(){
		$data['list_produk'] = Produk::paginate(12);
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.beranda', $data);
	}

	function ListProduk(){
		$data['list_produk'] = Produk::paginate(12);
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.list-produk', $data);
	}

	function DetailProduk(Produk $produk){
		$data['produk'] = $produk;
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.detail-produk', $data);
	}

	function Pesanan(Request $request, $id){
		$produk = Produk::where('id', $id)->first();
		$tanggal = Carbon::now();

		//Validasi apakah melebihi stok
		if($request->jumlah_pesanan > $produk->stok){
			return redirect()->back();
		}

		//Cek validasi
		$cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
		//simpan ke db pesanan
		if(empty($cek_pesanan)){
			$pesanan = new Pesanan;
			$pesanan->user_id = Auth::user()->id;
			$pesanan->tanggal = $tanggal;
			$pesanan->status = 0;
			$pesanan->jumlah_harga = 0;
			$pesanan->save();
		}

		//pesanan detail
		$pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

		//cek pesanan detail
		$cek_pesanan_detail = PesananDetail::where('produk_id', $produk->id)->where('pesanan_id', $pesanan_baru->id)->first();
		if(empty($cek_pesanan_detail)){
			$pesanan_detail = new PesananDetail;
			$pesanan_detail->produk_id = $produk->id;
			$pesanan_detail->pesanan_id = $pesanan_baru->id;
			$pesanan_detail->jumlah = $request->jumlah_pesanan;
			$pesanan_detail->jumlah_harga = $produk->harga * $request->jumlah_pesanan;
			$pesanan_detail->save();
		}else{
			$pesanan_detail = PesananDetail::where('produk_id', $produk->id)->where('pesanan_id', $pesanan_baru->id)->first();
			$pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesanan;

			//harga sekarang
			$harga_pesanan_detail_baru = $produk->harga * $request->jumlah_pesanan;
			$pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
			$pesanan_detail->update();
		}

		//jumlah total
		$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
		$pesanan->jumlah_harga = $pesanan->jumlah_harga + $produk->harga * $request->jumlah_pesanan;
		$pesanan->update();

		return redirect()->back()->with('success', 'Pesanan Berhasil Ditambahkan');
	}

	function Checkout(){
		$data['pesanan'] = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
		if(!empty($data['pesanan'])){
			$data['pesanan_details'] = PesananDetail::where('pesanan_id', $data['pesanan']->id)->get();
		}
		
		return view('Pembeli.chart', $data);
	}

	public function DeleteCheckout($id){
		$pesanan_detail = PesananDetail::where('id', $id)->first();

		$pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
		$pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
		$pesanan->update();

		$pesanan_detail->delete();

		return redirect('checkout')->with('danger', 'Pesanan Berhasil Dihapus');
	}

	public function KonfirmasiCheckout(){
		$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
		$pesanan_id = $pesanan->id;
		$pesanan->status = 1;
		$pesanan->update();

		$pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
		foreach ($pesanan_details as $pesanan_detail){
			$produk = Produk::where('id', $pesanan_detail->produk_id)->first();
			$produk->stok = $produk->stok-$pesanan_detail->jumlah;
			$produk->update();
		}

		return redirect('checkout');

	}

	function filter(){
		$kategori = request ('id_kategori');
		$data['id_kategori'] = $kategori;
		$data['list_kategori'] = Kategori::all();
		$data['harga_min'] = $harga_min = request('harga_min');
		$data['harga_max'] = $harga_max = request('harga_max');
		$data['list_produk'] = Produk::where('id_kategori', "$kategori")->paginate(12);
		return view('home', $data);
	}

}