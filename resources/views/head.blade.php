<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  @yield('judul')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css"/>

  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

</head>
@if (isset(auth()->user()->id))
<body class="hold-transition sidebar-mini layout-fixed">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
      @if(auth()->user()->role_id=='1') 
        <h1>Dashboard - Admin</h1>
      @endif
      @if(auth()->user()->role_id=='2') 
        <h1>Dashboard - User</h1>
      @endif

    </div>
  
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <div class="box face">
          <marquee><?php
           date_default_timezone_set('Asia/Jakarta');
   $tanggal= mktime(date("m"),date("d"),date("Y"));
   echo "<b>".date('l, d-m-Y')."</b> ";
   $jam=date("H:i:s");
   echo "| Pukul : <b>". $jam." "."</b>";
   $a = date ("H");
   if (($a>=6) && ($a<=11)){
   echo "<b>, Selamat Pagi.</b>";
   }
   else if(($a>11) && ($a<=15))
   {
   echo ", Selamat Siang.";}
   else if (($a>15) && ($a<=18)){
   echo ", Selamat Sore.";}
   else { echo ", <b> Selamat Malam </b>";}
   ?> 
         <h6 id="date_time"></h6></marquee> </div>
  
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            Hi, {{ auth()->user()->nama }}
          </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
              <a href="/edit-profil{{ auth()->user()->id }}" class="dropdown-item dropdown-footer">Edit profil</a>
              <div class="dropdown-divider"></div>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
              <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" class="dropdown-item dropdown-footer">Keluar</a>
            </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <div class="wrapper">
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="https://www.ngopibareng.id/" class="brand-link">
          {{-- <img src="admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
          <h2><span class="brand-text font-weight-light">Ngopibareng.id</span></h2>
        </a>
      
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>
          @endif