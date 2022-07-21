<?php
namespace App\Http\Controllers;
use App\Models\Komentar;
use App\Models\User;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Http\Request;
use Auth;

class KomentarController extends Controller{

	function Index(){
		$user = request()->user();
		$data['list_produk'] = $user->produk;
		return view('Toko.Komentar.index', $data);
	}

	function BalasKomentar(Produk $produk){
		$data['komentar'] = $produk->komentar;
		$data['produk'] = $produk;

		return view('Toko.Komentar.balas-komentar', $data);
	}

	
	
	function PostKomentar(Request $request){
		$request->request->add(['users_id' => auth()->user()->id]);
		$komentar = Komentar::create($request->all());

		return redirect()->back()->with('warning', 'Komentar berhasil ditambahkan');
	}

}