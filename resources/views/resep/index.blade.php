@extends('nav.app')

@section('content')


@if(Auth::user()->privilege == 'ADMIN' or Auth::user()->privilege == 'APOTEKER')
<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black"><i class="icon_documents_alt"></i>Resep <a href="#myModal" data-toggle="modal"><i class="icon_plus_alt2"></i></a></h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{url('home')}}">Home</a></li>
              <li><i class="icon_pin_alt"></i>Resep</li>                
            </ol>
        </div>
      </div>
              <!-- page start-->
              <div class="row">

                  <div class="col-lg-12">

                      <section class="panel">
                          <header class="panel-heading">
                            <form class="navbar-form" action="{{ url('resep')}}" style="padding-top: 10px;padding-bottom: 10px">
                                <input class="form-control" name="search" placeholder="Search" type="text">
                            </form>
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                <th>No</th>
                                <th><i class="icon_profile"></i> Nama Dokter</th>
                                <th><i class="fa fa-dot-circle-o"></i> Nama Pasien</th>
                                <th><i class="fa fa-dot-circle-o"></i> Nama Poliklinik</th>
                                <th><i class="fa fa-check"></i> Spesialis</th>
                                <th><i class="icon_pin_alt"></i> Alamat</th>
                                <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              @foreach($resep as $data)
                              <tr>
                                <td>{{ (( $resep->currentPage() - 1) * $resep->perPage() + $loop->iteration )}}</td>
                                <td>{{$data->dokter->nama}}</td>
                                <td>{{$data->pasien->nama}}</td>
                                <td>{{$data->poliklinik->nama}}</td>
                                <td>{{$data->tgl}}</td>
                                <td>{{$data->total_harga}}</td>
                                <td>
                                <div class="btn-group">
                                  <a class="btn btn-primary" href="{{route('resep.edit', $data->id)}}"><i class="icon_plus_alt2"></i></a>
                                  <a class="btn btn-success" href="{{route('resep.lihat', $data->id)}}"><i class="icon_check_alt2"></i></a>
                                  <a class="btn btn-danger" href="{{route('resep.delete', $data->id)}}"><i class="icon_close_alt2"></i></a>
                                </div>
                                </td>
                              </tr> 
                              @endforeach                   
                           </tbody>
                        </table>
                        {!! $resep->appends(['search' => $keyword])->render() !!}
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

                    <form role="form" method="POST" action="{{route('resep.prosestambah')}}">
                    {{ csrf_field() }}
                        <div class="form-group">
                          <label for="dokter_id">Nama Dokter</label>
                          <select name="dokter_id" class="form-control">
                            @foreach($dokter as $data)
                            <option value="{{$data->id}}">{{$data->nama}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="pasien_id">Nama Pasien</label>
                          <select name="pasien_id" class="form-control">
                            @foreach($pasien as $data)
                            <option value="{{$data->id}}">{{$data->nama}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="poliklinik_idi">Nama Poliklinik</label>
                          <select name="poliklinik_idi" class="form-control">
                            @foreach($poliklinik as $data)
                            <option value="{{$data->id}}">{{$data->nama}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl">Tanggal Resep</label>
                            <input type="date" name="tgl" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="total_harga">Total Harga</label>
                            <input type="date" name="total_harga" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="bayar">Bayar</label>
                            <input type="text" name="bayar" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="kembali">Kembali</label>
                            <input type="text" name="kembali" class="form-control">
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
                          SEBAGAI ADMIN ATAU APOTEKER</h3>
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