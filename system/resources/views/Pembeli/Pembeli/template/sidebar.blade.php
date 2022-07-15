<div class="col-md-3">
				<div class="category-sidebar">
					<div class="widget category-list">
						<h4 class="widget-header">Kategori</h4>
						<ul class="category-list">
							@foreach($list_kategori as $kategori)
							<li><a href="{{url('produk/kategori', $kategori->id)}}">{{$kategori->nama}} <span>{{$kategori->produk->count()}}</span></a></li>
							@endforeach
						</ul>
					</div>

					<!-- <div class="widget filter">
						<h4 class="widget-header">Show Produts</h4>
						<select>
							<option>Popularity</option>
							<option value="1">Top rated</option>
							<option value="2">Lowest Price</option>
							<option value="4">Highest Price</option>
						</select>
					</div>

					<div class="widget price-range w-100">
						<h4 class="widget-header">Price Range</h4>
						<div class="block">
							<input class="range-track w-100" type="text" data-slider-min="0" data-slider-max="5000" data-slider-step="5"
											data-slider-value="[0,5000]">
							<div class="d-flex justify-content-between mt-2">
									<span class="value">$10 - $5000</span>
							</div>
						</div>
					</div> -->

				</div>
			</div>