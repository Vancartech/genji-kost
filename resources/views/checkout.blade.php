<!DOCTYPE html>
<html lang="en">
 
<head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Genji Kost</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('user_assets/css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" href="{{ asset('user_assets/css/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('user_assets/css/responsive.css') }}">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('user_assets/images/fevicon.png') }}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('user_assets/css/jquery.mCustomScrollbar.min.css') }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
 
<body>
    <div>
       <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img width="100" height="50" src="img/Picture1.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="index.html">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.html">Tentang Kami</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="room.html">Kamar</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contact.html">Kontak</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ url('/profile') }}">Profile</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
        
        
        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="d-flex justify-content-center">
        <div class="card">
            <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                Anda akan melakukan penyewaan{{$transaction->kamar_id}} dengan harga
                <strong>{{$transaction->harga}}/bulan</strong>
                <a href="{{ route('penyewa/dashboard') }}" class="btn btn-primary mt-3" id="pay-button">
                    Tuntaskan Pembayaran
               </a>
            </div>
        </div>
    </div>
            </div>
        </main>
    </div>
 
</body>
 
</html>
