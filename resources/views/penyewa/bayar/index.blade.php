@extends('penyewa.layout.app')
@section('contents')
<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Pembayaran Melalui</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                    aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
        <div class="list list-hoverable">
        <p>BCA : 472101019190533</p>
        <p>OVO, DANA, SHOPEEPAY : 085923478489 </p>
                </div>
        </div>
    </div>
</div>

<div class="col-md-12">
        <div class="form-appl">
            <form class="form1" method="post" action="{{ route('penyewa/bayar/bayarProses') }}" enctype="multipart/form-data">
                @csrf
                <h6>Informasi Transaksi</h6>
                {{-- Menampilkan nilai, tapi tetap bisa dikirim --}}
                <div class="form-group col-md-12 mb-3">
                    <p>ID Transaksi : {{ $transaksis->id }}</p>
                    <input type="hidden" name="transaksi_id" value="{{ $transaksis->id }}">
                </div>

                <div class="form-group col-md-12 mb-3">
                    <p>ID User : {{ $transaksis->user_id }}</p>
                    <input type="hidden" name="user_id" value="{{ $transaksis->user_id }}">
                </div>

                <div class="form-group col-md-12 mb-3">
                <p>Jumlah Pembayaran : Rp {{ number_format($transaksis->harga * 1000, 0, ',', '.') }}</p>
                    <input type="hidden" name="jumlah_bayar" value="{{ $transaksis->harga }}">
                </div>

                <div>
                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Metode Pembayaran</label>
                            <select title="Id Role" name="metode_pembayaran">
                            <option value>Silahkan Pilih</option>
                                <option value="BRI">BRI</option>
                                <option value="OVO">OVO</option>
                                <option value="DANA">DANA</option>
                                <option value="SHOPEEPAY">SHOPEEPAY</option>
                        </select>
                            @error('metode_pembayaran')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                <br>

                <div class="form-group col-md-12 mb-5">
                    <label for="">Bukti Bayar</label>
                    <div class="avatar-upload">
                        <div>
                            <input type='file' id="imageUpload" name="foto" accept=".png, .jpg, .jpeg" onchange="previewImage(this)" />
                            <label for="imageUpload"></label>
                        </div>
                    </div>
                    @error('foto')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
 
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-danger" href="{{ route('admin/kamar') }}">Cancel</a>
            </form>
        </div>
    </div>
@endsection