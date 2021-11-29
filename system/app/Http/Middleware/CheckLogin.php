<?php 

namespace App\Http\Middleware;
Use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * 
 */
class CheckLogin
{
	
	public function handle(Request $request, Closure $next, $role)
	{
		if (!Auth::check()){
			return redirect('maok/login');
		}

		$user = Auth::user();

		if ($user->level == $role){
			return $next($request);
		}

		return redirect('maok/login')->with('error', "Coba cek Email dan Password anda");
	}
}