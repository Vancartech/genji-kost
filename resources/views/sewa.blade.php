@extends('layouts.user')
 
 @section('title', 'Home')
  
 @section('contents')
 <!-- Product section-->
 <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/foto_kamar/{{ $kamars->foto }}" alt="..." /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder">{{ $kamars->nama }}</h1>
                        <div class="fs-5 mb-5">
                            <span >{{ $kamars->harga }}/bulan</span>
                        </div>
                        <p class="lead">{{ $kamars->tipe }}</p>
                        <p class="lead">{{ $kamars->fasilitas }}</p>
                        <p class="lead">{{ $kamars->deskripsi }}</p>
                        <input type="date" name="mulai" id="mulai">
                        <input type="date" name="akhir" id="akhir">
                        <div class="d-flex">
                            @if (Route::has('login'))
                            @auth
                            <div class="card-footer"><a class="btn btn-outline-dark flex-shrink-0" href="">Bayar</a></div>
                            @else
                            <a href="{{ route('login') }}" class="font-semibold text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
 
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                            @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection