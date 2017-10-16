<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Poliklinik</title>

    <!-- Bootstrap CSS -->    
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{asset('css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="{{url('home')}}" class="logo">POLIKLINIK</a>
            <!--logo end-->

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="username">{{ Auth::user()->username }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                  <i class="icon_key_alt"></i>  Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">   
                @if(Auth::user()->privilege == 'ADMIN')
                <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon_document_alt"></i>
                      <span>Kedokteran</span>
                      <span class="menu-arrow arrow_carrot-right"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="{{route('dokter.index')}}">Daftar Dokter</a></li>                          
                      <li><a class="" href="{{route('poliklinik.index')}}">Poliklinik</a></li>
                  </ul>
                </li>
                @endif
                @if(Auth::user()->privilege == 'ADMIN' or Auth::user()->privilege == 'PETUGAS')
                <li class="">
                    <a class="" href="{{route('pasien.index')}}">
                        <i class="icon_profile"></i>
                        <span>Pasien</span>
                    </a>
                </li>
                @endif 
                @if(Auth::user()->privilege == 'ADMIN' or Auth::user()->privilege == 'APOTEKER')
                <li class="">
                    <a class="" href="{{route('resep.index')}}">
                        <i class="icon_documents_alt"></i>
                        <span>Resep</span>
                    </a>
                </li>
                @endif                 
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

    <!--main content start-->
    @yield('content')
    <!--main content end-->

    <div class="text-right">
        <div class="credits">
            <!-- 
                All the links in the footer should remain intact. 
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
            -->
           <p>© Copyright 2017 - Kelompok 5 XII RPL 1 </p>
        </div>
    </div>

  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- nicescroll -->
    <script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="{{asset('js/scripts.js')}}"></script>


  </body>
</html>
