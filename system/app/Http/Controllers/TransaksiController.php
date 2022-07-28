<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Auth;

class TransaksiController extends Controller
{
    public function index(){
    	$data['user'] = User::where('id', Auth::user()->id)->first();
        $data['list_pesanan_all'] = PesananDetail::where('status','<=','4')->get();
        $data['list_pesanan_done'] = PesananDetail::where('status','>=','5')->get();
        

        return view('Admin.Transaksi.index', $data);
    }

    function konfirmasitransaksi(){
    	$pesanan = Pesanan::where('id', request('id'))->first();
		// dd($pesanan, request()->all());
		$pesanan->status = 6;
		$pesanan->save();

		$pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        foreach ($pesanan_details as $pesanan_detail){
            $pesanan_detail->status =6;
            $pesanan_detail->update();
        }
		

		return redirect('Admin/transaksi')->with('success', 'Konfirmasi Transaksi Berhasil');
    }

    function destroy($id){
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan_detail->delete();

        return back()->with('danger', 'Data Transaksi berhasil dihapus');
    }

}
