<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kurir;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\User;
use App\Models\Komentar;
use App\Models\Pembayaran;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Kategori;


class ClientController extends Controller
{

	function Beranda(){
		$data['list_produk'] = Produk::where('stok', '>=', '1')->paginate(6);
		$data['list_produk_rekomendasi'] = Produk::where('stok', ">=", '1')->paginate(6);
		$data['list_kategori'] = Kategori::withCount('produk')->get();

		$data['komentars'] = Komentar::where('produk_id', $data['list_produk_rekomendasi'])->where('parent',0)->get();
		$jumlah_bintang = Komentar::where('produk_id', $data['list_produk_rekomendasi'])->sum('bintang');

		if($data['komentars']->count() > 0){
			$data['bintang'] = $jumlah_bintang/$data['komentars']->count();
		}
		else{
			$data['bintang'] = 0;
		}
		return view('Pembeli.Pembeli.beranda', $data);
	}

	function ListToko(){
		$data['list_toko'] = User::where('level',1)->paginate(12);
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.Pembeli.list-toko', $data);
	}

	function ListProduk(){
		$data['list_produk'] = Produk::orderByRaw('RAND()')->paginate(15);
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.Pembeli.list-produk', $data);
	}

	function ListProdukKategori(Kategori $kategori){
		$data['kategori'] = $kategori;
		$data['list_produk'] = Produk::where('id_kategori', $kategori->id)->where('stok', '>=', '1')->paginate(15);
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.Pembeli.list-produk', $data);
	}

	function CariProduk(){
		$nama = request('nama');
		$data['list_produk'] = Produk::where('nama', 'like', "%$nama%")->where('stok', '>=', '1')->paginate(15);
		$data['nama'] = $nama;
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.Pembeli.list-produk', $data);
	}

	function CariProdukToko(User $user){
		$data['user'] = $user;
		$nama = request('nama');
		$data['list_produk'] = Produk::where('nama', 'like', "%$nama%")->where('user_id', $user->id)->where('stok','>=','1')->paginate(15);
		$data['nama'] = $nama;
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.Pembeli.detail-toko', $data);
	}

	function Filter(){
		$kategori = request ('id_kategori');
		$data['id_kategori'] = $kategori;
		$data['list_kategori'] = Kategori::all();
		$data['harga_min'] = $harga_min = request('harga_min');
		$data['harga_max'] = $harga_max = request('harga_max');
		$data['list_produk'] = Produk::where('id_kategori', "$kategori")->whereBetween('harga', [$harga_min, $harga_max])->paginate(12);
		return view('Pembeli.Pembeli.list-produk', $data);
	}

	function KategoriProduk(Kategori $kategori){
		$data['kategori'] = $kategori;
		$data['list_produk'] = Produk::where('id_kategori', $kategori->id)->paginate(9);
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		
		return view('Pembeli.Pembeli.kategori-produk', $data);
	}

	function DetailProduk(Produk $produk, User $user, Kategori $kategori){
		$data['list_produk'] = Produk::all()->random(4);
		$data['kategori'] = $kategori;
		$data['user'] = $user;
		$data['produk'] = $produk;
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		$data['komentars'] = Komentar::where('produk_id', $produk->id)->where('parent',0)->get();
		$jumlah_bintang = Komentar::where('produk_id', $produk->id)->sum('bintang');

		if($data['komentars']->count() > 0){
			$data['bintang'] = $jumlah_bintang/$data['komentars']->count();
		}
		else{
			$data['bintang'] = 0;
		}

		
		return view('Pembeli.Pembeli.detail-produk', $data);
	}

	function DetailToko(User $user){
		$data['toko'] = $user;
		$data['list_produk'] = Produk::where('user_id', $user->id)->paginate(15);
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		return view('Pembeli.Pembeli.detail-toko', $data);
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
			$pesanan_detail->status = 0;
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
			// $data['pesanan_details'] = PesananDetail::where('pesanan_id', $data['pesanan']->id)->get();
			$data['pesanan_details'] = PesananDetail::select('pesanan_detail.*','pesanan_detail.id as id',DB::raw('(pesanan_detail.jumlah * produk.berat) as berat'))
			->join('produk','produk.id','=','pesanan_detail.produk_id')
			->where('pesanan_id', $data['pesanan']->id)
			->get();
		}
		
