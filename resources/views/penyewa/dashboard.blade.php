@extends('penyewa.layout.app')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Dashboard Penyewa</h1>
    </div>
    
  <br>
   <!-- Content Row -->
   <div class="row">

<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Kamar</h6>
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
            <div class="chart-area">
            @if($kamars->count() > 0)
                    @foreach($kamars as $rs)
                     <div class="bed_room">
                        <p>Kamar Nomor {{ $rs->kamar?->id }}</p>
                        <p>Rp. {{ $rs->harga }}/bulan </p>
                        <p>Status Sewa : {{ $rs->status }} </p>
                        <p>Tanggal Masuk : {{ $rs->mulai }} </p>
                        <p>Tanggal Jatuh Tempo : {{ $rs->batas }} </p>
                     </div>
                     @endforeach
                @else
                        <p class="text-center" colspan="5">Tidak ada data kamar</p>
                @endif  
            </div>
        </div>
    </div>
</div>

<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Diri</h6>
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
        <div class="card-body col-12 col-lg-6">
        <div class="list list-hoverable">
        <p>{{ auth()->user()->name }}</p>
        <p>{{ auth()->user()->email }} </p>
        <p>{{ auth()->user()->no_hp }} </p>
                </div>
        </div>
    </div>
</div>

</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
                        <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Total Tagihan</h1>
    </div>
    <br>
    
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Kamar</th>
                                            <th>Harga</th>
                                            <th>Status Pembayaran</th>
                                            <th>Tanggal Jatuh Tempo</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($transaksis->count() > 0)
                                    @foreach($transaksis as $rs)
                                    @if ($rs->status == 'pending')
                                        <tr>
                                            
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">{{ $rs->kamar?->nama }}</td>
                                            <td class="align-middle">{{ $rs->harga }}</td>
                                            <td class="align-middle">
                                                                @if ($rs->status == 'pending')
                                                                    <span class="btn btn-warning">{{ $rs->status }}</span>
                                                                @elseif ($rs->status == 'sukses')
                                                                    <span class="btn btn-success">{{ $rs->status }}</span>
                                                                @else
                                                                    <span class="badge bg-danger">{{ $rs->status }}</span>
                                                                @endif
                                                            </td>
                                            <td class="align-middle">{{ $rs->batas }}</td>  
                                            <td class="align-middle">
                                            @if ($rs->status == 'pending')
                                            <a href="{{ route('penyewa/bayar') }}" type="submit" class="btn btn-primary">Bayar</a>
                                            @endif
                                            </td>
                                        </tr>
                                    @endif
                                    @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center" colspan="5">Tidak ada tagihan</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection