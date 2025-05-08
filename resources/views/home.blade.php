@extends('layouts.user')
 
@section('title', 'Home')
 
@section('contents')

    <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{ asset('user_assets/images/loading.gif') }}" alt="#"/></div>
      </div>

      <!-- banner -->
      <section class="banner_main">
         <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="first-slide" src="{{ asset('user_assets/images/banner1.jpg') }}" alt="First slide">
                  <div class="container">
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="second-slide" src="{{ asset('user_assets/images/banner2.jpg') }}" alt="Second slide">
               </div>
               <div class="carousel-item">
                  <img class="third-slide" src="{{ asset('user_assets/images/banner3.jpg') }}" alt="Third slide">
               </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
         <div class="booking_ocline">
            <div class="container">
               <div class="row">
                  <div class="col-md-5">
                     <div class="book_room">
                        <h1>Genji Kost</h1>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
      <!-- about -->
      <div class="about">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-5">
                  <div class="titlepage">
                     <h2>Tentang Kami</h2>
                     <p>Kost Murah</span> adalah solusi terbaik bagi Anda yang mencari hunian nyaman dan terjangkau di Bali. Kami hadir untuk memudahkan pencarian tempat tinggal yang sesuai dengan kebutuhan Anda, baik untuk pelajar, pekerja, maupun profesional muda.</p>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="about_img">
                     <figure><img src="img/depan.jpeg" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
       <!-- our_room -->
       <div class="our_room">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Kamar</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if($kamars->count() > 0)
                @foreach($kamars as $rs)
                <div class="col-md-4 col-sm-6">
                    <div id="serv_hover" class="room {{ $rs->status == 'Terisi' ? 'disabled-room' : '' }}">
                        <div class="room_img">
                            <figure><img src="/foto_kamar/{{ $rs->foto }}" alt="#"/></figure>
                        </div>
                        <div class="bed_room">
                            @if($rs->status == 'Terisi')
                                <h3 class="disabled-text">{{ $rs->nama }}</h3>
                            @else
                                <a href="{{ route('show', $rs->id) }}"><h3>{{ $rs->nama }}</h3></a>
                            @endif
                            <p>Rp. {{ $rs->harga }}/bulan</p>
                            <p>Kamar {{ $rs->status }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p class="text-center" colspan="5">Tidak ada data kamar</p>
            @endif  
        </div>
    </div>
</div>

      <!-- end our_room -->
      <!-- blog -->
      <div  class="blog">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Fasilitas</h2>
                     <p>Fasilitas yang akan didapat </p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="blog_box">
                     <div class="blog_room">
                        <h3>Kasur</h3>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="blog_box">
                     <div class="blog_room">
                        <h3>Kipas Angin</h3>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="blog_box">
                     <div class="blog_room">
                        <h3>Lemari Kayu</h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end blog -->
      <!--  contact -->
      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Kontak</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <form id="request" class="main_form">
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Nama" type="type" name="Name"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Email" type="type" name="Email"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Nomor HP" type="type" name="Phone Number">                          
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="Pesan" type="type" Message="Name">Pesan</textarea>
                        </div>
                        <div class="col-md-12">
                           <button class="send_btn">Kirim</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-6">
                  <div class="map_main">
                     <div class="map-responsive">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.4062227389713!2d115.1663019!3d-8.6528593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd239bdd2b4642b%3A0x988595037b76862a!2sMade%20Ad!5e0!3m2!1sen!2sid!4v1738453736284!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end contact -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class=" col-md-4">
                     <h3>Contact US</h3>
                     <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Alamat</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> genjikost@gmail.com</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <h3>Menu Link</h3>
                     <ul class="link_menu">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="about.html"> Tentang Kami</a></li>
                        <li><a href="room.html">Kamar</a></li>
                        <li><a href="gallery.html">Kontak</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <h3>News letter</h3>
                     <form class="bottom_form">
                        <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                        <button class="sub_btn">subscribe</button>
                     </form>
                     <ul class="social_icon">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-10 offset-md-1">
                        
                        <p>
                        © 2025 Genji Kost
                        </p>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
    
   </body>

@endsection