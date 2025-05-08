@extends('layouts.user')
 
@section('title', 'Home')

@section('contents')
<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0" src="/foto_kamar/{{ $kamars->foto }}" alt="..." />
            </div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bolder">{{ $kamars->nama }}</h1>
                <p class="lead">Rp. {{ $kamars->harga }}/bulan</p>
                <p class="lead">Deskripsi : {{ $kamars->deskripsi }}.</p>
                <br>

                @if($existingActiveTransaction && $existingActiveTransaction)
                    <!-- Jika user sudah menyewa kamar, tampilkan pesan dan sembunyikan form -->
                    <p class="text-danger">Anda sudah menyewa kamar. Tidak bisa menyewa lebih dari satu!</p>
                @else
                    <!-- Jika user belum menyewa kamar atau hanya memiliki transaksi tanpa kamar_id -->
                    <form action="{{ route('checkout/process') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $kamars->id }}">
                        <input type="hidden" name="harga" value="{{ $kamars->harga }}">

                        @if($existingTransaction)
                            <!-- Jika user sudah ada di database, hanya perlu menambahkan kamar_id -->
                            <input type="hidden" name="id_transaksi" value="{{ $existingTransaction->id }}">
                            <input type="hidden" name="mulai" value="{{ $existingTransaction->mulai }}">
                            <input type="hidden" name="batas" value="{{ $existingTransaction->batas }}">
                            <p>Kamu sudah ada data sewa kamar, tinggal pilih kamar nih!</p>
                            <button type="submit" class="btn btn-primary">Pilih Kamar</button>
                        @else
                            <!-- Jika user belum terdaftar oleh admin, user wajib mengisi data sendiri -->
                            <input type="hidden" name="kamar_id" value="{{ $kamars->id }}">
                            <p class="lead">Sewa mulai kapan? :</p>
                            <input type="date" name="mulai" required>
                            <p class="lead">Sampai kapan? :</p>
                            <input type="date" name="batas">
                            <br><br>
                            @auth
                                @if($kamars->status == 'Kosong')
                                    <button type="submit" class="btn btn-primary">Sewa Kamar</button>
                                @else
                                    <p>Kamar sudah disewa</p>
                                @endif
                            @endauth
                        @endif
                    </form>
                @endif


            </div>
        </div>
    </div>
</section>
@endsection
