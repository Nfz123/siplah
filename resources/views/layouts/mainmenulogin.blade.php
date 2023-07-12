<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ URL::asset('temp/assets/img/favicon.png')}}" rel="icon">
  <link href="{{ URL::asset('temp/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="temp/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ URL::asset('temp/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('temp/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('temp/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('temp/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('temp/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('temp/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ URL::asset('temp/assets/css/style.css')}}" rel="stylesheet">

  <title>Login Form</title>
  <style>
      body {
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
          margin: 0;
          padding: 0;
      }

      .login-form {
          width: 500px;
          padding: 30px;
          border: 1px solid #ccc;
          background-color: #f2f2f2;
          border-radius: 5px;
      }

      .login-form input[type="text"],
      .login-form input[type="password"] {
          width: 100%;
          padding: 10px;
          margin-bottom: 10px;
          border: 1px solid #ccc;
          border-radius: 3px;
      }

      .login-form button {
          width: 100%;
          padding: 10px;
          background-color: #4caf50;
          color: #fff;
          border: none;
          border-radius: 3px;
          cursor: pointer;
      }
  </style>
</head>

<body>
        <div class="login-form">
            {{-- <h2>Login</h2>
            <form action="/login" method="POST">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <button type="submit">Login</button>
            </form> --}}
       
  <!-- ======= Header ======= -->
  {{-- <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ URL::asset('temp/assets/img/logo.png')}}" alt="">
        <span class="d-none d-lg-block">Siplah</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo --> --}}

    {{-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar --> --}}

   {{-- @include('layouts.nav') --}}


  {{-- </header><!-- End Header --> --}}

  <!-- ======= Sidebar ======= -->

  {{-- @include('layouts.sidebar') --}}

  <!-- End Sidebar-->

    <!-- ======= Main ======= -->
    {{-- <main id="main" class="main"> --}}

        {{-- <div class="pagetitle">
          <h1>Dashboard</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </nav>
        </div><!-- End Page Title --> --}}
        <section class="section dashboard">
            <div class="row">
            
              <!-- Left side columns -->
            <div class="col-lg-12">
            <div class="row">
    
            
    
                @yield('content')
                <!-- Top Selling -->
            </div>
            </div>
            </div>
        </section>
    </div>

      {{-- </main> --}}
    <!-- End #main -->

  <!-- ======= Footer ======= -->
  {{-- @include('layouts.footer') --}}