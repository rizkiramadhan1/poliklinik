@extends('nav.app')

@section('content')


@if(Auth::user()->privilege == 'ADMIN')
<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black"><i class="icon_profile"></i>Ubah Data Dokter</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="">Home</a></li>
              <li><i class="icon_profile"></i><a href="{{route('dokter.index')}}">Dokter</a></li>  
              <li>Ubah</li>                
            </ol>
        </div>
      </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Data Dokter
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal " method="POST" action="{{route('dokter.prosesedit', $edit->id)}}">
                              {{ csrf_field() }}
                              	<div class="form-group">
                                      <label class="col-sm-2 control-label">Kode Dokter</label>
                                      <div class="col-sm-4">
                                          <input type="text" name="kode_dokter" value="{{$edit->kode_dokter}}" class="form-control round-input">
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Nama Poliklinik</label>
                                      <div class="col-sm-4">
                                        <select name="poliklinik_id" class="form-control round-input">
                                          @foreach($poliklinik as $data)
                                          <option value="{{$data->id}}"
                                            @if($edit->poliklinik_id == $data->id)
                                            selected = "selected"
                                            @endif>{{$data->nama}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Nama</label>
                                      <div class="col-sm-3">
                                          <input type="text" name="nama" value="{{$edit->nama}}" class="form-control round-input">
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Spesialis</label>
                                      <div class="col-sm-4">
                                          <input type="text" name="spesialis" value="{{$edit->spesialis}}" class="form-control round-input">
                                      </div>
                                </div>	
                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Alamat</label>
                                      <div class="col-sm-4">
                                          <input type="text" name="alamat" value="{{$edit->alamat}}" class="form-control round-input">
                                      </div>
                                </div> 
                                <div class="form-group">
                                      <label class="col-sm-2 control-label">No Telepon</label>
                                      <div class="col-sm-4">
                                          <input type="text" name="telepon" value="{{$edit->telepon}}" class="form-control round-input">
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-sm-2 control-label">Tarif</label>
                                      <div class="col-sm-4">
                                          <input type="text" name="tarif" value="{{$edit->tarif}}" class="form-control round-input">
                                      </div>
                                </div>
                                <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <button type="submit" class="btn btn-primary">Kirim</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>

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