<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
	function showLogin(){
		return view('login');
	}

	function LoginProcess(Request $request){
		request()->validate(['email' => 'required','password' => 'required']);
		
		$kredensil = $request->only('email', 'password');
		if (Auth::attempt($kredensil)){
			$user = Auth::user();
			if($user->level == '0'){
				return redirect()->intended('Admin/beranda')->with('success', 'Selamat Datang Admin');
			} elseif($user->level == '1'){
				return redirect()->intended('Toko/beranda')->with('success', 'Selamat Datang Di Marketplace Oleh-oleh Khas Ketapang');
			}
				return redirect()->intended('beranda');
		}
		return redirect('maok/login')->with('danger', 'Silahkan Cek Email dan Password Anda');
	}

	function logout(Request $request){
		$request->session()->flush();
		Auth::logout();
		return redirect('maok/login')->with('warning', 'Terima Kasih Telah Berkunjung');
	}

}