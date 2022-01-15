@extends('Admin.template.base')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 mt-3">
			<div class="card">
				<div class="card-header">
					<h2>Detail @if($user->level == '0')
				                    Admin
				                  @elseif($user->level == '1')
				                    Toko
				                  @else($user->level == '2')
				                    Pembeli
				                  @endif</h2>
				</div>
				<div class="card-body">
					<table class="table table-striped" style="background-color: #50d5b7; color: #FFF" >
			            <tbody style="color: #000">
			              <tr>
			                <td>Nama</td>
			                <td>
			                	{{$user->nama}}
			                </td>
			              </tr>
			              <tr>
			                <td>Email</td>
			                <td>
			                	{{$user->email}}
			                </td>
			              </tr>
			            </tbody>
			        </table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection