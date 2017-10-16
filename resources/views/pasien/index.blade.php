@extends('nav.app')

@section('content')


@if(Auth::user()->privilege == 'ADMIN' or Auth::user()->privilege == 'PETUGAS')
<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black"><i class="icon_profile"></i>Pasien <a href="#myModal" data-toggle="modal"><i class="icon_plus_alt2"></i></a></h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{url('home')}}">Home</a></li>
              <li><i class="icon_profile"></i>Pasien</li>                
            </ol>
        </div>
      </div>
              <!-- page start-->
              <div class="row">

                  <div class="col-lg-12">

                      <section class="panel">
                          <header class="panel-heading">
                            <form class="navbar-form" action="{{ url('pasien')}}" style="padding-top: 10px;padding-bottom: 10px">
                                <input class="form-control" name="search" placeholder="Search" type="text">
                            </form>
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                <th>No</th>
                                <th><i class="icon_profile"></i> Nama</th>
                                <th><i class="icon_pin_alt"></i> Alamat</th>
                                <th><i class="fa fa-dot-circle-o"></i> Gender</th>
                                <th><i class="fa fa-check"></i> Umur</th>
                                <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              @foreach($pasien as $data)
                              <tr>
                                <td>{{ (( $pasien->currentPage() - 1) * $pasien->perPage() + $loop->iteration )}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->alamat}}</td>
                                <td>{{$data->gender}}</td>
                                <td>{{$data->umur}}</td>
                                <td>
                                <div class="btn-group">
                                  <a class="btn btn-primary" href="{{route('pasien.edit', $data->id)}}"><i class="icon_plus_alt2"></i></a>
                                  <a class="btn btn-success" href="{{route('pasien.lihat', $data->id)}}"><i class="icon_check_alt2"></i></a>
                                  <a class="btn btn-danger" href="{{route('pasien.delete', $data->id)}}"><i class="icon_close_alt2"></i></a>
                                </div>
                                </td>
                              </tr> 
                              @endforeach                   
                           </tbody>
                        </table>
                        {!! $pasien->appends(['search' => $keyword])->render() !!}
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>

      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Tambah Data</h4>
                </div>
                <div class="modal-body">

                    <form role="form" method="POST" action="{{route('pasien.prosestambah')}}">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Gender</label>
                            <select name="gender" class="form-control">
                              <option value="PRIA">PRIA</option>
                              <option value="WANITA">WANITA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur</label>
                            <input type="text" name="umur" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" name="telepon" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@else

<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black">SILAHKAN 
                          <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                LOG IN
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                          SEBAGAI ADMIN ATAU PETUGAS</h3>
        </div>
      </div>
              <!-- page start-->
              <div class="row">

                  <div class="col-lg-12">

                      <section class="panel">
                          <header class="panel-heading">
                          </header>
                          
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>

@endif

@endsection