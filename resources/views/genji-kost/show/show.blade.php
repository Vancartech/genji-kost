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
  <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
  <script type="text/javascript"
		src="https://app.stg.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-Lqb3Mx3HneRJk9o4"></script>
  <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
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
                           <img width="75" height="75" src="{{ asset('img/Picture1.png') }}" alt="#" />
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
                                 <a class="nav-link" href="{{ url('/genji-kost') }}">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ url('/login') }}">Login</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ url('/register') }}">Register</a>
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
                <!-- Product section-->
 <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/foto_kamar/{{ $kamars->foto }}" alt="..." /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder">{{ $kamars->nama }}</h1>
                        <p class="lead">Rp. {{ $kamars->harga }}/bulan</p>
                        <p class="lead">Deskripsi : {{ $kamars->deskripsi }}.</p>
                        <br>
                        <p>Login untuk menyewa</p>
                    </form>
                    </div>
                </div>
            </div>
            
        </section>
            </div>
        </main>
    </div>
 <!-- Javascript files-->
      
 <script src="{{ asset('user_assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('user_assets/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('user_assets/js/jquery-3.0.0.min.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('user_assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('user_assets/js/custom.js') }}"></script>
</body>
 
</html>
