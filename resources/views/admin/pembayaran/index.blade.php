@extends('admin.layout.app')
@section('contents')
<!DOCTYPE html>
<html lang="en">

<body id="page-top">
    

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="mb-2 text-gray-800">Laporan Transaksi</h1>
                    </div>
                    
                    <br>

                    <!-- Content Row -->
   <div class="row">


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pendapatan Bulan ini
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp. {{ number_format($pemasukan_bulanan, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                    Pendapatan Tahun ini</div>
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp. {{ number_format($pemasukan_tahunan, 0, ',', '.') }}</div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Content Row -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Penyewa</th>
                                            <th>Kamar</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Tanggal Tanggal Jatuh Tempo</th>
                                            <th>Invoice</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    @if($transaksis->count() > 0)
                @foreach($transaksis as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->user?->name }}</td>
                        <td class="align-middle">{{ $rs->kamar?->nama }}</td>
                        <td class="align-middle">Rp. {{ $rs->harga }}</td> 
                        <td class="align-middle">
                                            @if ($rs->status == 'pending')
                                                <span class="btn btn-warning">{{ $rs->status }}</span>
                                            @elseif ($rs->status == 'sukses')
                                                <span class="btn btn-success">{{ $rs->status }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $rs->status }}</span>
                                            @endif
                                        </td>
                                        <td class="align-middle">{{ $rs->mulai }}</td> 
                                        <td class="align-middle">{{ $rs->batas }}</td> 
                                        <td class="align-middle">
                                            <a href="{{ route('admin/pembayaran/invoice', $rs->id) }}" type="button" class="btn btn-secondary">Invoice</a>
                                        </td> 
                                        <td class="align-middle">
                                        @if ($rs->status == 'pending')
                                        <a href="{{ route('admin/pembayaran/approve', $rs->id) }}" type="button" class="btn btn-sucess">Approve</a>
                                            @endif
                                        </td> 
                        
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Tidak ada data kamar</td>
                </tr>
            @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="mb-2 text-gray-800">History Pembayaran</h1>
                    </div>
                    
                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Jumlah Bayar</th>
            <th>Penyewa</th>
            <th>Metode Pembayaran</th>
            <th>Tanggal Pembayaran</th>
            <th>Bukti Bayar</th>
        </tr>
    </thead>
    <tbody>
    @if($pembayarans->count() > 0)
        @foreach($pembayarans as $rs)
            <tr>
                <td class="align-middle">{{ $loop->iteration }}</td>
                <td class="align-middle">Rp. {{ $rs->jumlah_bayar }}</td>
                <td class="align-middle">{{ $rs->user?->name }}</td> 
                <td class="align-middle">{{ $rs->metode_pembayaran }}</td>
                <td class="align-middle">{{ $rs->created_at }}</td>
                <td class="align-middle"><img width="50" src="/bukti_bayar/{{ $rs->foto }}"></td>
            </tr>
        @endforeach
    @else
        <tr>
            <td class="text-center" colspan="6">Tidak ada history pembayaran</td>
        </tr>
    @endif
    </tbody>
</table>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.5/js/dataTables.dateTime.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.print.min.js"></script>

    <script>
    var dataPenjualan = @json($pemasukan_bulanan);
    console.log(dataPenjualan); // Pastikan ini array numerik [375000, 420000, 500000]
</script>

    <script>
        new DataTable('#example', {
    layout: {
        bottom: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
    </script>

    <script>
        new DataTable('#dataTable', {
    layout: {
        bottom: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
    </script>

</body>

</html>


@endsection

