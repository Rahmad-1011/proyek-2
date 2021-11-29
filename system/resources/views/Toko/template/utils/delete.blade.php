<form action="{{$url}}" method="post" class="form-inline" onsubmit="return confirm('Yakin Akan Menghapus Data Ini?')">
											@csrf
											@method("delete")
										<button class="btn btn-danger" style="width: 40px;"><i class="fa fa-trash"></i></button>
										</form>