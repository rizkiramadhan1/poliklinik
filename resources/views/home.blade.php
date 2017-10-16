@extends('nav.app')

@section('content')


@if(Auth::user()->privilege == 'ADMIN')
<section id="main-content">
    <section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header" style="color: black">WELCOME ADMIN</h3>
        </div>
    </div>
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                  <header class="panel-heading">
                     <i class="icon_profile"></i> Admin
                  </header>
                  <div class="panel-body">
                        <div class="form-group">
                              <label class="col-lg-2 control-label">Nama</label>
                              <div class="col-lg-10">
                                  <p class="form-control-static">{{Auth::user()->name}}</p>
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-lg-2 control-label">Email</label>
                              <div class="col-lg-10">
                                  <p class="form-control-static">{{Auth::user()->email}}</p>
                              </div>
                        </div>
                  </div>
            </section>
        </div>
    </div>
      <!-- page end-->
    </section>
</section>
@elseif(Auth::user()->privilege == 'APOTEKER')
<section id="main-content">
    <section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header" style="color: black">WELCOME APOTEKER</h3>
        </div>
    </div>
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                  <header class="panel-heading">
                     <i class="icon_profile"></i> Apoteker
                  </header>
                  <div class="panel-body">
                        <div class="form-group">
                              <label class="col-lg-2 control-label">Nama</label>
                              <div class="col-lg-10">
                                  <p class="form-control-static">{{Auth::user()->name}}</p>
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-lg-2 control-label">Email</label>
                              <div class="col-lg-10">
                                  <p class="form-control-static">{{Auth::user()->email}}</p>
                              </div>
                        </div>
                  </div>
            </section>
        </div>
    </div>
      <!-- page end-->
    </section>
</section>
@elseif(Auth::user()->privilege == 'PETUGAS')
<section id="main-content">
    <section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header" style="color: black">WELCOME PETUGAS</h3>
        </div>
    </div>
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                  <header class="panel-heading">
                     <i class="icon_profile"></i> Petugas
                  </header>
                  <div class="panel-body">
                        <div class="form-group">
                              <label class="col-lg-2 control-label">Nama</label>
                              <div class="col-lg-10">
                                  <p class="form-control-static">{{Auth::user()->name}}</p>
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-lg-2 control-label">Email</label>
                              <div class="col-lg-10">
                                  <p class="form-control-static">{{Auth::user()->email}}</p>
                              </div>
                        </div>
                  </div>
            </section>
        </div>
    </div>
      <!-- page end-->
    </section>
</section>
@endif

@endsection