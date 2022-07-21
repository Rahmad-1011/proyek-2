<section class="page-search" style="background-color: #117A65">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
				<div class="advance-search">
					<form action="{{url('produk')}}" method="post">
						<div class="form-row">
							@csrf
							<div class="form-group col-md-10">
								<input type="text" name="nama" value="{{$nama ??""}}" style="border-radius: 20px;" class="form-control my-2 my-lg-1 w-100 shadow" id="inputtext4" placeholder="Cari Produk">
							</div>
							<div class="form-group col-md-2 align-self-center">
								<button type="submit" class="btn btn-primary shadow border-0" style="border-radius: 20px; background-color: #fff; color: #117A65">Cari</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>