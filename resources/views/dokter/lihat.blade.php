@extends('nav.app')

@section('content')


@if(Auth::user()->privilege == 'ADMIN')
<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black"><i class="icon_profile"></i>{{$lihat->nama}}</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="">Home</a></li>
              <li><i class="icon_profile"></i><a href="{{route('dokter.index')}}">Dokter</a></li>  
              <li>Lihat</li>                
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
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Kode Dokter</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->kode_dokter}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Nama Poliklinik</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->poliklinik->nama}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Nama</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->nama}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Spesialis</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->spesialis}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Alamat</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->alamat}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Nomor Telepon</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->telepon}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Tarif</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->tarif}}</p>
                                      </div>
                                </div>
                                <form action="{{route('dokter.edit', $lihat->id)}}">
                                <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <button type="submit" class="btn btn-primary">Ubah</button>
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