		return view('Pembeli.Pembeli.keranjang', $data);
	}

	public function DeleteCheckout($id){
		$pesanan_detail = PesananDetail::where('id', $id)->first();

		$pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
		$pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
		$pesanan->update();

		$pesanan_detail->delete();


		return redirect('keranjang')->with('danger', 'Pesanan Berhasil Dihapus Dari Keranjang');
	}

	public function KonfirmasiCheckout(Request $request){
		$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
		$pesanan->status = 1;
		$pesanan_id = $pesanan->id;
		$pesanan->update();

		$list_pesanan_detail = PesananDetail::where('pesanan_id', $pesanan->id)->where('status', 0)->get();
		foreach($list_pesanan_detail as $pesanan_detail){
			$pesanan_detail->status =1;
			$pesanan_detail->update();
		}
		

		$pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
		foreach ($pesanan_details as $pesanan_detail){
			$produk = Produk::where('id', $pesanan_detail->produk_id)->first();
			$produk->update();
		}

		return redirect('pemesanan');

	}

	function Pemesanan(){
		$data['list_pembayaran'] = Pembayaran::all();
		$data['list_kurir'] = Kurir::all();
		$data['list_kategori'] = Kategori::withCount('produk')->get();
		$data['pesanan'] = Pesanan::where('user_id', Auth::user()->id)->where('status', 1)->first();
		if(!empty($data['pesanan'])){
			$data['pesanan_details'] = PesananDetail::where('pesanan_id', $data['pesanan']->id)->get();
		}
		
		return view('Pembeli.Pembeli.checkout', $data);
	}

	function GetCity($id){
        $city = City::where('province_id', $id)->pluck('title', 'city_id');
        return json_encode($city);
    }

    public function check_ongkir(Request $request)
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $request->city_origin, // ID kota/kabupaten asal
            'destination'   => $request->city_destination, // ID kota/kabupaten tujuan
            'weight'        => $request->weight, // berat barang dalam gram
            'courier'       => $request->courier // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();


        return response()->json($cost);
    }

	public function KonfirmasiPemesanan(){
		$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('id', request('id'))->first();
		// dd($pesanan);
		$pesanan->nama_penerima = request('nama_penerima');
		$pesanan->alamat = request('alamat');
		$pesanan->no_hp = request('no_hp');
		$pesanan->pembayaran_id = request('pembayaran_id');
		$pesanan->kurir_id = request('kurir_id');
		$pesanan->total_harga = $pesanan->jumlah_harga+$pesanan->kurir->tarif;
		$pesanan->status = 2;
		$pesanan->update();

		$pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
		foreach($pesanan_details as $pesanan_detail){
			$pesanan_detail->status =2;
			$pesanan_detail->update();
		}
		

		$pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
		foreach ($pesanan_details as $pesanan_detail){
			$produk = Produk::where('id', $pesanan_detail->produk_id)->first();
			$produk->update();
		}

		return redirect('profile/pesanan-saya')->with('success', 'Pemesanan Berhasil');

	}

	public function Pembayaran(Pesanan $pesanan){
		$data['list_kategori'] = Kategori::withCount('produk')->get();

		$data['pesanan'] = $pesanan;
		$data['pesanan_details'] = PesananDetail::where('pesanan_id', $pesanan->id)->get();
		// dd($data);
		
		return view('Pembeli.Pembeli.pembayaran', $data);
	}

	public function KonfirmasiPembayaran(){
		$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('id', request('id'))->first();
		// dd($pesanan);
		$pesanan->handleUploadFoto();
		$pesanan->status = 3;
		$pesanan->update();
		
		$pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
		foreach($pesanan_details as $pesanan_detail){
			$pesanan_detail->status =3;
			$pesanan_detail->update();
		}
			
		

		$pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
		foreach ($pesanan_details as $pesanan_detail){
			$produk = Produk::where('id', $pesanan_detail->produk_id)->first();
			$produk->stok = $produk->stok-$pesanan_detail->jumlah;
			$produk->update();
		}

		return redirect('profile/pesanan-saya')->with('success', 'Pemesanan Berhasil');

	}

	public function KonfirmasiBarangSampai(){

		$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('id', request('id'))->first();
		// dd($pesanan, request()->all());
		$pesanan->status = 5;
		$pesanan->save();

		$pesanan_detail = PesananDetail::where('pesanan_id', $pesanan->id)->where('id', request('idpd'))->first();
			$pesanan_detail->handleUploadBukti();
			$pesanan_detail->status =5;
			$pesanan_detail->save();
		


		$komentar_ada = Komentar::where('user_id', Auth::user()->id)->where('produk_id', request('produk_id'))->first();
		if ($komentar_ada) {
			$komentar_ada->bintang = request('bintang');
			$komentar_ada->konten = request('konten');
			$komentar_ada->handleUploadFoto();
			$komentar_ada->update();
		}
		else{
			$komentar = new Komentar;
			$komentar->parent = 0;
			$komentar->produk_id = request('produk_id');
			$komentar->user_id = Auth::user()->id;
			$komentar->konten = request('konten');
			$komentar->bintang = request('bintang');
			$komentar->handleUploadFoto();
			$komentar->save();	
		}

		return redirect('profile/pesanan-saya')->with('success', 'Konfirmasi Barang Sampai Berhasil');

	}

}