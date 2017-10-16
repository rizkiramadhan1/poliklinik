@extends('nav.app')

@section('content')


@if(Auth::user()->privilege == 'ADMIN')
<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black"><i class="icon_profile"></i>Dokter <a href="#myModal" data-toggle="modal"><i class="icon_plus_alt2"></i></a></h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{url('home')}}">Home</a></li>
              <li><i class="icon_profile"></i>Dokter</li>                
            </ol>
        </div>
      </div>
              <!-- page start-->
              <div class="row">

                  <div class="col-lg-12">

                      <section class="panel">
                          <header class="panel-heading">
                            <form class="navbar-form" action="{{ url('dokter')}}" style="padding-top: 10px;padding-bottom: 10px">
                                <input class="form-control" name="search" placeholder="Search" type="text">
                            </form>
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                <th>No</th>
                                <th><i class="icon_profile"></i> Kode Dokter</th>
                                <th><i class="fa fa-dot-circle-o"></i> Nama Poliklinik</th>
                                <th><i class="fa fa-dot-circle-o"></i> Nama</th>
                                <th><i class="fa fa-check"></i> Spesialis</th>
                                <th><i class="icon_pin_alt"></i> Alamat</th>
                                <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              @foreach($dokter as $data)
                              <tr>
                                <td>{{ (( $dokter->currentPage() - 1) * $dokter->perPage() + $loop->iteration )}}</td>
                                <td>{{$data->kode_dokter}}</td>
                                <td>{{$data->poliklinik->nama}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->spesialis}}</td>
                                <td>{{$data->alamat}}</td>
                                <td>
                                <div class="btn-group">
                                  <a class="btn btn-primary" href="{{route('dokter.edit', $data->id)}}"><i class="icon_plus_alt2"></i></a>
                                  <a class="btn btn-success" href="{{route('dokter.lihat', $data->id)}}"><i class="icon_check_alt2"></i></a>
                                  <a class="btn btn-danger" href="{{route('dokter.delete', $data->id)}}"><i class="icon_close_alt2"></i></a>
                                </div>
                                </td>
                              </tr> 
                              @endforeach                   
                           </tbody>
                        </table>
                        {!! $dokter->appends(['search' => $keyword])->render() !!}
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

                    <form role="form" method="POST" action="{{route('dokter.prosestambah')}}">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="kode_dokter">Kode Dokter</label>
                            <input type="text" name="kode_dokter" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="poliklinik_id">Nama Poliklinik</label>
                          <select name="poliklinik_id" class="form-control">
                            @foreach($poliklinik as $data)
                            <option value="{{$data->id}}">{{$data->nama}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="spesialis">Spesialis</label>
                            <input type="text" name="spesialis" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="telepon">Nomor Telepon</label>
                            <input type="text" name="telepon" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tarif">Tarif</label>
                            <input type="text" name="tarif" class="form-control">
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
                          SEBAGAI ADMIN</h3>
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