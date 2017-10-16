@extends('nav.app')

@section('content')


@if(Auth::user()->privilege == 'ADMIN' or Auth::user()->privilege == 'PETUGAS')
<section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style="color: black"><i class="icon_profile"></i>{{$lihat->nama}}</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="">Home</a></li>
              <li><i class="icon_profile"></i><a href="{{route('pasien.index')}}">Pasien</a></li>  
              <li>Lihat</li>                
            </ol>
        </div>
      </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Data Pasien
                          </header>
                          <div class="panel-body">
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Nama</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->nama}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Alamat</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->alamat}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Gender</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->gender}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">Umur</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->umur}}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-lg-2 control-label">No Telepon</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">{{$lihat->telepon}}</p>
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