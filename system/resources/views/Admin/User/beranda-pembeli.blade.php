@extends ('Admin.template.base')

@section('content')

  <div class="container">
    <div class="row"> 
      <div class="col-md-12 mt-5">
        <div class="card">
          <div  class="card-header" style="color: #067D68; font-family: Arial;">
            <h2><b>List Pembeli</b></h2>
          </div>
          <div class="card-body">
            <table class="table table-striped" style="background-color: #50d5b7; color: #FFF" >
            <thead style="background-color: #067D68; text-align: center;">
              <th style="width: 100px;">No</th>
              <th style="width: 200px;">Aksi</th>
              <th>Email</th>
              <th>Level</th>
            </thead>
            <tbody style="text-align: center; color: #000">
              @foreach($list_user as $user)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                  <div class="btn-group">
                    <a href="{{url('Admin/pembeli', $user->id)}}" class="btn btn-primary" style="width: 40px; border-radius: 5px;"><i class="fa fa-info"></i></a>
                    @include('Admin.template.utils.delete', ['url'=>url('Admin/user', $user->id)])
                  </div>
                </td>
                <td>{{$user->email}}</td>
                <td>
                  @if($user->level == '0')
                    Admin
                  @elseif($user->level == '1')
                    Toko
                  @else($user->level == '2')
                    Pembeli
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
            </table>
          </div> 
        </div>
      </div>
    </div>
  </div>


@endsection