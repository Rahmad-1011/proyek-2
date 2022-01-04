<div class="tab-pane fade" id="reviews" >
	<div class="col-sm-12">
		@foreach($produk->komentar()->where('parent', 0)->orderBy('created_at', 'desc')->get() as $komentar)
			<ul 
      style="margin-bottom: 5px; 
      background-color: #B0E0E6;
      border-top-right-radius: 20px;
      border-bottom-right-radius: 20px;
      border-bottom-left-radius: 20px;
      -moz-border-radius-topright: 20px;
      -moz-border-radius-bottomright: 20px;
      -moz-border-radius-bottomleft: 20px;
      -webkit-border-top-right-radius: 20px;
      -webkit-border-bottom-right-radius: 20px;
      -webkit-border-bottom-left-radius: 20px;
      ">
				<li style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px;">
          <a href=""><i class="fa fa-user"></i>{{$komentar->user->nama}}</a></li>

				<li style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px;">
          <a href=""><i class="fa fa-clock-o"></i>{{$komentar->created_at->diffforHumans()}}</a></li>

			<p style="margin-top: 10px; margin-left: 10px; margin-right: 10px; margin-bottom: 20px">{{$komentar->konten}}</p>
      
      @foreach($komentar->childs()->orderBy('created_at', 'desc')->get() as $child)
        <ul style="margin-bottom: 20px;
        background-color: #B0E0E6; 
        padding-left: 3.5em;
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
        -moz-border-radius-topright: 20px;
        -moz-border-radius-bottomright: 20px;
        -moz-border-radius-bottomleft: 20px;
        -webkit-border-top-right-radius: 20px;
        -webkit-border-bottom-right-radius: 20px;
        -webkit-border-bottom-left-radius: 20px;
        ">

          <p style="margin-top: 5px; margin-bottom: -10px;"><b>Balasan</b></p>
          <li style="margin-bottom: 10px; margin-left: 10px; margin-right: 10px;">
            <a href=""><i class="fa fa-user"></i>{{$child->user->nama}}</a></li>

          <li style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px;">
            <a href=""><i class="fa fa-clock-o"></i>{{$child->created_at->diffforHumans()}}</a></li>

        <p style="margin-bottom: 10px; margin-left: 10px; margin-right: 10px; margin-bottom: 20px;">{{$child->konten}}</p>
        </ul>
      @endforeach
			</ul>
		@endforeach
									
		<p style="margin-top: 40px;"><b>Write Your Review</b></p>
		<form action="" method="post">
          @csrf
          <div class="row">
            <input type="hidden" name="produk_id" value="{{$produk->id}}">
            <input type="hidden" name="parent" value="0">
          </div>
          <div class="row">
          </div>
          <div class="row">
            <div class="col form-group">
              <textarea name="konten" class="form-control" type="text" placeholder="Komentar Disini*"></textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Komentar</button>
    </form>
	</div>
</div>