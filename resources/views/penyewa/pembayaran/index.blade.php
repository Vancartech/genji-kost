@extends('penyewa.layout.app')
@section('contents')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

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
                    <h1 class="mb-2 text-gray-800">Tagihan Pembayaran</h1>
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
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
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
                                            <td class="align-middle">{{ $rs->batas }}</td>  
                                            <td class="align-middle">
                                            @if ($rs->status == 'pending')
                                            <a href="{{ route('penyewa/bayar') }}" class="btn btn-primary">Bayar</a>
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

</body>

</html>


@endsection

