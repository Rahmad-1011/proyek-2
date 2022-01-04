<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\User;
use App\Models\Komentar;
use App\Models\Pembayaran;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Kategori;

class ClientController extends Controller
{

	function BerandaGuest(){
		$data['list_produk'] = Produk::orderBy('updated_at','desc')->paginate(4);
		$data['list_produk_rekomendasi'] = Produk::paginate(4);
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.Guest.beranda-guest', $data);
	}

	function ListTokoGuest(){
		$data['list_toko'] = User::where('level',1)->paginate(12);
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.Guest.toko-guest', $data);
	}

	function ListProdukGuest(){
		$data['list_produk'] = Produk::paginate(12);
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.Guest.produk-guest', $data);
	}

	function CariProdukGuest(){
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		$nama = request('nama');
		$data['list_produk'] = Produk::where('nama', 'like', "%$nama%")->paginate(12);
		$data['nama'] = $nama;
		return view('Pembeli.Guest.produk-guest', $data);
	}

	function KategoriProdukGuest(Kategori $kategori){
		$data['kategori'] = $kategori;
		$data['list_produk'] = Produk::where('id_kategori', $kategori->id)->paginate(9);
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		
		return view('Pembeli.Guest.kategori-guest', $data);
	}

	function DetailProdukGuest(Produk $produk){
		$data['produk'] = $produk;
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.Guest.detail-produk-guest', $data);
	}

	function DetailTokoGuest(User $user){
		$data['user'] = $user;
		$data['list_produk'] = $user->produk;
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.Guest.detail-toko-guest', $data);
	}

	function Beranda(){
		$data['list_produk'] = Produk::orderBy('updated_at','desc')->paginate(10);
		$data['list_produk_rekomendasi'] = Produk::paginate(4);
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.beranda', $data);
	}

	function ListToko(){
		$data['list_toko'] = User::where('level',1)->paginate(12);
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.list-toko', $data);
	}

	function ListProduk(){
		$data['list_produk'] = Produk::all()->random()->paginate(20);
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.list-produk', $data);
	}

	function CariProduk(){
		$nama = request('nama');
		$data['list_produk'] = Produk::where('nama', 'like', "%$nama%")->paginate(12);
		$data['nama'] = $nama;
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.list-produk', $data);
	}

	function Filter(){
		$kategori = request ('id_kategori');
		$data['id_kategori'] = $kategori;
		$data['list_kategori'] = Kategori::all();
		$data['harga_min'] = $harga_min = request('harga_min');
		$data['harga_max'] = $harga_max = request('harga_max');
		$data['list_produk'] = Produk::where('id_kategori', "$kategori")->whereBetween('harga', [$harga_min, $harga_max])->paginate(12);
		return view('Pembeli.list-produk', $data);
	}

	function KategoriProduk(Kategori $kategori){
		$data['kategori'] = $kategori;
		$data['list_produk'] = Produk::where('id_kategori', $kategori->id)->paginate(9);
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		
		return view('Pembeli.kategori-produk', $data);
	}

	function DetailProduk(Produk $produk, User $user, Kategori $kategori){
		$data['list_produk'] = Produk::all()->random(4);
		$data['kategori'] = $kategori;
		$data['user'] = $user;
		$data['produk'] = $produk;
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.detail-produk', $data);
	}

	function DetailToko(User $user){
		$data['user'] = $user;
		$data['list_produk'] = $user->produk;
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.detail-toko', $data);
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

		return redirect('keranjang')->with('success', 'Pesanan Berhasil Ditambahkan');
	}

	function Checkout(){
		$data['list_kategori'] = Kategori::withCount('produk')->get();
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


		return redirect('keranjang')->with('danger', 'Pesanan Berhasil Dihapus');
	}

	public function KonfirmasiCheckout(Request $request){
		$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
		$pesanan->status = 1;
		$pesanan_id = $pesanan->id;
		$pesanan->update();

		$pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
		foreach ($pesanan_details as $pesanan_detail){
			$produk = Produk::where('id', $pesanan_detail->produk_id)->first();
			$produk->stok = $produk->stok-$pesanan_detail->jumlah;
			$produk->update();
		}

		return redirect('pemesanan');

	}

	function Pemesanan(){
		$data['list_pembayaran'] = Pembayaran::all();
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		$data['pesanan'] = Pesanan::where('user_id', Auth::user()->id)->where('status', 1)->first();
		if(!empty($data['pesanan'])){
			$data['pesanan_details'] = PesananDetail::where('pesanan_id', $data['pesanan']->id)->get();
		}
		
		return view('Pembeli.checkout', $data);
	}

	public function KonfirmasiPemesanan(){
		$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 1)->first();

		$pesanan_id = $pesanan->id;
		$pesanan->nama_penerima = request('nama_penerima');
		$pesanan->alamat = request('alamat');
		$pesanan->kode_pos = request('kode_pos');
		$pesanan->pembayaran = request('pembayaran_id');
		$pesanan->status = 2;
		$pesanan->update();

		$pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
		foreach ($pesanan_details as $pesanan_detail){
			$produk = Produk::where('id', $pesanan_detail->produk_id)->first();
			$produk->stok = $produk->stok-$pesanan_detail->jumlah;
			$produk->update();
		}

		return redirect('profile')->with('success', 'Pemesanan Berhasil');

	}

}